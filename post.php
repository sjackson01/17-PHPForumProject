<?php # Script 17.7 - post.php
// This page handles the message  post.
// It also displays the form if creating a new thread.
include('inc/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){ // Handle the form.

    // Language ID is in the session.
    // Validate thread ID ($tid), which may not be present:
    if (isset($_POST['tid']) && filter_var($_POST['tid'], FILTER_VALIDATE_INT, array('min_range' => 1))){

        $tid = $_POST['tid'];

    }else{
        $tid = FALSE; 
    }

    if (!$tid && empty($_POST['subject'])){
        $subject = FALSE;
        echo '<p class="bg-danger">Please enter a subject for this post.</p>';
    }elseif(!$tid && !empty($_POST['subject'])){
        $subject = htmlspecialchars(strip_tags($_POST['subject']));
    }else{
        $subject = TRUE;
    }

    //Validate the body:
    if (!empty($_POST['body'])){
        $body = htmlentities($_POST['body']);
    } else {
        $body = FALSE;
        echo '<p class="bg-danger">Please enter a body for this post.</p>';
    }

    if ($subject && $body){ //OK

        /// Add the message to the database
        if(!$tid){ // Create new thread
            $q = "INSERT INTO threads (lang_id, user_id, subject) 
            VALUES ({$_SESSION['lid']}, {$_SESSION['user_id']}, '" . mysqli_real_escape_string($dbc, $subject) . "')";
            $r = mysqli_query($dbc, $q);

            if(mysqli_affected_rows($dbc) === 1){
                echo '<p class="bg-success">Your post has been entered.</p>';
            }else{
                echo '<p class="bg-danger">Your post could not be handled due to a system error.</p>';
            }
        } // Valid $tid
    }else{ // Include the form
        include('inc/post_form.php');
    }

}else{
    include('inc/post_form.php');
}