<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Highlights extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'highlights';
    protected $primaryKey = 'idhighlights';

    protected $fillable = [
        'name'
    ];

    public function categories()
    {
        return $this->belongsTo('App\Models\Categories', 'idcategories');
    }

    public function classes()
    {
        return $this->belongsTo('App\Models\Classes', 'idclass');
    }
}
