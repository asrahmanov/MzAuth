<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Specialties
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Specialties newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialties newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialties query()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialties whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialties whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialties whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialties whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Specialties extends Model
{
    use HasFactory;

    protected $table = 'mz_specialties';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $dates = ['deleted_at'];



    protected $fillable = [
        'name',
    ];


    protected $hidden=[
        'deleted_at'
    ];


    public function validate($inputs,$create=true) {

        return \Validator::make($inputs, [

        ]);
    }


}
