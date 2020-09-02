<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kupons extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'kupons';
    protected $primaryKey = 'idkupons';

    protected $fillable = [
        'name','start_date','end_date'
    ];
}
