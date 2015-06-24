<?php namespace todoparrot;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	public function user()
    {
        return $this->belongsTo('todoparrot\User');
    }
}
