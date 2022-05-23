<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardContorller extends Controller
{
    public function index(){
        if(Auth::user()->role==1){
            $projects=Project::all();
            return view('admin.dashboard.index',compact('projects'));
        }
        elseif(Auth::user()->role==2){
            $tasks=Task::where('user_id',auth()->user()->id)->get();
            return view('user.dashboard.index',compact('tasks'));

        }

        
    }
    public function tasks(){
        if(Auth::user()->role==1){
            $users=User::where('role',2)->get();
            $projects=Project::all();
            $tasks=DB::table('tasks as t')
                        ->join('users as u','u.id','t.user_id')
                        ->join('projects as p','p.id','t.project_id')
                        ->select(
                                ['t.name as task_name',
                                't.id as task_id',
                                'p.name as project_name',
                                't.start_time',
                                't.end_time',
                                'u.name as user_name',
                                't.description',
                                'u.hourly_rate as hrate'
                                ])
                        ->get();
                        // dd($tasks);
            return view('admin.dashboard.task',compact('tasks','users','projects'));
        }
        elseif(Auth::user()->role==2){
            return view('user.dashboard.task');
        }
        
    }
    public function reports(){
        if(Auth::user()->role==1){
            $users=User::where('role',2)->get();
            $projects=Project::all();
            
            return view('admin.dashboard.reports',compact('users','projects'));
        }
        elseif(Auth::user()->role==2){
            return view('user.dashboard.reports');
        }
        
    }
    public function search(){

        $users=User::where('role',2)->get();
        $projects=Project::all();
        
        $tasks=DB::table('tasks as t')
                    ->join('users as u','u.id','t.user_id')
                    ->join('projects as p','p.id','t.project_id')
                    ->select(
                            ['t.name as task_name',
                            't.id as task_id',
                            'p.name as project_name',
                            'p.id as project_id',
                            't.start_time',
                            't.end_time',
                            'u.name as user_name',
                            'u.id as user_id',
                            't.description',
                            'u.hourly_rate as hrate'
                    ]);
        if(request()->user){

            $tasks->where('user_id',request()->user);
        }
        if(request()->project){

            $tasks->where('project_id',request()->project);
        }

        $tasks=$tasks->get();
        $tasks->transform(function($t){
            $time_duration=(($t->end_time)?($t->end_time):0)-(($t->start_time)?($t->start_time):0);
            $payment=$time_duration*$t->hrate;

            return[
                'task_id'=>$t->task_id,
                'task_name'=>$t->task_name,
                'project_name'=>$t->project_name,
                'user_name'=>$t->user_name,
                'value'=>$payment

            ];
        });
        return view('admin.dashboard.search',compact('users','projects','tasks'));
                   
        
    }
}
