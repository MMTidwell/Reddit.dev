<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Vote;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Log;

class PostsController extends Controller
{
    // this will force you to login before you can do anything
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // this will be the first method that runs when the class is called
    public function index(Request $request)
    {
        // if request has search
        if($request->has('search')) {
            $search = $request->search;
            // searching all of the titles of the post for what is entered in the search bar
            $posts = Post::where('posts.title', 'LIKE', '%' . $search . '%')
                ->orwhere('posts.content', 'LIKE', '%' . $search . '%')
                ->orderby('posts.created_at', 'desc')
                ->paginate(4);
        } else {
            // if there is nothing in the search bar then it will show the post from newest to oldest
            $posts = Post::with('user')->orderby('created_at', 'desc')->paginate(4);
        }
        // this will give us the object
        // dd($posts);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'title' => 'required|min:3|max:100',
            'url' => 'required',
            'content' => 'required'
        );

        $request->session()->flash('ERROR_MESSAGE', 'Post was not saved. Please see message under inputs');
        // Log::info is testing all of the key=>values in the array and returning the ones that are true in the log file.
        Log::info($request->all());
        $this->validate($request, $rules);
        $request->session()->forget('ERROR_MESSAGE');

        $post = new Post();
        $post->title = $request->title;
        $post->url = $request->url;
        $post->content = $request->content;
        // this will make it to where you do not have to hard code in the user id
        $post->created_by = $request->user()->id;

        $post->save();

        // flash() - shows that the post was save successfully then on refresh it will disappear
        $request->session()->flash('SUCCESS_MESSAGE', 'Post saved successfully');

        return redirect()->action('PostsController@show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $data = ['post' => $post];

        // if there is nothing in the $post variable then it will send you to the 404 page
        if ($post == null) {
            abort(404);
        }

        return view('posts.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // needs to return the view page that it is connected to
    public function edit($id)
    {
        $post = Post::find($id);
        $data = ['post' => $post];

        if ($post == null) {
            abort(404);
        }

        return view('posts.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // returns the 
    public function update(Request $request, $id)
    {
        $rules = array(
            'title' => 'required|min:3|max:100',
            'url' => 'required',
            'content' => 'required'
        );

        $request->session()->flash('ERROR_MESSAGE', 'Post was not saved. Please see message under inputs');
        $this->validate($request, $rules);
        $request->session()->forget('ERROR_MESSAGE');

        $post = Post::find($id);

        if ($post == null) {
            abort(404);
        }

        $post->title = $request->title;
        $post->url = $request->url;
        $post->content = $request->content;
        $post->save();

        $request->session()->flash('SUCCESS_MESSAGE', 'Post saved successfully');

        return redirect()->action('PostsController@show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return back();
    }

    public function vote(Request $request)
    {
        $vote = Vote::with('post')->firstOrCreate([
            'post_id' => $request->input('post_id'), 
            'user_id' => $request->user()->id
        ]);

        $vote->vote = $request->input('vote');
        $vote->save();

        $post = $vote->post;

        $post->upVotes = $post->upVote();
        $post->downVotes = $post->downVote();

        $data = [
            'upVotes' => $post->upVote,
            'downVotes' => $post->downVote,
            'vote' => $vote->vote
        ];

        return back()->with($data);
    }
}
