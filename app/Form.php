<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use SoftDeletes;
    protected $table = 'forms';
    protected $dates = ['deleted_at'];

    public function module() {
    	return $this->belongsTo('App\Module');
    }
}
