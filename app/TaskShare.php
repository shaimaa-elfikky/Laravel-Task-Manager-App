<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskShare extends Model
{
    protected $fillable = ['task_id','user_id'];
}
