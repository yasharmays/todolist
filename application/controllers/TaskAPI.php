<?php

/**
 * Created by YS
 * Date: 21-12-2016
 *
 */
require APPPATH . '/libraries/REST_Controller.php';

class TaskAPI extends REST_Controller
{
    public $check_auth_client;

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

//        if(!authCheck($this->post('auth'))){
//            returnFailedResponse();
//            exit();
//        }

        $this->check_auth_client = $this->tasks->check_auth_client();

    }
    public function getTasks_get()
    {
        if($this->check_auth_client == true){
            $tasks = $this->tasks->get_all_tasks();
            $this->response($tasks, 200);
        }
//        $data = json_encode($tasks);
//        var_dump($data);
//        $data = array('returned: '. $tasks);

    }

    public function newTask_post()
    {
        if($this->check_auth_client == true) {

            $title = $this->post('title');
            $description = $this->post('description');
//        var_dump($title);
            $result = $this->tasks->api_new_task($title, $description);

            if ($result === FALSE) {
                $this->response(array('status' => 'failed'));
            } else {
                $this->response(array('status' => 'success', 'message' => ' Task created successfully'));
            }
        }
    }

    public function editTask_post($task_id)
    {
        if($this->check_auth_client == true) {
            $title = $this->post('title');
            $description = $this->post('description');
            $result = $this->tasks->api_update_task($task_id, $title, $description);
            $updatedTask = $this->tasks->get_task($task_id);

            if ($result === FALSE) {
                $this->response(array('status' => 'failed'));
            } elseif ($result = true) {
                $this->response(array('status' => 'success', 'message' => ' Task updated successfully', 'updated task' => $updatedTask));
            } else {
                $this->response(array('status' => 'failed', 'message' => ' Oops something went wrong'));
            }
        }

    }

    public function deleteTask_post($task_id)
    {
        if($this->check_auth_client == true) {
            $result = $this->tasks->delete_task($task_id);

            if ($result === FALSE) {
                $this->response(array('status' => 'failed'));
            } else {
                $this->response(array('status' => 'success', 'message' => ' Task removed successfully'));
            }
        }
    }


}