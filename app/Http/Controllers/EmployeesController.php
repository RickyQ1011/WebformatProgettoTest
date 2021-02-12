<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Task;
use App\Models\Badge;
use App\Models\Company;
use App\Models\Role;
use App\Models\Team;

class EmployeesController extends Controller
{
    private $enableCreate = false;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Return list of all employees
        return view('employees', [
            'employees' => Employee::all(), 'layout' => 'index'
        ]);
    }

    public function create()
    {          
        return view('employees', [
         'layout' => 'create'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*Only employee with CEO role can insert new employee in company so, first control used to check CEO role
        If the user is not a CEO, can't save data of new employee*/

        $checkCeo = $request->input('ceoCheck');
        $employeeCeo = Employee::find($checkCeo);
        $role = $this->getEmployeeRole($employeeCeo);
        
        if ($role == "CEO"){
            $this->enableCreate = true;
        }

        if($this->enableCreate){
            //get all form insert parameters
            $badge_id = $request->input('badge_id');
            $company_id = $request->input('company_id');
            $role_id = $request->input('role_id');
            $team_id = $request->input('team_id');

            $name = $request->input('name');
            $surname = $request->input('surname');

            $badge = Badge::find($badge_id);       
            $company = Company::find($company_id);
            
            $role = Role::find($role_id);
            $team = Team::find($team_id);
                    
            //creating new employee
            $employee = new Employee();            
            $employee->badge()->associate($badge);
            $employee->company()->associate($company);
            $employee->role()->associate($role);
            $employee->team()->associate($team);

            $employee->name = $name;
            $employee->surname = $surname;
            
            //Insert data in database
            $employee->save();
            $employee->refresh();
        }
        else{
            //simply wrong message return
            return "Non sei un utente con ruolo CEO pertanto non puoi inserire nuovi impiegati";
        }
        //redirect on list of employees
        return redirect ('/employees');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assignTask(Request $request)
    {
        //function used to assign new task to employee
        $task_id = $request->input('task_id');
        $employee_id = $request->input('employee_id');
        $task = Task::find($task_id);
        
        //if ID task is valid. Here we must have to control also if the future task is already a task of the employee
        if($task != null){
            $employee = Employee::find($employee_id);            
            if ($employee->role->role_name == 'DEV'){
                $employee->tasks()->attach($task);
                $employee->save();
                return redirect ('/employee/'.$employee_id);
            }
            else{
                //simply wrong message return
                return "Utente non dev";
            }
        }
        else{
            //simply wrong message return
            return "Task non assegnato. Riprovare.";
        }
        
    }

    //Custom function usefull everywhere to get the role of an employee
    protected function getEmployeeRole($employee){
        return $employee->role->role_name;
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
        $employee = Employee::find ($id);
        $employees = Employee::all ();
        //call to custom function to get the role of employee
        $roleEmployee = $this->getEmployeeRole($employee);

        //Get PM of employee (PM in same team)
        $teamID = $employee->team->id;       
        $teamName = $employee->team->team_name;
        $teamPMOfEmployee = Employee::where('team_id', '=', $teamID)->where('role_id', '=', 2)->get();
      
        
        return view('employees', [
            'employees' => $employees, 'employee' => $employee, 'tasks' => $employee->tasks , 'pm' => $teamPMOfEmployee, 'team_name' => $teamName, 'role' => $roleEmployee, 'layout' => 'show'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $employee = Employee::find ($id);
        
        $employee->name = $request->input('name');
        $employee->surname = $request->input('surname');
        $employee->save ();
        return redirect ('/');
    }

    public function deleteTask(Request $request)
    {
        //Get parameter usefull to delete a task of employee
        
        $task_id = $request->input('task_id');
        $employee_id = $request->input('employee_id');
        $task = Task::find($task_id);
        
        /*Check if the ID of task is really belonging to employee*/
        
        if($task != null){
            $employee = Employee::find($employee_id);  
            
            //Remove task from db and save
            $employee->tasks()->detach($task);
            $employee->save();
            //redirect to the employee page
            return redirect ('/employee/'.$employee_id);
        }
        else{
            //simply wrong message return
            return "Cancellazione del task non riuscita. Riprovare.";
        }
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
        $employee = Employee::find ($id);
        
        $employee->delete ();
        return redirect ('/');
    }
  
}
