<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\department;
class TeacherRegModel extends Model
{
    use HasFactory;
    
    protected $table = 'teachers';
    protected $fillable = [
        't_id',
    	't_name',	
        't_email',	
        't_d_id',
        't_gender',
        't_address',
        't_password',
        'dob'
    ];
    public function getDName(){
        return $this->belongsTo(department::class);
    }
}
