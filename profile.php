<?php
    session_start();
    if( ! count($_SESSION)) header("Location: login.php");
    $email = $_SESSION['email'];
    $pass = $_SESSION['pass'];
    $img = $_SESSION['img'];
    $msg = isset($_GET["msg"]) ? $_GET["msg"] : '';
    $msgtxt = "";
?>

<?php include "includes/header.php"; ?>
<div id="topbar"><span><?=$email?></span></div>
    <h1>Profile</h1>
    <p id="welcome">This is your current information <?=$email?>.</p>

    <div class="wrapper">
        <div class="innerWrapper">
            <div class="box">
                <div class="profileimg"><img src="<?php echo $img ?>"></div>
                <div>Email: <?=$email?></div>
                <div>Password: <?=$pass?></div>
            </div>
            <div class="box">
                <?php if ( $msg == 1 ) { $msgtxt = "Your password must be 6 or more characters long."; }
                    if ( $msg == 2 ) { $msgtxt = "Your passwords did not match. <br> Please try again."; }
                    if ( $msg == 1 || $msg == 2 ) { ?>
                        <div class="alert alert-danger" role="alert"><?php echo $msgtxt ?></div>
                <?php } else { $msgtxt = ""; } ?>

                <form id="frmlogin" action="controllers/profileSubmit.php" method="post">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-unlock hvr-push"></i></span>
                        </div>
                        <input name="pass" class="form-control" type="password" placeholder="Password">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-unlock-alt hvr-pop"></i></span>
                        </div>
                        <input name="confirmpass" class="form-control" type="password" placeholder="Confirm Password">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-user hvr-push hvr-pop"></i></span>
                        </div>
                        <input name="img" class="form-control" type="text" placeholder="Image URL">
                    </div>
                    <input type="submit" class="btn btn-primary btn-lg hvr-wobble-horizontal" value="&#xf101; Change" />
                </form>
            </div>
        </div>
    </div>

<?php include "includes/footer.php"; ?>