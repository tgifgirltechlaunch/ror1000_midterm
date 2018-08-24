<?php $page = ucfirst(str_replace('.php', '', basename($_SERVER['PHP_SELF']))); 
    if(isset($_SESSION['email'])){$email = $_SESSION['email'];}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Amaranth|Cairo|Nunito" rel="stylesheet">
    <link href="./css/hover.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="./css/style.css">
    <title><?=$page?></title>
    
</head>
<body class="pt-5">
    <div class="container">
        <?php if($page != "Login" && $page != "Signup"){ ?> 
            <nav class="navbar fixed-top navbar-custom">
                <div class=""><a href="home.php" <?php if($page=="Home"){ ?>id="active"<?php } ?>>Home</a></div>
                <div class=""><a href="profile.php" <?php if($page=="Profile"){ ?>id="active"<?php } ?>>Profile</a></div>
                <div class=" left"><a class="navbar-brand" href="./controllers/logoutSubmit.php">Logout</a></div>
            </nav>
        <?php } ?>
 