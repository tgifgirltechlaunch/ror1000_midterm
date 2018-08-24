<?php
    // get values from the url
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $confirmpass = $_POST['confirmpass'];
    if (!empty($_POST['img'])){$img = $_POST['img'];}
    else{$img = './images/noimg.png';}

    // validate user values
    if( ! filter_var($email, FILTER_VALIDATE_EMAIL)){
        // send back with wrong email error
        header('Location: ../signup.php?msg=1');
    }
    else {
        if(strlen(trim($pass)) < 6){
            // send back with wrong password error
            header('Location: ../signup.php?msg=2');
        }else if($pass != $confirmpass){
            // send back with password do not match error
            header('Location: ../signup.php?msg=3');
        }else{
            // use hash to encrypt password
            $pass = md5($_POST['pass']);

            if(file_exists('../database.db')) {
                //make the serialized file string into a value array
                $content = unserialize(file_get_contents('../database.db'));
                
                if(is_array($content) && in_array ($email, $content)) {
                    // send back with existing email error
                    header('Location: ../signup.php?msg=4');
                }else{
                    
                    //place email, password, img URL in an array
                    $arr = ['email'=>$email, 'pass'=>$pass, 'img'=>$img];
                    
                    //add data to array
                    $content[$email]=$arr;
                    
                    //serialize array
                    $newcontent = serialize($content);

                    //place new content in file
                    file_put_contents('../database.db', $newcontent );

                    // pull user info from the file and assign to session variable
                    $session = ['email'=>$email, 'pass'=>$pass, 'img'=>$img];

                    // start the session
                    session_start();
                    //put session variables in SESSION
                    $_SESSION = $session;
                    //redirect to home after successful login
                    header("Location: ../home.php");
                }
            }  
        }
    }
?>
