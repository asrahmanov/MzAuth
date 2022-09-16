<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use HasFactory;

    protected $table = 'mz_users';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $dates = ['deleted_at'];


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */


    protected $fillable = [
        'pid',
        'role_id',
//        'position_id',
        'speciality_id',
        'clinic_id',
        'login',
        'first_name',
        'last_name',
        'email',
        'password',
        'hide',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function validate($inputs, $create = true)
    {

        return \Validator::make($inputs, [

        ]);
    }


    public function role()
    {
        return $this->hasOne(Roles::class, 'id', 'role_id');
    }

    public function clinic()
    {
        return $this->hasOne(Clinics::class, 'id', 'clinic_id');
    }

    public function specialties()
    {
        return $this->hasOne(Specialties::class, 'id', 'speciality_id');
    }

//    public function positions()
//    {
//        return $this->hasOne(Positions::class, 'id', 'position_id');
//    }

}
