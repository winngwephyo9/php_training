<?php
namespace App\Contracts\Services\Task;

use App\Http\Requests\UserAddRequest;
use Illuminate\Http\Request;
/**
 * Interface for Data Accessing Object of Post
 */
interface TaskServiceInterface
{
/**
 * to get task
 * @return task lists
 */
 public function getTask();
 /**
  * @return object created tak object
  * @param object $request 
  * To save task
  */
    public function postTask(UserAddRequest $request);
    /**
     * To delete task
     * @param string $id task id
     * @return
     */
    public function deleteTask($id);
}
?>