<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Positions
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Positions newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Positions newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Positions query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Positions whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Positions whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Positions whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Positions whereUpdatedAt($value)
 */
class Positions extends Model
{
    use HasFactory;

    protected $table = 'mz_positions';
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
