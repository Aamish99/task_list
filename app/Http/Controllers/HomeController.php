<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * View list of all tasksa
     */
    public function tasks(){
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }

    /**
     * add new task
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->save();
        return redirect()->back()->withSuccess('Task added successfully');
    }

    /**
     * edit a specific task via ajax request
     */
    public function edit($id){
        $task = Task::find($id);
        $output = '

                        <div class="form-group">
                            <label>Name</label>
                            <input type="hidden" class="form-control" name="id" value="'.$id.'" required>

                            <input type="text" class="form-control" name="name" value="'.$task->name.'" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" required>'.$task->description.'</textarea>
                        </div>';
        return $output;
    }

    /**
     * Update task
     */
    public function update(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $task = Task::find($request->id);
        $task->name = $request->name;
        $task->description = $request->description;
        $task->save();
        return redirect()->back()->withSuccess('Task updated successfully');
    }


    /**
     * delete task
     */
    public function delete($id){
        Task::find($id)->delete();
        return 'success';
    }
}