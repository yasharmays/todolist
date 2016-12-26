<?php

if ($_POST) {
    if (!$_POST['title']) {
        $_POST['title'] = "";
    }
    if (!$_POST['description']) {
        $_POST['description'] = "";
    }
        $change = $this->tasks->insert_task();

        if($change == true){
            $message = array('message' => 'Task created successfully','class' => 'alert alert-success fade in');
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body  class="col-md-10">
<div class="container" >
    <?php
// Success/ error message
    if($this->session->flashdata('item')) {
        $message = $this->session->flashdata('item');
        ?>
        <div class="<?php echo $message['class'] ?>"><?php echo $message['message']; ?>

        </div>
        <?php
    }
    ?>

    <h1 class="header"><?php echo $heading; ?></h1>
</div>
<form id="newTask" class="col-md-8" action="" method="post">
    <div class="form-group">
        <input class="form-control" type="text" name="title" placeholder="Title"/>
    </div>
    <div class="form-group">
        <textarea class="form-control" name="description" placeholder="Description"></textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-default" type="submit" name="submit">Add task</button>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="application/javascript">
    /** After windod Load */
    $(window).bind("load", function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                $(this).remove();
            });
        }, 4000);
    });
</script>

</body>
</html>

