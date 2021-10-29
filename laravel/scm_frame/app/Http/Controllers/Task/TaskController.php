<?php

namespace App\Http\Controllers\Task;

use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\Task\TaskServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddRequest;
use Illuminate\Http\Request;

/**
 * This is Post controller.
 * This handles Post CRUD processing.
 */
class TaskController extends Controller
{
    /**
     * Task Interface
     */
    private $taskInterface;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
        $this->taskInterface = $taskServiceInterface;
    }
    /**
     * To get TaskLists
     * @return tasklists
     */
    public function showTaskList()
    {
        $tasks = $this->taskInterface->getTask();
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }
    /**
     * add task
     * @param UserAddRequest $request
     * return View task list
     */
    public function postTask(UserAddRequest $request)
    {
        $validated = $request->validated();
        $this->taskInterface->postTask($request);
        return redirect('/');
    }
    /**
     * To delete task
     * @param String 4id
     * return view task list
     */

    public function deleteTask($id)
    {
        $msg = $this->taskInterface->deleteTask($id);
        return redirect('/')->with('message', $msg);
    }
}
