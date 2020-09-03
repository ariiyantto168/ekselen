<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonies extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'testimonies';
    protected $primaryKey = 'idtestimonies';

    protected $fillable = [
        'name','jobrole','image','laba','description'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];
}
