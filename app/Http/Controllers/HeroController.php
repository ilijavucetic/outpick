<?php
/**
 * Created by PhpStorm.
 * User: Ilija_V_ITS
 * Date: 8/19/2016
 * Time: 10:38 AM
 */
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use App\Hero;

class HeroController extends Controller
{

    public function list_all()
    {
        return view('heroes');
    }

    public function addHero(Request $request)
    {

        $validation = Validator::make($request->all(), array('name' => 'required', 'description' => 'required', 'type' => 'required', 'attack_type' => 'required', 'image' => 'required|mimes:jpg,jpeg,png'));

        if($validation->fails()){

            return Redirect::to('/heroes')->withErrors($validation);
        }
        else{
            $im = $request->file('image');
            $fileName = $im->getClientOriginalName();
            $im->move("images", $fileName);




            $hero = new Hero();
            $hero -> name = $request['name'];
            $hero -> description = $request['description'];
            $hero -> image = $fileName;
            $hero -> type = $request['type'];
            $hero -> attack_type = $request['attack_type'];

            $message = 'There was an error';
            if($hero->save()){
                $message = 'Hero successfully added';

            }
            return redirect()->route('heroes')->with(['message' => $message]);


            //return Redirect::to('/heroes')->with('message', 'Data submitted');

        }





    }


}

