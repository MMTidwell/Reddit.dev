<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends BaseModel
{
    public function user() {
    	return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function votes() {
    	return $this->hasmany(Vote::class);
    }

    public function upVote() {
    	return $this->votes()->where('vote', '=', 1);
    }

    public function downVote() {
    	return $this->votes()->where('vote', '=', 0);
    }
}
