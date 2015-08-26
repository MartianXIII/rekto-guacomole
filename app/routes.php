<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('portfolio', function()
{
		return "This is my Portfolio";
		//return View::make('portfolio');
});

Route::get('resume', function()
{
	return "This is the Resume";
	//return View::make('resume');
});

Route::get('/rolldice/{guess}', function($guess)
{
	$roll = mt_rand(1,6);

	$data = array('guess' => $guess, 'roll' => $roll);

	return View::make('rolldice')->with($data);
});

Route::get('sayhello/{name}', function($name)
{
	return View::make('sayhello')->with('name', $name);
});

Route::get('users/{username}', function($username)
{
	$user = User::whereUsername($username)->first();
	return View::make('users.show', ['user' => $user]);
});

Route::resource('posts', 'PostsController');
{
	$query = Request::get('q');

	if($query)
	{
		$posts = Post::where('title', 'LIKE', "%$query%")->get();
	} else {
		$posts = Post::all();
	}
	return View::make('posts.index')->withPosts($posts);
}

//Route::get('posts', 'PostControllers@index');
//Route::get('posts/create', 'PostsController@create');


// Route::get('/rolldice/{guess}', function($guess)
// {
//     $data = array('guess' => $guess);
// 		return View::make('roll-dice')->with($data);
// });

// Route::get('orm-test', function ()
// {
// $post1 = new Post();
// $post1->title = 'Eloquent is awesome!';
// $post1->body  = 'It is super easy to create a new post.';
// $post1->save();
//
// $post2 = new Post();
// $post2->title = 'Post number two';
// $post2->body  = 'The body for post number two.';
// $post2->save();
// });
Route::get('login', 'HomeController@showLogin');

Route::post('login', 'HomeController@doLogin');

Route::get('logout', 'HomeController@doLogout');

?>
