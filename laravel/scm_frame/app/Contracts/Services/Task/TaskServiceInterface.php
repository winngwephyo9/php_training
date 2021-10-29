<?php
namespace App\Contracts\Services\Task;


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
    public function postTask($request);
    /**
     * To delete task
     * @param string $id task id
     * @return
     */
    public function deleteTask($id);
}
?>