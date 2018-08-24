<?php
    session_start();
    // get values from the url
    $tempEmail = $_SESSION['email'];
    $tempPass = $_SESSION['pass'];
    $tempImg = $_SESSION['img'];
    $pass = $_POST['pass'];
    $confirmpass = $_POST['confirmpass'];
    if (!empty($_POST['img'])){$img = $_POST['img'];}
    else{$img = './images/noimg.png';}


    // validate user values
    if(strlen(trim($pass)) < 6){
        // send back with wrong password error
        header('Location: ../profile.php?msg=1');
    }else if($pass != $confirmpass){
        // send back with password do not match error
        header('Location: ../profile.php?msg=2');
    }else{
        // use hash to encrypt password
        $pass = md5($_POST['pass']);

        if(file_exists('../database.db')) {
            // pull user info from the file
            $content = unserialize(file_get_contents('../database.db'));
            // create array with new values
            $new = ['pass'=>$pass, 'img'=>$img];
 
            foreach($content as $item)
            {
                if($item['email'] == $tempEmail){
                    $content[$tempEmail] = ['pass'=>$pass, 'img'=>$img]; 
                }
            }
            
            // print_r($content); //show all records
            // exit;

            // change the session data
            $_SESSION = ['email'=>$email, 'pass'=>$pass, 'img'=>$img];
            // save the changes in a file
            $session = serialize($content);
            
            
            // serialize(file_put_contents('../database.db', $session));
            file_put_contents('../database.db', $session);

            //redirect to profile after saving data
            header("Location: ../profile.php");
            
        }  
        
    }
?>

<!-- A solution is to have a file storing an array like this:
$users = ["salvi@techlaunch.io"=>"md5pass", "gluciado@techlaunch.io"=>"md5pass"];


Then load that array from the file before the if statement
and check in the if like this:

if($users[$email] == $md5pass) {
    stuff here
} -->