<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Clinics
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Clinics newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clinics newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clinics query()
 * @mixin \Eloquent
 */
class Clinics extends Model
{
    use HasFactory;

    protected $table = 'mz_clinics';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $dates = ['deleted_at'];



    protected $fillable = [
        'name',
        'short_name',
    ];


    protected $hidden=[
        'deleted_at'
    ];


    public function validate($inputs,$create=true) {

        return \Validator::make($inputs, [

        ]);
    }


}
