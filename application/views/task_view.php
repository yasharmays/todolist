<?php
//$tasks= $this->db->get('tasks');
if($deleted=='yes')
if($change == true){
    $message = array('message' => 'Task removed successfully','class' => 'alert alert-success fade in');
    $this->session->set_flashdata('item', $message);

}else{
    $message = array('message' => 'No such task found','class' => 'alert alert-danger fade in');
    $this->session->set_flashdata('item',$message );
}
?>
<style>

    .btn, .table{
        margin: 10px !important;
    }
</style>
<html>
<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body class="col-md-10">
<div class="alert ">
<!--    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
<!--    <strong>Success!</strong> Indicates a successful or positive action.-->
</div>

<h1 class="container"><?php echo $heading; ?></h1>
<div class="container">
    <?php
//    if()
    // Success/ error message
    if($this->session->flashdata('item')) {
        $message = $this->session->flashdata('item');
        ?>
        <div class="<?php echo $message['class'] ?>"><?php echo $message['message']; ?>

        </div>
        <?php
    }
    ?>
    <a href="http://localhost/todo/task/new" class="btn btn-default" type="button"><i class="glyphicon glyphicon-plus"></i>  New task</a>
</div>
<div class="table-responsive">
    <table class="table">
        <th>Title</th>
        <th>Description</th>
        <th>Created on</th>
        <th>Actions</th>
<!--        <th></th>-->
        <?php foreach ($todo_list as $item): ?>
        <tr>
            <td><?php echo $item->title;?></td>
            <td><?php echo $item->description;?></td>
            <td><?php echo $item->created_on;?></td>
            <td>
                <a href="http://localhost/todo/task/edit/<?php echo $item->id;?>" title="Edit task "><i class="glyphicon glyphicon-edit"></i></a>&#x00A0;&#x00A0;&#x00A0;
                <a href="http://localhost/todo/task/delete/<?php echo $item->id;?>" title="Remove task "><i class="glyphicon glyphicon-trash"></i></a>
            </td>

        </tr>
        <?php endforeach; ?>
    </table>
</div>
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