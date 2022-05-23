<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'project'=>'required',
            'user'=>'required'
        ]);

        try {
            $task=new Task;

            $task->name=$request->name;
            $task->description=$request->description;
            $task->user_id=$request->user;
            $task->project_id=$request->project;

            $task->save();

            if($task){
                return redirect()->back()->with('success','Task is created');
            }
            else{
                return redirect()->back()->with('failed','Task creation failed');
            }

        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Task creation failed'.$th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        if($id){
            $task=Task::find($id);

            if(request()->type==1){
                $task->start_time=now();
            }
            elseif(request()->type==0){
                $task->end_time=now();
            }
            $task->save();
            
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
