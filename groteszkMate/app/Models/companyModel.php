<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companyModel extends Model
{
    use HasFactory;

    protected $table = 'company_database';

    protected $primarykey = 'id';

    public $timestamps = false;
}
