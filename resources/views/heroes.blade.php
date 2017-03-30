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
                        <form enctype="multipart/form-data" action="{{ route('hero.add') }}" method="post">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input class="form-control" type="text" name="name" id="name">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea  class="form-control" name="description" id="description" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" id="image" name="image">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="radio" name="type" id="strength" value="strength"> <label for="strength"> Strength</label><br>
                                            <input type="radio" name="type" id="agility" value="agility">  <label for="agility"> Agility</label><br>
                                            <input type="radio" name="type" id="intelligence" value="intelligence">  <label for="intelligence"> Intelligence</label>
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                <input type="radio" name="attack_type" id="all" value="all"> <label for="all"> All</label><br>
                                                <input type="radio" name="attack_type" id="melee" value="melee"> <label for="melee"> Melee</label><br>
                                                <input type="radio" name="attack_type" id="range" value="range"> <label for="range"> Range</label>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>

                        <div class="row">
                            <div class="col-md-12">
                                &nbsp;
                            </div>
                        </div>

                        @foreach($heroes as $hero)
                            <div class="row">
                                <div class="col-md-12">
                                   <a href="{{route('hero.details', ['hero_id' => $hero->id])}}"> {{$hero->name}}</a>
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

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-info">Add comment</button>
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


                        {{--<div class="about-section">--}}
                            {{--<div class="text-content">--}}
                                {{--<div class="span7 offset1">--}}
                                    {{--@if(Session::has('success'))--}}
                                        {{--<div class="alert-box success">--}}
                                            {{--<h2>{!! Session::get('success') !!}</h2>--}}
                                        {{--</div>--}}
                                    {{--@endif--}}
                                    {{--<div class="secure">Upload form</div>--}}
                                    {{--{!! Form::open(array('url'=>'/add_hero','method'=>'POST', 'files'=>true)) !!}--}}
                                    {{--<div class="control-group">--}}
                                        {{--<div class="controls">--}}
                                            {{--{!! Form::file('image') !!}--}}
                                            {{--<p class="errors">{!!$errors->first('image')!!}</p>--}}
                                            {{--@if(Session::has('error'))--}}
                                                {{--<p class="errors">{!! Session::get('error') !!}</p>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div id="success"> </div>--}}
                                    {{--{!! Form::submit('Submit', array('class'=>'send-btn')) !!}--}}
                                    {{--{!! Form::close() !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
