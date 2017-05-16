<?php
    include_once('../config.php');
    if (isset($_REQUEST['id'])) {
        if (ctype_digit($_REQUEST['id'])) {
            $sql_getq = "SELECT question from questions";
            $result_getq = $con->query($sql_getq) or die(mysqli_error($con));
            $sql_getc = "SELECT correct from questions";
            $result_getc = $con->query($sql_getc) or die(mysqli_error($con));
            $tid = $_REQUEST['id'];
            $sql_gett = "SELECT takerID, takerLastName, takerFirstName, takerEmail, takerScore, dateTaken from takers WHERE takerID=$tid";
            $result_gett = $con->query($sql_gett) or die(mysqli_error($con));
            $sql_geta = "SELECT * from answers WHERE takerID=$tid";
            $result_geta = $con->query($sql_geta) or die(mysqli_error($con));
        }
        else {
            header('location: index.php');
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
    <link rel='stylesheet' href='../css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://bootswatch.com/paper/bootstrap.min.css'>
    <link rel='stylesheet' href='../css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='../css/custom.css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
</head>
<body>
    <?php include_once("../analyticstracking.php") ?>
    <h1 class="text-center">Viewing Results of Taker #<?php echo $tid?></h1>
    <div class="container well">
        <div class="fontresize">
            <div class="col-lg-12">
                <?php
                    if (mysqli_num_rows($result_gett) > 0) {
                        while($row = mysqli_fetch_array($result_gett))
                        {
                            $tid = $row['takerID'];
                            $tln = $row['takerLastName'];
                            $tfn = $row['takerFirstName'];
                            $tem = $row['takerEmail'];
                            $tsc = $row['takerScore'];
                            $date = new DateTime($row['dateTaken']);
                        }

                        echo "
                            <h4><b>Full Name:</b> $tfn $tln</h3><br/>
                            <h4><b>Email:</b> $tem</h3><br/>
                            <h4><b>Score:</b> $tsc</h3><br/>
                            <h4><b>Date Taken:</b> " . $date->format('F d, Y g:i A') . " </h3><br/>
                        ";
                    }
                    else {
                        header('location: index.php');
                    }
                ?>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-10">
                    Question<hr/>
                    <?php
                        while($row = mysqli_fetch_array($result_getq))
                        {
                            $q = $row['question'];
                            echo "<span class='blackify'>$q </span><hr/>";
                        }
                    ?>
                </div>
                <div class="col-lg-1">
                    Answer<hr/>
                    <?php
                        while($row = mysqli_fetch_array($result_geta))
                        {
                            $q1 = $row['q1Answer'];
                            $q2 = $row['q2Answer'];
                            $q3 = $row['q3Answer'];
                            $q4 = $row['q4Answer'];
                            $q5 = $row['q5Answer'];
                            $q6 = $row['q6Answer'];
                            $q7 = $row['q7Answer'];
                            $q8 = $row['q8Answer'];
                            $q9 = $row['q9Answer'];
                            $q10 = $row['q10Answer'];
                            $q11 = $row['q11Answer'];
                            $q12 = $row['q12Answer'];
                            $q13 = $row['q13Answer'];
                            $q14 = $row['q14Answer'];
                            $q15 = $row['q15Answer'];
                            $q16 = $row['q16Answer'];
                            $q17 = $row['q17Answer'];
                            $q18 = $row['q18Answer'];
                            $q19 = $row['q19Answer'];
                            $q20 = $row['q20Answer'];
                            for ($i = 1; $i < 21; $i++) {
                                $sql_getanswers = "SELECT correct FROM questions WHERE questionID=$i";
                                $result_answers = $con->query($sql_getanswers) or die(mysqli_error($con));
                                while ($row = mysqli_fetch_array($result_answers))
                                {
                                    $answer = $row['correct'];
                                }
                                $tocheck = ${"q$i"};
                                if ($tocheck == $answer) {
                                    echo "<p class='text-center greenify'>" . ${"q$i"} . "</p><hr/>";
                                }
                                else {
                                    echo "<p class='text-center errortext'>" . ${"q$i"} . "</p><hr/>";
                                }
                            }
                        }
                    ?>
                </div>
                <div class="col-lg-1">
                    Correct<hr/>
                    <?php
                        while($row = mysqli_fetch_array($result_getc))
                        {
                            $c = $row['correct'];
                            echo "<p class='text-center blueify'>$c</p> <hr/>";
                        }
                    ?>
                </div>
            </div>
        </div>
        <a href='index.php'><span class='buttonpretender fontresize'>Back</span></a>
    </div>
    <script src='js/bootstrap.min.js'></script>
    <script type="text/javascript" src="../js/custom.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function(){
		    $('#tblTakers').DataTable();
		});
	</script>
</body>
</html>