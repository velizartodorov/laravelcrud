<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'sex', 'address',
                           'email', 'phone', 'department', 'job', 
                           'salary', 'job_description'];
}