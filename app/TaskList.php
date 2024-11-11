<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class TaskList extends Model
{
    protected $fillable = ['name', 'share_link', 'user_id'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function generateShareLink()
    {
        $this->share_link = Str::uuid(); // Unique link for sharing
        $this->save();
    }
}
