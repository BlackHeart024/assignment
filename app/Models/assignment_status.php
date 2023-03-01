<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignment_status extends Model
{
    use HasFactory;
    protected $table = 'assignment_statuses';
    protected $fillable = [
    'student_id',
    'a_id',
    'status',
    'marks_obtain'];
}
