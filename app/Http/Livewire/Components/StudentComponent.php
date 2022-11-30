<?php

namespace App\Http\Livewire\Components;

use App\Models\Student;
use Livewire\Component;

class StudentComponent extends Component
{
    public $student_id, $student_name, $student_email, $student_phone, $student_delete_id;
    public function saveStudentData()
    {
        $this->validate(
            [
                'student_id' => 'required:unique:students',
                'student_name' => 'required',
                'student_email' => 'required|email',
                'student_phone' => 'required|numeric',
            ]
        );
        // Add data
        $student = new Student();
        $student->student_id = $this->student_id;
        $student->student_name = $this->student_name;
        $student->student_email = $this->student_email;
        $student->student_phone = $this->student_phone;
        $student->save();

        $this->student_id = '';
        $this->student_name = '';
        $this->student_email = '';
        $this->student_phone = '';

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent(
            'success',
            ['message' => 'Student Created Successfully!']
        );
    }

    //Delete Confirmation
    public function deleteConfirmation($uuid)
    {
        $this->student_delete_id = $uuid ; //student id
    }


    public function deleteStudentData()
    {
        $student = Student::where('uuid', $this->student_delete_id);
        $student->delete();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent(
            'warning',
            ['message' => 'Student has been deleted successfully']
        );      

        $this->student_delete_id = '';
    }
    public function cancel()
    {
        $this->student_delete_id = '';
    }

    public function updated($fields)
    {
        $this->validateOnly(
            $fields,
            [
                'student_id' => 'required:unique:students',
                'student_name' => 'required',
                'student_email' => 'required|email',
                'student_phone' => 'required|numeric',
            ]
        );
    }
    public function render()
    {
        //Get all students
        $students = Student::all();

        return view('livewire.components.student-component', ['students' => $students])->layout('livewire.layouts.base');
    }
}