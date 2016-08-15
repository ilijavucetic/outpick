<?php
/**
 * Created by PhpStorm.
 * User: Ilija_V_ITS
 * Date: 8/15/2016
 * Time: 11:09 AM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    public function item()
    {
        return $this->hasMany('App\Item');
    }
}