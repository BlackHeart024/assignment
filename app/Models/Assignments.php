<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\department;
class Assignments extends Model
{
    use HasFactory;
    protected $table = 'assignments';
    protected $fillable = [
        'id',
        'assignment_name',
        't_id',
        'd_id',
        'semester',
        'submission_d_t' => 'date:hh:mm'
    ];

    public function getDName(){
        return $this->belongsTo(department::class);
    }
}
