<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function taskList()
    {
        return $this->belongsTo(TaskList::class);
    }

}
