<?php namespace todoparrot;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    protected $fillable = ['name', 'description'];

    public function todolist()
    {
        return $this->belongsTo('todoparrot\Todolist');
    }

}
