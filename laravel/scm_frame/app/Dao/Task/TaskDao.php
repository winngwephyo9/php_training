<?php
namespace App\Dao\Task;

use App\Models\Task;
use App\Contracts\Dao\Task\TaskDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class TaskDao implements TaskDaoInterface{
    /**
     * To get TaskLists
     * @return tasklists
     */
    public function getTask(){
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return $tasks;

    }    
    /**
     * post task
     * @param object $request validated values from request
     * @return object 
     */
    public function postTask($request){
        // Create The Task...
        $task = new Task;
        $task->name = $request->name;
        $task->save();
        return $task;
    
    }

    
    /**
     * Delete An Existing Task
     * @param string $id task id 
     * return
     */
    public function deleteTask($id){
        Task::findOrFail($id)->delete();
        return 'Delete SuccessFully';
        
    }

}
