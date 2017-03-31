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
use App\Spell;

class HeroController extends Controller
{

    public function list_all()
    {
        $heroes = Hero::orderBy('id', 'asc')->get();
        return view('heroes', ["heroes" => $heroes]);

    }

    public function view_details($hero_id){

        $hero = Hero::where('id', $hero_id)->first();
        $spells =  Spell::orderBy('id', 'asc')->get();
        return view('hero', ["hero" => $hero, "spells" => $spells]);

//        return redirect()->route('hero')->with(
//            ["hero" => $hero]);
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
            $im->move("images/heroes/", $fileName);

            $hero = new Hero();
            $hero -> name = $request['name'];
            $hero -> description = $request['description'];
            $hero -> image = '/images/heroes/'. $fileName;
            $hero -> type = $request['type'];
            $hero -> attack_type = $request['attack_type'];

            $message = 'There was an error';
            if($hero->save()){
                $message = 'Hero successfully added';
            }
            return redirect()->route('heroes')->with(['message' => $message]);
        }

    }

    public function addHeroSpell(Request $request){

        $validation = Validator::make($request->all(),
            array(
                'name' => 'required',
                'description' => 'required',
                'spell_order' => 'required',
                'ability_type' => 'required',
                'affects' => 'required',
                'damage_type' => 'required',
                'radius' => 'required',
                'manacost' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png'));

        if($validation->fails()){
            //return redirect()->back()->withErrors($validation);
            //var_dump($request["hero_id"]);
            return Redirect::to('/hero/'.$request["hero_id"])->withErrors($validation)->withInput();
        }
        else{
            $im = $request->file('image');
            $fileName = $im->getClientOriginalName();
            $im->move("images/spells/", $fileName);

            $spell = new Spell();
            $spell->hero_id = $request['hero_id'];
            $spell->name = $request['name'];
            $spell->description = $request['description'];
            $spell->image = '/images/spells/'. $fileName;
            $spell->spell_order = $request['spell_order'];
            $spell->ability_type = $request['ability_type'];
            $spell->affects = $request['affects'];
            $spell->damage_type = $request['damage_type'];
            $spell->radius = $request['radius'];
            $spell->manacost = $request['manacost'];
            $spell->pierces_spell_immunity = $request['pierces_spell_immunity'] == null ? 0 : $request['pierces_spell_immunity'];

            $message = 'There was an error';
            if($spell->save()){
                $message = 'Spell successfully added';
            }
            return Redirect::to('/hero/'.$request['hero_id'])->with(['message' => $message]);
        }
    }


}

