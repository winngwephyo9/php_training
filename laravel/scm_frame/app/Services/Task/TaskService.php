<?php
namespace App\Services\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;
/**
 * Service class for post.
 */
 class TaskService implements  TaskServiceInterface{
     private $taskDao;
     /**
   * Class Constructor
   * @param TaskDaoInterface
   * @return
   */
  public function __construct(TaskDaoInterface $taskDao)
  {
    $this->taskDao = $taskDao;
  }
  /**
   * To get Task Lists
   * @return Task Lists
   */
  public function getTask(){
    return $this->taskDao->getTask();
}
/**
 * To Post Task
 * @param object $request 
 * @return object created task object
 */
  public function postTask($request){
      return $this->taskDao->postTask($request);
  }
  /**
   * To delete Task
   * @param string $id task
   * @return
   */
  public function deleteTask($id){
      return $this->taskDao->deleteTask($id);

  }
 }
