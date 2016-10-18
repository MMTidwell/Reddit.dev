<?php 

namespace App\Http\Controllers;


class HomeController extends Controller {
	public function showWelcome() {
		// redirects it to say Bob, if there are no params to pass then it would render Bob
		return redirect()->action('HomeController@sayHello', array('Bob'));
	}

	public function sayHello($name) {
		$data = array('name' => $name);
		return view('my-first-view', $data);
	}

	public function uppercase($word) {
		$data['word'] = $word;
		return view('uppercase')->with($data);
	}

	public function increment($num) {
		$data['num'] = $num;
		return view('increment')->with($data);
	}
}