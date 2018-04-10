
<?php
$conn1 = mysqli_connect("localhost","root","","atestdb");
//selecting data base
$output='';
	//echo "inside fetch.php";
	$sql = "select * from department_subject where did='".$_POST['dep_id']."' order by id";
	$res = mysqli_query($conn1, $sql);
	//$output='<option value="">------- Select --------</option>';
	while($row = mysqli_fetch_array($res)) {
		 $id=$row['id'];
		 $sqlnm = "select name from subject where id=$id";
		 $resnm = mysqli_query($conn1, $sqlnm);
		 $rownm=mysqli_fetch_array($resnm);

	 	$output .= "<option value='".$row['id']."'>".$rownm['name']."</option>";
 	}
 	echo $output;


?>
