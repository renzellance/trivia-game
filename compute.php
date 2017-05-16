<?php
    include_once('config.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_POST['compute'])) {
        $totalscore = 0;
        for ($i = 1; $i < 21; $i++) {
            $sql_getanswers = "SELECT correct FROM questions WHERE questionID=$i";
            $result_answers = $con->query($sql_getanswers) or die(mysqli_error($con));
            while ($row = mysqli_fetch_array($result_answers))
            {
                $answer = $row['correct'];
            }
            $tocheck = $_POST['question-' . $i . '-answers'];
            if ($tocheck == $answer) {
                $totalscore++;
            }
        }
        $takerinfo = $_SESSION['takerinfo'];
        $takerln = $takerinfo[0];
        $takerfn = $takerinfo[1];
        $takeremail = $takerinfo[2];
        $sql_add = "INSERT INTO takers VALUES('', '$takerln', '$takerfn', '$takeremail', $totalscore, NOW())";
        $result_add = $con->query($sql_add) or die(mysqli_error($con));
        $takerid = $con->insert_id;
        for($i = 1; $i < 21; $i++) {
            ${"q$i"} = $_POST['question-' . $i . '-answers'];
        }
        $sql_add_answers = "INSERT INTO answers VALUES ('', $takerid, '$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9', '$q10', '$q11', '$q12', '$q13', '$q14', '$q15', '$q16', '$q17', '$q18', '$q19', '$q20')";
        $result_add_answers = $con->query($sql_add_answers) or die(mysqli_error($con));

        header('location: end.php');
    }
    else {
        header('location: index.php');
    }
?>