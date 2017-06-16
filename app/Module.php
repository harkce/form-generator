<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use SoftDeletes;
    protected $table = 'modules';
    protected $dates = ['deleted_at'];

    public function category() {
    	return $this->belongsTo('App\Category');
    }

    public function forms() {
    	return $this->hasMany('App\Form');
    }
}
