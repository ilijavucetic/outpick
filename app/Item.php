<?php
/**
 * Created by PhpStorm.
 * User: Ilija_V_ITS
 * Date: 8/15/2016
 * Time: 11:09 AM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    public function countered_item()
    {
        return $this->hasOne('App\Counter', 'countered_item_id');
    }

    public function counter_item()
    {
        return $this->hasOne('App\Counter', 'countered_item_id');
    }
}