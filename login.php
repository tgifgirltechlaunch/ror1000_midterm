<?php
    session_start();
    if(count($_SESSION)) header("Location: home.php");
    $msg = isset($_GET["msg"]) ? $_GET["msg"] : '';
    $msgtxt = "";
?>

<?php include "includes/header.php"; ?>
    <div class="logincontainer">
    <!-- 

    let users change their email and password
        login asking email and password
        accessing a.php or b.php will redirect to login if not signed in
    
    when logging in, display email of person logged in -->
    
        <h1>Log In</h1>

        <?php if ( $msg == 1 ) { $msgtxt = "Please check your email and try again."; }
        if ( $msg == 2 ) { $msgtxt = "Please enter a valid password."; }
        if ( $msg == 3 ) { $msgtxt = "There are no records matching your email and password. Please try again."; }
        if ( $msg == 4 ) { $msgtxt = "Your information does not match our records."; }
        if ( $msg == 5 ) { $msgtxt = "We were unable to access the data. Please contact administrator."; }
        if ( $msg == 6 ) { $msgtxt = "File does not exist. Please create an account."; }
        if ( $msg == 1 || $msg == 2 || $msg == 3 || $msg == 4 || $msg == 5 || $msg == 6 ) { ?>
            <div class="alert alert-danger" role="alert"><?php echo $msgtxt ?></div>
        <?php } else { $msgtxt = ""; } ?>

        <form id="frmlogin" action="controllers/loginSubmit.php" method="post">

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-envelope hvr-pop"></i></span>
                </div>
                <input name="email" class="form-control" type="text" placeholder="Email">
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-key fa-fw hvr-push"></i></span>
                </div>
                <input name="pass" class="form-control" type="password" placeholder="Password">
            </div>
            <input type="submit" class="btn btn-primary btn-lg hvr-wobble-horizontal" value="&#xf090; Log In" />
        </form>
        <div class="padtop">Not a member? <a href="signup.php">Sign Up</a></div>
    </div>
<?php include "includes/footer.php"; ?>
