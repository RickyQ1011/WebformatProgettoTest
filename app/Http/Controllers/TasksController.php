<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Employee;

//Controller used to manage all stuff about tasks

class TasksController extends Controller
{
    //function displayed when /tasks route is called
    public function index()
    {
        $oldTaskOfEmployee = collect([]);

        //function that return all dead tasks (task deadline in the past!)
        $oldTasks = Task::all()->reject(function ($task) {
            return $task->deadline >= date("Y-m-d");
        })->map(function ($task) {
            return $task;
        });
       
        /*for each dead task, creating custom collection. 
        On the key value, I put the task name and on the valuee the concatenate string (name and surname of the employee)*/
        foreach ($oldTasks AS $task){         
            $oldTaskOfEmployee[$task->id] = collect(["task_name" => $task->description, "employee_name" => collect([]) ]);
            $task->employees->each(function ($employeeInTask) use ($oldTaskOfEmployee, $task){
                    //get employee data on matching IDs;   
                    $employeeData = Employee::where('id', '=', $employeeInTask->id)->first();
                    //push data wanted in the collect
                    $oldTaskOfEmployee[$task->id]["employee_name"] -> push($employeeData->name. " ".$employeeData->surname);
                });  
        }        

        //return parameters to show in view task.blade
        return view('tasks', [
            'tasks' => Task::all(), 'oldTasks' => $oldTasks, 'oldTaskOfEmployee' => $oldTaskOfEmployee, 'layout' => 'index'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('task', [
            'task' => Tasks::all(), 'layout' => 'create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $task = new Tasks();
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->deadline = $request->input('deadline');
        /*
        $task->status = $request->input('status');
        $task->projects = $request->input('project');
        */
        $task->save ();
        return redirect ('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       /* return view('employee', [
            'employee' => Employees::find($id),
        ]);*/
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $task = Task::find ($id);
        $tasks = Tasks::all ();
        return view('task', [
            'tasks' => $tasks, 'task' => $task, 'layout' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $task = Tasks::find ($id);
        
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->deadline = $request->input('deadline');
        

        $employee->save ();
        return redirect ('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $task = Tasks::find ($id);
        
        $task->delete ();
        return redirect ('/task');
    }
}
