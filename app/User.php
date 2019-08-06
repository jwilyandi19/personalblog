<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey='id_user';
    public $incrementing = true;
    public $timestamps=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user','username','name','password','created_at','updated_at'
    ];

    public function blogs() {
        return $this->hasMany('App\Blog','id_user','id_user');
    }

}
