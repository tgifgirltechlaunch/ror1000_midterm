<?php
    session_start();
    if(count($_SESSION)) header("Location: home.php");
    $msg = isset($_GET["msg"]) ? $_GET["msg"] : '';
    $msgtxt = "";
?>

<?php include "includes/header.php"; ?>
    <div class="logincontainer">
        <h1>Sign Up</h1>

        <?php if ( $msg == 1 ) { $msgtxt = "Please check your email and try again."; }
        if ( $msg == 2 ) { $msgtxt = "Your password must 6 or more characters long."; }
        if ( $msg == 3 ) { $msgtxt = "Your passwords did not match. <br> Please try again."; }
        if ( $msg == 4 ) { $msgtxt = "An account with that email already exists. <br> Log in or try again."; }
        if ( $msg == 1 || $msg == 2 || $msg == 3 || $msg == 4 ) { ?>
            <div class="alert alert-danger" role="alert"><?php echo $msgtxt ?></div>
        <?php } else { $msgtxt = ""; } ?>

        <form id="frmsignup" action="controllers/signupSubmit.php" method="post">

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-envelope hvr-pop"></i></span>
                </div>
                <input name="email" class="form-control" type="text" placeholder="Email">
            </div>

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
                    <span class="input-group-text"><i class="far fa-user hvr-push"></i></span>
                </div>
                <input class="form-control" type="text" name="img" placeholder="Image URL"/>
            </div>

            <input type="submit" class="btn btn-primary btn-lg hvr-wobble-horizontal" value="&#xf090; Sign Up" />
        </form>
        <div class="padtop">Have account? <a href="login.php">Log In</a></div>
    </div>
<?php include "includes/footer.php"; ?>
