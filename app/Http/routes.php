<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});





// ================ ROUTING ================
// this will create a new page
// to call the page up enter reddit.dev/sayhello in the URL
Route::get('/say-hello', function () {
	$a = 4;
	$b = 6;
	// this is all it will put on a page
	return "Hello, Codeup! " . $a * $b;
});

// stay away from capitals, use - instead
Route::get('/say-hello/{name}', function($name)
{
    return "Hello, $name!";
});

// optional perams
// hits the first path when nothing is passed in for the name
	// so in other words comment out the first Route::get and it will work
Route::get('/say-hello/{name?}', function($name = 'World') {
	return "Hello, $name!";
});

// redirecting to another route
Route::get('say-hello/{name}', function($name) {
	if ($name == "chris") {
		return redirect('/');
	}
	return "Hello, $name";
});

// PULLED INTO HomeController.php
// Route::get('/uppercase/{word?}', function($word = "word") {
// 	$data['word'] = $word;
// 	return view('uppercase')->with($data);
// });

// Route::get('/increment/{num?}', function($num = 2) {
// 	return ++$num;
// });

Route::get('/add/{a?}/{b?}', function($a = 1, $b = 1) {
	return $a + $b;
});






// ================ VIEWS ================
Route::get('say-hello/{name}', function($name) {
	return view('my-first-view');
});

Route::get('/say-hello/{name}', function($name) {
	if ($name == 'tim') {
		return Redirect::to('/');
	}
	$data = array('name' => $name);
	return view('my-first-view')->with($data);
});


Route::get('/rolldice/{guess?}', function($guess = 1) {
	$data['num'] = mt_rand(1, 6);
	$data['guess'] = $guess;
	$data['correct'] = ($data['num'] == $data['guess']);
	return view('roll-dice')->with($data);
});






// ================ CONTROLLERS ================
// passing the route, passing the name of the controller
Route::get('/', 'HomeController@showWelcome');

// call the page: reddit.dev/sayhello/name
Route::get('/sayhello/{name}', 'HomeController@sayHello');

Route::get('/uppercase/{word}', 'HomeController@uppercase');
Route::get('/increment/{num}', 'HomeController@increment');
















