@extends('layouts.master')

@section('content')

<form action="{{{ action('PostsController@store')}}}" method="POST">
  <input type="text" value="{{{ Input::old('title') }}}" name="title" placeholder="blog title">
  <textarea name="body" placeholder="blog body">{{{ Input::old('body')}}}</textarea>

  <button type="submit">Save Post</button>
</form>


@section('body')
{{Form::open(['url'=>'posts','method'=>'post'])}}
    {{Form::label('title', 'Title')}}<br>
    {{Form::text('title')}}<br>
    {{Form::label('body', 'Body')}}<br>
    {{Form::textarea('body')}}<br>
    {{Form::submit('Submit')}}
{{Form::close()}}
@stop

<div class="form-group @if($errors->has('body'))has-error @nedit"

  @parent 
