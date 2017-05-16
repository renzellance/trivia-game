<?php
    include_once('config.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['takerinfo'])) {
        $takerinfo = $_SESSION['takerinfo'];
        $takerln = $takerinfo[0];
        $takerfn = $takerinfo[1];
        $takeremail = $takerinfo[2];
        $totalscore = 0;
        $sql_getinfo = "SELECT takerScore from takers WHERE takerLastName='$takerln' AND takerFirstName='$takerfn' AND takerEmail='$takeremail'";
        $result_getinfo = $con->query($sql_getinfo) or die(mysqli_error($con));
        while ($row = mysqli_fetch_array($result_getinfo))
        {
            $totalscore = $row['takerScore'];
        }

        $message = "";
        $message2 = "";
        if ($totalscore == 20) {
            $message = "Perfect!";
            $message2 = "You know Renzel's ins and outs! Are you sure you're not Renzel himself? If not, then you must be someone obsessed with him to know that much about him. Kinda creepy if you ask me.";
        }
        if ($totalscore <= 19 && $totalscore >= 15) {
            $message = "Close Friends!";
            $message2 = "You're knowledgeable about Renzel! You must be really close to him to know so much! Renzel's pretty lucky to have someone like you who takes the time and effort to get to know him.";
        }
        if ($totalscore <= 14 && $totalscore >= 10) {
            $message = "Casual Friends!";
            $message2 = "You know lots of things about Renzel! Sounds like you're good friends with him! Maybe you guys hang out from time to time? Maybe you have the same interests? Either way, thanks for keeping him company.";
        }
        if ($totalscore <= 9 && $totalscore >= 5) {
            $message = "Acquaintances!";
            $message2 = "You know some things about Renzel! You can stand to be closer to him though, he's not so bad. Try befriending him some more to get a higher score!";
        }
        if ($totalscore <= 4) {
            $message = "Stranger Danger!";
            $message2 = "You barely know Renzel! Are you a stranger? You should really try to get to know him first before answering this quiz.";
        }
    }
    else {
        header('location: index.php');
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
    <h1 class="text-center">Your Results</h1>
    <div class="container">
        <div class="well fontresize">
            <h2>Hello <?php echo $takerfn?>! Here are your results:</h2>
            <h3>Score: <span class='blueify'><?php echo $totalscore ?></span></h3>
            <h3><?php echo $message?></h3>
            <p><?php echo $message2?></p> <hr/>
            <div class="text-center">
                Thanks for taking the quiz! <a href="http://renzelmanlapaz.com">Return to main website.</a>
            </div>
        </div>
    </div>
    <script src='js/bootstrap.min.js'></script>
    <script type="text/javascript" src="js/custom.js"></script>
</body>
</html>