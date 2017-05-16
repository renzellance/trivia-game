<?php
    include_once('../config.php');
    $sql_getinfo = "SELECT takerID, takerLastName, takerFirstName, takerEmail, takerScore, dateTaken from takers";
    $result_getinfo = $con->query($sql_getinfo) or die(mysqli_error($con));
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
    <h1 class="text-center">View All Results</h1>
    <div class="container">
        <div class="well fontresize">
            <table id="tblTakers" class="table table-hover">
				<thead>
					<th>Taker ID</th>
					<th>Name</th>
					<th>Email Address</th>
					<th>Score</th>
					<th>Date Taken</th>
					<th></th>
				</thead>
				<tbody>
					<?php
						while($row = mysqli_fetch_array($result_getinfo))
						{
							$id = $row['takerID'];
							$ln = $row['takerLastName'];
							$fn = $row['takerFirstName'];
							$email = $row['takerEmail'];
							$score = $row['takerScore'];
							$added = new DateTime($row['dateTaken']);

							echo
								"<tr>
									<td>" . $id . "</td>
									<td>" . $ln . ', ' . $fn . "</td>
									<td>" . $email . "</td>
									<td>" . $score . "</td>
									<td>" . $added->format('F d, Y g:i A') . "</td>
									<td><a class='btn btn-xs btn-info' href='details.php?id=" . $id . "'><i class='fa fa-eye'></i></a></td>
								</tr>";

						}
					?>
				</tbody>
			</table>
        </div>
    </div>
    <script src='js/bootstrap.min.js'></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/custom.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function(){
		    $('#tblTakers').DataTable();
		});
	</script>
</body>
</html>