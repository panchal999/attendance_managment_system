<?php 

	include 'config1.php';
	$uid = $_SESSION['uid'];
?>
<div class="container">
  <div class="row">
    <div class="col-md-12 col-lg-12">
			<h1 class="page-header">Your Subjects and Students</h1>  
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-lg-12">
		
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Subjects</h3>
				</div>
				<div class="panel-body">
					
					<?php
						$output = '';
		
						$query_subject = "SELECT subject.name, subject.id from subject INNER JOIN user_subject WHERE user_subject.id = subject.id AND user_subject.uid = {$uid}  ORDER BY subject.name";
						$sub=$conn->query($query_subject);
						$rsub=$sub->fetchAll(PDO::FETCH_ASSOC);
						
						$noOfSubject = count($rsub);
						
						for($i = 0; $i<$noOfSubject; $i++) {
							$output .= $rsub[$i]['name'];
							$output .= ',&nbsp;';
						}
						print $output;
					?>
					
				</div>
			</div>
			
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Students</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Roll No</th>
							<th>Name</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$outputData = '';
							for($i = 0; $i<$noOfSubject; $i++) {
								$subname=$rsub[$i]['name'];
								$subid=$rsub[$i]['id'];
							$studentQuery = "SELECT  sid FROM student_subject_new WHERE id=$subid ";							
							$stmtStudent = $conn->prepare($studentQuery); 
							$stmtStudent->execute();
							$resultStudent = $stmtStudent->fetchAll(PDO::FETCH_ASSOC); 
							//print_r($resultStudent);
							echo "<tr><td><strong>".$subname." 's students-list</strong></td></tr>" ;
							for($j = 0; $j<count($resultStudent); $j++) {
								$dupstid=$resultStudent[$j]['sid'];
								$query1="SELECT rollno,name FROM student_new WHERE sid=$dupstid";
								$stmt = $conn->prepare($query1); 
								$stmt->execute();
								$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
								//print_r($result);
								/*$outputData .= "<tr>";
								$outputData .= "<td>" . $result[$j]['rollno'] . "</td>";
								$outputData .= "<td>" . $result[$j]['name'] . "</td>";
								$outputData .= "</tr>";*/
								echo "<tr>";
								echo "<td>" . $result[0]['rollno'] . "</td>";
								echo "<td>" . $result[0]['name'] . "</td>";
								echo "</tr>";
							}
							//print $outputData;
						}
							
						?>
						</tbody>
					</table>
				</div>
			</div>
			
						
		</div>
	</div>
</div>