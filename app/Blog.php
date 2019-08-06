<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $primaryKey='id_blog';
    public $incrementing = true;
    public $timestamps=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_blog','id_user','title','content','created',
    ];

    public function user() {
        return $this->belongsTo('App\User','id_user','id_user');
    }
}
