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

    public function spell()
    {
        return $this->hasMany('App\Spell');
    }

    public function countered_hero()
    {
        return $this->hasOne('App\Counter', 'countered_hero_id');
    }

    public function counter_hero()
    {
        return $this->hasOne('App\Counter', 'counter_hero_id');
    }

}