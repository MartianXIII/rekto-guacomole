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

Route::get('resume', function()
{
	return View::make('resume');
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

// Route::get('/rolldice/{guess}', function($guess)
// {
//     $data = array('guess' => $guess);
// 		return View::make('roll-dice')->with($data);
// });

?>
