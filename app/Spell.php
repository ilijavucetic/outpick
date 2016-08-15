<?php
/**
 * Created by PhpStorm.
 * User: Ilija_V_ITS
 * Date: 8/15/2016
 * Time: 11:09 AM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Spell extends Model
{

    public function hero()
    {
        return $this->belongsTo('App\Hero');
    }

    public function countered_spell()
    {
        return $this->hasOne('App\Counter', 'countered_spell_id');
    }

    public function counter_spell()
    {
        return $this->hasOne('App\Counter', 'counter_spell');
    }
}