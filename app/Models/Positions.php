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
