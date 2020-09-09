<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class subclass extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'subclass';
    protected $primaryKey = 'subclass';
    protected $fillable = [
        'name'
    ];

    
}

