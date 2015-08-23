<?php

class PostsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::all();
		return View::make('posts.index')->with(compact('posts', $posts));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
				$validator = Validator::make($data = Input::all(), Post::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Post::create($data);

        return Redirect::route('posts.index');
		//return Redirect::back()->withInput()
		if(!Input::has('title') && !Input::has('body')){
			return Redirect::back()->withInput();
		}
		$post = new Post();
		$post->title = Input::ge('title');
		$post->body = Input::get('body');
		$post->save();

		rerturn Redirect::action('PostController@index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::find(id);

		return View::make('posts.show')->with('post', $posts);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
