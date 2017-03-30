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
                                <img src="/{{$hero->image}}">
                            </div>
                            <div class="col-md-6">
                                <p>
                                    {{$hero->description}}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info">Add Spell</button>
                            </div>
                            <div class="col-md-12" style="display: none">
                                <div class="form-group">
                                    <label for="description">Comment</label>
                                    <textarea  class="form-control" name="description" id="description" rows="5"></textarea>
                                    <button type="submit" class="btn btn-primary">Comment</button>
                                </div>
                            </div>
                        </div>


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
