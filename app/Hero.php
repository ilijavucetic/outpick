<?php
/**
 * Created by PhpStorm.
 * User: Ilija_V_ITS
 * Date: 8/15/2016
 * Time: 11:09 AM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{

    public function spells()
    {
        return $this->hasMany('App\Spell');
    }
}