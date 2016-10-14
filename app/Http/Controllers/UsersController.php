<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    // this will be the first method that is ran when the class is called
    public function index()
    {
        // this will create an array of all the usres in the DB
        $data['users'] = User::paginate(4);        
        // returns
            // view('users.index') - file path to index.blade.php
            // ->with($data) - gives the file path the $data array
        return view('users.index')->with($data);
    }

    // shows the user by the id number
    public function show($id)
    {
        // finds the user by the $id
        $user = User::find($id);
        // assigns key value pair to user
        $data = ['user' => $user];
        // sends you to show.blade.php with the $data array
        return view('users.show')->with($data);
    }

    // allows you to edit the user by id number
    public function edit($id)
    {
        $user = User::find($id);
        $data = ['user' => $user];
        return view('users.edit')->with($data);
    }

    // allows you to update the user by the user id
    public function update(Request $request, $id)
    {
        $rules = array(
            'name' => 'required|min:3|max:20',
            'email' => 'required',
            'password' => 'required',
        );
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect()->action('UsersController@show', $user->id);
    }

    // destroys the user by user id
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/posts');
    }
}
