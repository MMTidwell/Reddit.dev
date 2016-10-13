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
// each of these pages will need to have their own blade file
Route::get('/sayhello/{name}', 'HomeController@sayHello');
Route::get('/uppercase/{word}', 'HomeController@uppercase');
Route::get('/increment/{num}', 'HomeController@increment');

// Resource Controllers
// this route conntects to the PostController.php file
//index GET
Route::resource('posts', 'PostsController');
// //create GET
// Route::resource('posts/create', 'PostsController');
// //store POST
// Route::resource('posts', 'PostsController');
// //show GET
// Route::resource('posts/{post}', 'PostsController');
// //edit GET
// Route::resource('posts/{post}/edit', 'PostsController');
// //update PUT
// Route::resource('posts/{post}', 'PostsController');
// //destory DELETE
// Route::resource('posts/{post}', 'PostsController');






// ================ ORM MODELS ================
Route::get('orm-test', function ()
{
	$post1 = new \App\Models\Post();
	$post1->title = 'Eloquent is awesome!';
	$post1->url='https://laravel.com/docs/5.1/eloquent';
	$post1->content  = 'It is super easy to create a new post.';
	$post1->created_by = 1;
	$post1->save();

	$post2 = new \App\Models\Post();
	$post2->title = 'Eloquent is really easy!';
	$post2->url='https://laravel.com/docs/5.1/eloquent';
	$post2->content = 'It is super easy to create a new post.';
	$post2->created_by = 1;
	$post2->save();
});

Route::resource('users', 'UsersController');





