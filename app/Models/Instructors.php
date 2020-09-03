<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instructors extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'instructors';
    protected $primaryKey = 'idinstructors';

    protected $fillable = [
        'name','job_role','images'
    ];
}
