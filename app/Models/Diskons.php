<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diskons extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'diskons';
    protected $primaryKey = 'iddiskons';

    protected $fillable = [
        'name','image','description'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];
}
