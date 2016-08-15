<?php
/**
 * Created by PhpStorm.
 * User: Ilija_V_ITS
 * Date: 8/15/2016
 * Time: 2:41 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    /**
     * Get the phone record associated with the user.
     */

    public function countered_hero()
    {
        return $this->belongsTo('App\Hero');
    }

    public function counter_hero()
    {
        return $this->belongsTo('App\Hero');
    }

    public function countered_item()
    {
        return $this->belongsTo('App\Item');
    }

    public function counter_item()
    {
        return $this->belongsTo('App\Item');
    }

    public function countered_spell()
    {
        return $this->belongsTo('App\Spell');
    }

    public function counter_spell()
    {
        return $this->belongsTo('App\Spell');
    }


}