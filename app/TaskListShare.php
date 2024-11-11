<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskListShare extends Model
{
    protected $fillable = ['task_list_id', 'user_id'];

    /**
     * The task list that is shared.
     */
    public function taskList()
    {
        return $this->belongsTo(TaskList::class);
    }

    /**
     * The user with whom the task list is shared.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
