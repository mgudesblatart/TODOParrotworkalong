<?php namespace todoparrot;

use Illuminate\Database\Eloquent\Model;


class Todolist extends Model {

    private $rules = [
        'name' => 'required',
        'description' => 'required'
    ];
    protected $fillable = ['name', 'description'];

    public function validate()
    {
        $v = \Validator::make($this->attributes, $this->rules);
        if($v->passes()) return true;
        $this->errors = $v->messages();
        return false;
    }

    public function tasks()
    {
        return $this->hasMany('todoparrot\Task');
    }

    public function categories()
    {
        return $this->belongsToMany('\todoparrot\Category')->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany('\todoparrot\Comment', 'commentable');
    }
}
