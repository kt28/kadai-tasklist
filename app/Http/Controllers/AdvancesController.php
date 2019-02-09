<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Advance;

class AdvancesController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $tasks = $user->tasks;
        $ids = $user->tasks()->pluck('id');
        $advances = Advance::whereIn('task_id', $ids)->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'tasks' => $tasks,
            'advances' => $advances,
        ];

        return view('tasks.show', $data);
    }
    
    public function create(Request $request)
    {
        $advance = new Advance;

        return view('advances.create', [
            'task_id' => $request->id,
            'advance' => $advance,
        ]);
    }
    
    public function store(Request $request)
    {
        $advance = new Advance;
        $id = $request->id;
        
        $this->validate($request,[
            'date' => 'required|max:191',
            'progress' => 'required|max:191',
            'summary' => 'max:191',
        ]);

        $task = Task::find($id);
// dd($task_id);
        $task->advances()->create([
            'date' => $request->date,
            'progress' => $request->progress,
            'summary' => $request->summary,
            'confirmed' => 0,
        ]);
// dd($advance);        
//        $advance->save();

        return redirect()->route(
            'tasks.show', [
                'tasks' => $task,
            ]
        );
    }
    
    // public function show($id)
    // {
    //     
    // }
    
    public function edit($id)
    {
        $advance = Advance::find($id);

        return view('advances.edit', [
            'advance' => $advance,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $advance = Advance::find($id);
        
        $this->validate($request, [
            'date' => 'required|max:191',
            'progress' => 'required|max:191',
            'summary' => 'max:191',
        ]);
        
        $advance->date = $request->date;
        $advance->progress = $request->progress;
        $advance->summary = $request->summary;
        
        $advance->save();
        
        $task = Task::find($id);

        return redirect()->route(
            'tasks.show', [
                'tasks' => $task,
                
            ]
        );
    }
    
    public function destroy($id)
    {
        $advance = Advance::find($id);
        $advance->delete();

        return back();
    }
}
