<?php
/**
 * Task Controller
 */

class Task extends CI_Controller
{

//   public function __construct()
//    {
//        $this->load->library('session');
//    }

    public function index()
    {
        $data['todo_list'] = $this->tasks->get_all_tasks();
        $data['title'] = "Tasks";
        $data['heading'] = "Tasks to do";
        $data['deleted'] ="no";
        $this->load->view('task_view', $data);
    }

    public function newTask()
    {
        $data['title'] = "Tasks | New";
        $data['heading'] = "Add New Task";
        $this->load->view('task_new', $data);

    }
    public function editTask($task_id)
    {
        if($task_id){
            $task =$this->tasks->get_task($task_id);
            if($task){

                $title= $task[0]->title;
                $data['task_id']= $task_id;
                $data['task_title']= $title;
                $data['title'] = "$title | Edit";
                $data['heading'] = "Edit $title";
                $data['description']= $task[0]->description;
                $this->load->view('task_edit', $data);
            }
        }
    }

    public function deleteTask($task_id){
        if($task_id){
            $task =$this->tasks->get_task($task_id);
            if($task){
               $change = $this->tasks->delete_task($task_id);
                $data['change']=$change;
                $data['todo_list'] = $this->tasks->get_last_ten_tasks();
                $data['title'] = "Tasks";
                $data['heading'] = "Tasks to do";
                $data['deleted'] ="yes";
                $this->load->view('task_view', $data);
            }
        }
    }
}