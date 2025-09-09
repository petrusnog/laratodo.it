<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Auth::user()->tasks()
                             ->with('user', 'status')
                             ->get();

        $statuses = Status::orderBy('id')->pluck('name');

        // Separating tasks by status.
        $grouped_tasks = [];
        foreach ($statuses as $status_name) {
            $collection = TaskResource::collection(
                $tasks->where('status.name', $status_name)
            )->toArray(request());

            // Normalize array indexes.
            $grouped_tasks[$status_name] = array_values($collection);
        }

        return Inertia::render('Tasks/Index', [
            'grouped_tasks' => $grouped_tasks,
            'statuses' => $statuses->toArray()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
