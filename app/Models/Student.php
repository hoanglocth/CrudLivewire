<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, HasUuid;
    protected $fillable = ['student_id', 'student_name', 'student_email', 'student_phone'];
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;
}