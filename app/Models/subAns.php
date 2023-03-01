<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subAns extends Model
{
    use HasFactory;

    protected $table = 'sub_ans';
    protected $fillable = [
        'student_id',
    	'question_id',
        'answers'	];
}
