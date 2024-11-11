<?php

namespace App\Http\Controllers;

use App\TaskList;
use App\TaskListShare;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskListShareController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

  
    public function shareTaskList(Request $request)
    {
        $request->validate([
            'task_list_id' => 'required|exists:task_lists,id', 
            'username' => 'required|exists:users,username',   
        ]);

        $taskList = TaskList::where('id', $request->task_list_id)
                            ->where('user_id', Auth::id())  
                            ->firstOrFail();

      
        $user = User::where('username', $request->username)->firstOrFail();

        TaskListShare::create([
            'task_list_id' => $request->task_list_id,
            'user_id' => $user->id,
        ]);

        return response()->json([
            'message' => 'Task list shared successfully with ' . $user->username,
        ]);
    }

  
    public function sharedWithUser()
    {
        $sharedTaskLists = TaskListShare::where('user_id', Auth::id())
                                        ->with('taskList') 
                                        ->get();

        return response()->json($sharedTaskLists);
    }
}
