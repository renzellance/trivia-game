<?php
    include_once('config.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_POST['submit'])) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $ln = $_POST['ln'];
        $fn = $_POST['fn'];
        $email = $_POST['email'];
        $taker = array($ln, $fn, $email);
        $emcheck = $taker[2];
        $sql_check = "SELECT takerEmail FROM takers WHERE takerEmail='$emcheck'";
        $result_check = $con->query($sql_check) or die(mysqli_error($con));
        if (mysqli_num_rows($result_check) > 0) {
            header('location: index.php?err=1');
        }
        else {
            $_SESSION['takerinfo'] = $taker;
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
    <h1 class="text-center">Questions</h1>
    <div class="container well">
        <div class="fontresize">
           <form method="POST" action="compute.php">
                <?php
                    for ($i = 1; $i < 21; $i++) {
                        $i = $i;
                        $h = $i - 1;
                        $j = $i + 1;
                        $sql_getquestion = "SELECT question, optionA, optionB, optionC, optionD FROM questions WHERE questionID=$i";
                        $result_questions = $con->query($sql_getquestion) or die(mysqli_error($con));
                        while ($row = mysqli_fetch_array($result_questions))
                        {
                            $qQ = $row['question'];
                            $oA = $row['optionA'];
                            $oB = $row['optionB'];
                            $oC = $row['optionC'];
                            $oD = $row['optionD'];
                        }

                        if ($i == 1) {
                            echo "
                                <div id='question-$i' class='tabContent displaydefault'>
                                    <h3><b>Question $i:</b><br/><br/> $qQ</h3>
                                    <ul>
                                        <li>
                                            <input type='radio' name='question-$i-answers' id='question-$i-answers-A' value='A' required title='Please make sure that all questions in the form have been answered.'/>
                                            <label for='question-$i-answers-A'>A) $oA</label>
                                            <div class='check'></div>
                                        </li>
                                        
                                        <li>
                                            <input type='radio' name='question-$i-answers' id='question-$i-answers-B' value='B' />
                                            <label for='question-$i-answers-B'>B) $oB</label>
                                            <div class='check'></div>
                                        </li>
                                        
                                        <li>
                                            <input type='radio' name='question-$i-answers' id='question-$i-answers-C' value='C' />
                                            <label for='question-$i-answers-C'>C) $oC</label>
                                            <div class='check'></div>
                                        </li>
                                        
                                        <li>
                                            <input type='radio' name='question-$i-answers' id='question-$i-answers-D' value='D' />
                                            <label for='question-$i-answers-D'>D) $oD</label>
                                            <div class='check'></div>
                                        </li>

                                        <span id='question$j' class='buttonpretender' onclick='showStuff(this)'>Next</span>
                                    </ul>
                                </div>
                            ";
                        }
                        elseif ($i == 20) {
                            echo "
                                <div id='question-$i' class='tabContent'>
                                    <h3><b>Question $i:</b><br/><br/> $qQ</h3>
                                    <ul>
                                        <li>
                                            <input type='radio' name='question-$i-answers' id='question-$i-answers-A' value='A' required title='Please make sure that all questions in the form have been answered.'/>
                                            <label for='question-$i-answers-A'>A) $oA</label>
                                            <div class='check'></div>
                                        </li>
                                        
                                        <li>
                                            <input type='radio' name='question-$i-answers' id='question-$i-answers-B' value='B' />
                                            <label for='question-$i-answers-B'>B) $oB</label>
                                            <div class='check'></div>
                                        </li>
                                        
                                        <li>
                                            <input type='radio' name='question-$i-answers' id='question-$i-answers-C' value='C' />
                                            <label for='question-$i-answers-C'>C) $oC</label>
                                            <div class='check'></div>
                                        </li>
                                        
                                        <li>
                                            <input type='radio' name='question-$i-answers' id='question-$i-answers-D' value='D' />
                                            <label for='question-$i-answers-D'>D) $oD</label>
                                            <div class='check'></div>
                                        </li>
                                        
                                        <button name='compute' class='buttonpretender'>
                                            Compute my answers!
                                        </button>

                                        <span id='question$h' class='buttonpretender' onclick='showStuff(this)'>Back</span>
                                    </ul>
                                </div>
                            ";
                        }
                        else {
                            echo "
                                <div id='question-$i' class='tabContent'>
                                    <h3><b>Question $i:</b><br/><br/> $qQ</h3>
                                    <ul>
                                        <li>
                                            <input type='radio' name='question-$i-answers' id='question-$i-answers-A' value='A' required title='Please make sure that all questions in the form have been answered.'/>
                                            <label for='question-$i-answers-A'>A) $oA</label>
                                            <div class='check'></div>
                                        </li>
                                        
                                        <li>
                                            <input type='radio' name='question-$i-answers' id='question-$i-answers-B' value='B' />
                                            <label for='question-$i-answers-B'>B) $oB</label>
                                            <div class='check'></div>
                                        </li>
                                        
                                        <li>
                                            <input type='radio' name='question-$i-answers' id='question-$i-answers-C' value='C' />
                                            <label for='question-$i-answers-C'>C) $oC</label>
                                            <div class='check'></div>
                                        </li>
                                        
                                        <li>
                                            <input type='radio' name='question-$i-answers' id='question-$i-answers-D' value='D' />
                                            <label for='question-$i-answers-D'>D) $oD</label>
                                            <div class='check'></div>
                                        </li>

                                        <span id='question$j' class='buttonpretender' onclick='showStuff(this)'>Next</span>
                                        <span id='question$h' class='buttonpretender' onclick='showStuff(this)'>Back</span>
                                    </ul>
                               </div>
                            ";
                        }
                    }
                ?>
            </form>
        </div>
    </div>
    <script src='js/bootstrap.min.js'></script>
    <script type="text/javascript" src="js/custom.js"></script>
</body>
</html>