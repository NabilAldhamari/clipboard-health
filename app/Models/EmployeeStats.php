<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeStats extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'salary', 'currency', 'department', 'on_contract', 'sub_department'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}