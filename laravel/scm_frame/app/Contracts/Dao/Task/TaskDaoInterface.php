<?php
namespace App\Contracts\Dao\Task;

use App\Http\Requests\UserAddRequest;
use Illuminate\Http\Request;
/**
 * Interface for Data Accessing Object of Post
 */
interface TaskDaoInterface
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
    public function postTask($request);
    /**
     * To delete task
     * @param string $id task id
     * @return
     */
    public function deleteTask($id);
}
?>