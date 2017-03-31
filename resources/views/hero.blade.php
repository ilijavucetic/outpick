@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Heroes</div>

                    <div class="panel-body">
                        Welcome
                        @include('includes.message-block')

                        <div class="row">
                            <div class="col-md-12">
                                &nbsp;
                            </div>
                        </div>

                            <div class="row">
                                <div class="col-md-12">
                                   {{$hero->name}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{$hero->image}}">
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        {{$hero->description}}
                                    </p>
                                </div>
                            </div>

                        @foreach($spells as $spell)
                            <div class="row">
                                <div class="span12">
                                    &nbsp;
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{route('hero.add_spell', ['spell_id' => $spell->id])}}"> {{$spell->name}}</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{$spell->image}}">
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        {{$spell->description}}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span12">
                                    &nbsp;
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-info pull-right">Add comment</button>
                                </div>
                                <div class="col-md-12" style="display: none">
                                    <div class="form-group">
                                        <label for="description">Comment</label>
                                        <textarea  class="form-control" name="description" id="description" rows="5"></textarea>
                                        <button type="submit" class="btn btn-primary">Comment</button>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                        <h2>Add New Spell</h2>
                        <p>Click on the button to toggle between showing and hiding content.</p>
                        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Simple collapsible</button>
                        <div id="demo" class="collapse container">

                            <div class="row">
                                <form enctype="multipart/form-data" action="{{ route('hero.add_spell') }}" method="post">
                                    <div class="row">
                                        <input type="hidden" value="{{$hero->id}}" name="hero_id" >
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input class="form-control" type="text" name="name" id="name" value="{{old('name') != "" ? old('name') : ""}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea  class="form-control" name="description" id="description" rows="5">{{old('description') != "" ? old('description') : ""}}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <input type="file" id="image" name="image">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="none"> Spell order</label><br>
                                                    <input type="radio" name="spell_order" id="q" value="q" {{old('spell_order') == "q" ? "checked":""}}>  <label for="q"> Q</label><br>
                                                    <input type="radio" name="spell_order" id="w" value="w" {{old('spell_order') == "w" ? "checked":""}}>  <label for="w"> W</label><br>
                                                    <input type="radio" name="spell_order" id="e" value="e" {{old('spell_order') == "e" ? "checked":""}}>  <label for="e"> E</label><br>
                                                    <input type="radio" name="spell_order" id="r" value="r" {{old('spell_order') == "r" ? "checked":""}}>  <label for="r"> R</label><br>
                                                    <input type="radio" name="spell_order" id="x" value="x" {{old('spell_order') == "x" ? "checked":""}}>  <label for="x"> Other</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="none"> Spell type</label><br>
                                                    <input type="radio" name="ability_type" id="type_none" value="none" {{old('ability_type') == "none" ? "checked":""}}> <label for="type_none"> None</label><br>
                                                    <input type="radio" name="ability_type" id="point_target" value="point_target" {{old('ability_type') == "point_target" ? "checked":""}}> <label for="point_target"> Point Target</label><br>
                                                    <input type="radio" name="ability_type" id="target_area" value="target_area" {{old('ability_type') == "target_area" ? "checked":""}}> <label for="target_area"> Target Area</label><br>
                                                    <input type="radio" name="ability_type" id="passive" value="passive" {{old('ability_type') == "passive" ? "checked":""}}> <label for="passive"> Passive</label><br>
                                                    <input type="radio" name="ability_type" id="aura" value="aura" {{old('ability_type') == "aura" ? "checked":""}}> <label for="aura"> Aura</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="none"> Affects</label><br>
                                                <input type="radio" name="affects" id="affects_none" value="none" {{old('affects') == "none" ? "checked":""}}>  <label for="affects_none"> None</label><br>
                                                <input type="radio" name="affects" id="enemies" value="enemies" {{old('affects') == "enemies" ? "checked":""}}>  <label for="enemies"> Enemies</label><br>
                                                <input type="radio" name="affects" id="self" value="self" {{old('affects') == "self" ? "checked":""}}>  <label for="self"> Self</label><br>
                                                <input type="radio" name="affects" id="allies" value="allies" {{old('affects') == "allies" ? "checked":""}}>  <label for="allies"> Allies</label><br>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="none"> Damage Type</label><br>
                                                <input type="radio" name="damage_type" id="damage_type_none" value="none" {{old('damage_type') == "none" ? "checked":""}}>  <label for="damage_type_none"> None</label><br>
                                                <input type="radio" name="damage_type" id="affects_none" value="magical" {{old('damage_type') == "magical" ? "checked":""}}>  <label for="magical"> Magical</label><br>
                                                <input type="radio" name="damage_type" id="physical" value="physical" {{old('damage_type') == "physical" ? "checked":""}}>  <label for="enemies"> Physical</label><br>
                                                <input type="radio" name="damage_type" id="pure" value="pure" {{old('damage_type') == "pure" ? "checked":""}}>  <label for="self"> Pure</label><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="radius">Radius</label>
                                                <input class="form-control" type="text" name="radius" id="radius" value="{{old('radius') != "" ? old('radius') : ""}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="manacost">Manacost</label>
                                                <input class="form-control" type="text" name="manacost" id="manacost" value="{{old('manacost') != "" ? old('manacost') : ""}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cooldown">Cooldown</label>
                                                <input class="form-control" type="text" name="cooldown" id="cooldown" value="{{old('cooldown') != "" ? old('cooldown') : ""}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="radius"></label><br>
                                                <input type="checkbox" name="pierces_spell_immunity" value="pierce_spell_immunity" {{old('pierce_spell_immunity') == "1" ? "checked":""}}>  <label for="pierce_spell_immunity">Pierce spell immunity</label><br>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add spell</button>
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                </form>
                            </div>


                        </div>





                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
