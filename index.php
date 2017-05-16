<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    session_unset();
    session_destroy();
    $_SESSION = array();
    $message = "";
    if (isset($_REQUEST['err'])) {
        if ($_REQUEST['err'] == 1) {
            $message = "Email address has already been used. Please use another email address.";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>How Well Do You Know Renzel?</title>
    <meta charset='utf-8'>
    <meta name='author' value='Renzel Manlapaz'/>
    <meta name='description' value='Renzel Manlapaz'/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://bootswatch.com/paper/bootstrap.min.css'>
    <link rel='stylesheet' href='css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='css/custom.css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
</head>
<body>
    <?php include_once("analyticstracking.php") ?>
    <div class="container centerer">
        <img class='img-circle img-responsive imgresizer imgcenterer'src='images/me.jpg' alt='RenzelFace' />
        <h1>How Well Do You Know Renzel?</h1>
        <h5>A trivia game based on how much you actually know about Renzel</h5>
        <div class="col-lg-6 col-lg-offset-3">
            <div class="well">
                <form method="POST" action="start.php" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <input type="text" name="fn" class="form-control" placeholder="&#xf007;&nbsp;&nbsp;Your First Name" required/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <input type="text" name="ln" class="form-control" placeholder="&#xf007;&nbsp;&nbsp;Your Last Name" required/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="email" name="email" class="form-control" placeholder="&#xf0e0;&nbsp;&nbsp;Your Email Address" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button name="submit" class="btn submitbtn">
                                <span>START THE QUIZ!</span>
                            </button>
                        </div>
                    </div>
                </form>
                <p class='errortext'><?php echo $message ?></p>
            </div>
        </div>
    </div>
    <script src='js/bootstrap.min.js'></script>
    <script type="text/javascript" src="js/custom.js"></script>
</body>
</html>