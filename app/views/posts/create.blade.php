{{-- @extends('layouts.master')

@section('content')

<form action="{{{ action('PostsController@store')}}}" method="POST">
  <input type="text" value="{{{ Input::old('title') }}}" name="title" placeholder="blog title">
  <textarea name="body" placeholder="blog body">{{{ Input::old('body') }}}</textarea>

  <button type="submit">Save Post</button>
</form>


@section('body')
{{  Form::open(['url'=>'posts','method'=>'post'])  }}
    {{  Form::label('title', 'Title')  }}
    {{  Form::text('title')  }}
    {{  Form::label('body', 'Body')  }}
    {{  Form::textarea('body')  }}
    {{  Form::submit('Submit')  }}
{{  Form::close()  }}
@stop

<div class="form-group @if($errors->has('body'))has-error @nedit"

  @parent --}}

@extends('layouts.master')

@section('content')

    <h1>Create Post</h1>

    {{ Form::open(array('action' => array('PostsController@store'))) }}
        @include('posts.create-edit-form')
    {{ Form::close() }}

@stop
