<?php

/**
 * Task Model
 */
class Tasks extends CI_Model
{

    public $title;
    public $description;
    public $created_on;
    public $updated_on;

//    //API Auth-Key
//    public $auth_key='simplerestapi';

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_last_ten_tasks()
    {
        $query = $this->db->get('tasks', 10);
        return $query->result();
    }

    public function get_all_tasks()
    {
        $query = $this->db->get('tasks');
        return $query->result();
    }

    public function insert_task()
    {
        $this->title = $_POST['title'];
        $this->description = $_POST['description'];
        $this->created_on = date('Y-m-d H:i:s');
        $this->db->insert('tasks', $this);
        return true;
    }

    public function update_task()
    {
        $this->title = $_POST['title'];
        $this->description = $_POST['description'];
        $this->updated_on = date('Y-m-d H:i:s');
        $this->db->update('tasks', $this, array('id' => $_POST['id']));
        return true;
    }

    public function get_task($task_id)
    {
        $task = $this->db->get_where('tasks', array('id' => $task_id));
        return $task->result();
    }

    public function delete_task($task_id)
    {
//        $this->db->where('id', $task_id);
        $this->db->delete('tasks', array('id' => $task_id));
        return true;
    }

    //API Functions

    public function check_auth_client(){
//        $client_service = $this->input->get_request_header('Client-Service', TRUE);
        $auth_key  = $this->input->get_request_header('Auth-Key', TRUE);
//        if($client_service == $this->client_service && $auth_key == $this->auth_key){
        if($auth_key == 'simplerestapi'){
            return true;
        } else {
            return json_output(401,array('status' => 401,'message' => 'Unauthorized.'));
        }
    }

    public function api_new_task($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
        $this->created_on = date('Y-m-d H:i:s');
        $this->db->insert('tasks', $this);
        return true;
    }

    public function api_update_task($task_id, $title, $description)
    {
        $this->title = $title;
        $this->description = $description;
        $this->updated_on = date('Y-m-d H:i:s');
        $this->db->update('tasks', $this, array('id' => $task_id));
        return true;
    }


}
