<?php

class PostsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
   {
       parent::__construct();
       //$this->beforeFilter('auth', array('except' => array('index', 'show')));
   }

	public function index()
	{
		$query = Post::with('user');

		$query->where('title', "=", 'Cross-group neutral implementation');
		$post = $query->orderBy('created_at')->paginate(5);

		$posts = Post::all();
		// dd($posts);
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
		$post->title = Input::get('title');
		$post->body = Input::get('body');
		$post->user_id = Auth::id();
		//$post->user_id = Auth::user()->id;
		$post->save();

		 Redirect::action('PostController@index');
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

		if(!$post) {
			//$message =" We're sorry,  that Id cannot be located";

			Session::flash('errorMessage', 'Post with id of $id is not located');

			App::abort(404);


			return Redirect::action('PostController@index');
		}

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
		$validator = Validator::make(Input::all());
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
