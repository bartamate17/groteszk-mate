<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employeeModel extends Model
{
    use HasFactory;

    protected $table = 'employee_database';

    protected $primarykey = 'id';

    public $timestamps = false;
}
