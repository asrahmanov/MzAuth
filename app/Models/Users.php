<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Users
 *
 * @property int $id
 * @property string $pid
 * @property int $role_id
 * @property int $speciality_id
 * @property int $clinic_id
 * @property string $login
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property int $hide
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Clinics|null $clinic
 * @property-read \App\Models\Roles|null $role
 * @property-read \App\Models\Specialties|null $specialties
 * @method static \Illuminate\Database\Eloquent\Builder|Users newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Users newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Users query()
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereClinicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereHide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users wherePid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereSpecialityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
