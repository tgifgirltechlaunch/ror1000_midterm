<?php
    session_start();
    if( ! count($_SESSION)) header("Location: login.php");
    $email = $_SESSION['email'];
    $img = $_SESSION['img'];
?>
<?php include "includes/header.php"; ?>
    <div id="topbar"><span><?=$email?></span></div>
    <div class="homewrap">
        <div class="homeimg"><img src="<?php echo $img ?>"></div>
        <div class="homemain"><h1>Home</h1><p id="welcome">Welcome to your home screen <?=$email?>.</p></div>
    </div>
<?php include "includes/footer.php"; ?>
