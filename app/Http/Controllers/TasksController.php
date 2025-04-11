<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TasksController extends Controller
{
    public function index() {
        $currentTask = Tasks::query()
                    ->where('isdeleted', false)
                    ->orderBy('iscomplete', 'asc')
                    ->orderBy('duedate', 'asc')
                    ->paginate(10);

        // Unimplemented Feature -> shows the recent completed task
        $completedTask = Tasks::query()
                    ->where('isdeleted', false)
                    ->where('iscomplete', true)
                    ->orderBy('updated_at', 'desc')
                    ->limit(5)->get();
                    
        return view("home", [
                "tasks" => $currentTask, 
                "completedTasks" => $completedTask,
            ]
        );
    }

    public function getOne(int $id) {

        $fetched = Tasks::find($id);

        if (!$fetched || $fetched->isdeleted == true || $fetched->iscomplete == true) return redirect('/');

        return view("pages.Task", [
            "task" => $fetched,
        ]
        );
    }

    public function insert(Request $request): RedirectResponse {
        $request->validate([
            'title' => 'required|max:60',
            'description' => 'max:128',
            'duedate' => 'required'
        ]);

        $task = new Tasks;
        $task->title = $request->title;
        $task->description = $request->description; 
        $task->duedate = $request->duedate; 
        $task->save();

        return redirect('/');
    }

    public function delete(Request $request): RedirectResponse {
        $updateIsDeleted = Tasks::find($request->id); 
        $updateIsDeleted->isdeleted = true;
        $updateIsDeleted->save();

        return redirect('/');
    }

    public function update(Request $request): RedirectResponse {
        $request->validate([
            'id' => 'required',
            'title' => 'required|max:60',
            'description' => 'max:128',
            'duedate' => 'required'
        ]);

        $updateInfo = Tasks::find($request->id); 
        $updateInfo->title = $request->title;
        $updateInfo->description = $request->description;
        $updateInfo->duedate = $request->duedate;

        
        $updateInfo->save();
        
        return redirect('/');
    }
    
    public function markAsComplete(Request $request): RedirectResponse {
        $updateInfo = Tasks::find($request->id); 
        $updateInfo->iscomplete = true;
        $updateInfo->save();

        return redirect('/');

    }
}
