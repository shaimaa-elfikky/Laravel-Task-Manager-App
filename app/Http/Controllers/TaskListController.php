<?php

namespace App\Http\Controllers;

use App\TaskList;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class TaskListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  
    }

  
    public function index()
    {
        $taskLists = Auth::user()->taskLists()->with('tasks')->get();
        return response()->json($taskLists);
    }

    /**
     * Create a new task list
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $taskList = Auth::user()->taskLists()->create($request->only('name'));
        return response()->json($taskList, 201);
    }

    /**
     * Display a task list along with its tasks
     */
    public function show($id)
    {
        $taskList = TaskList::with('tasks')->where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return response()->json($taskList);
    }

    /**
     * Generate and return the shareable link for the task list
     */
    public function share($id)
    {
        $taskList = TaskList::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $taskList->generateShareLink();

        return response()->json([
            'share_link' => route('task-list.show-shared', $taskList->share_link)
        ]);
    }

    /**
     * Display a shared task list based on the share link
     */
    public function showShared($shareLink)
    {
        $taskList = TaskList::where('share_link', $shareLink)->with('tasks')->firstOrFail();
        return response()->json($taskList);
    }
}
