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
 * @property int $id
 * @property string $name
 * @property string $short_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Clinics whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinics whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinics whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinics whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinics whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clinics whereUpdatedAt($value)
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
