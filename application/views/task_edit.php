<?php
//$tasks= $this->db->get('tasks');
if ($_POST&& $_POST['id']) {

    if (!$_POST['title']) {
        $_POST['title'] = "";
    }
    if (!$_POST['description']) {
        $_POST['description'] = "";
    }
    $change = $this->tasks->update_task();

    if($change == true){
        $message = array('message' => 'Task updated successfully','class' => 'alert alert-success fade in');
        $this->session->set_flashdata('item', $message);

    }else{
        $message = array('message' => 'Oops! something went wrong','class' => 'alert alert-danger fade in');
        $this->session->set_flashdata('item',$message );
    }
    $this->load->helper('url');
    $url = prep_url('http://localhost/todo/');
    redirect($url);
}

?>
<html>
<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body  class="col-md-10">
<div class="container" >
    <h1 class="header"><?php echo $heading; ?></h1>
</div>
<form id="editTask" class="col-md-8" action="" method="post">
    <div class="form-group">
        <input class="form-control" type="text" name="title" value="<?php echo $task_title; ?>"/>
    </div>
    <div class="form-group">
        <textarea class="form-control" name="description"><?php echo $description; ?></textarea>
    </div>
    <input type="hidden" name="id" value="<?php echo $task_id; ?>">
    <div class="form-group">
        <button class="btn btn-default" type="submit">Update task</button>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>
