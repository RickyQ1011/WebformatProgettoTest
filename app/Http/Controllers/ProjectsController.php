<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

use App\Models\Badge;
use App\Models\Company;
use App\Models\Role;
use App\Models\Team;

class ProjectsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    //function displayed when /projects route is called
    public function index()
    {
        //Function that return cross projects
        $teamInProject = collect([]);

        //get all project
        $projects = Project::all ();
        foreach ($projects AS $proj){         
            $teamInProject[$proj->id] = collect(["project_name" => $proj->project_name, "team_list" => collect([]) ]);
            //get all tasks of each project
            $proj->tasks->each(function ($task) use ($teamInProject, $proj){
                //get all employees of each tasks
                $task->employees->each(function ($employee) use ($teamInProject, $proj){
                    //get team names of each employee   
                    $teamNames = Team::where('id', '=', $employee->team_id)->first();                    
                    $teamInProject[$proj->id]["team_list"] -> push($teamNames->team_name);
                });                
                
            });
            
        }
        
        //Checking team uniqueness in project
        $crossProjects = collect([]);
        foreach ($teamInProject AS $teamProject){
            if ($teamProject['team_list']->unique()->count() > 1 ){
               $crossProjects->push($teamProject['project_name']);
            }
            
        }

        //return parameters to show in view projects.blade

        return view('projects', [
            'projects' => $projects, 'crossProjects' => $crossProjects, 'layout' => 'index'
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }
}
