<?php 
include 'config1.php';
//connction of my sql server 
$conn1 = @mysql_connect("localhost","root","");
//selecting data base
mysql_select_db("atestdb",$conn1);

// action varible for using insert update and delete opretion which retrive from query string
$action = "";
if(isset($_REQUEST['action'])){
	$action = $_REQUEST['action'];
}


//for insert opretion
if(isset($_REQUEST['save'])){
	
	//form data
	$name   = $_REQUEST['name'];
	$did = $_REQUEST['branch'];
	$rollno  = $_REQUEST['rollno'];
	
	//insert query  and exicution of query
	$query = "insert into student_new(name,rollno,did) values('$name','$rollno','$did')";  
	if(mysql_query($query)){
		
		///////////
		$sid=mysql_insert_id();
		$query_subject =  $conn->prepare("SELECT  id from department_subject 
	 	WHERE did = ?");

		$query_subject->execute(array($did));
		$result = $query_subject->fetchAll(PDO::FETCH_ASSOC);
	            print_r("Lodding....");
	    for($j = 0; $j < count($result); $j++)
		{
			$stmtInsert = $conn->prepare("INSERT INTO student_subject_new (sid,id)
									VALUES (:sid,:id)");
										
										

			$stmtInsert->bindParam(':id', $result[$j]['id']);
		
			$stmtInsert->bindParam(':sid', $sid);
			
			$stmtInsert->execute();
			//print_r("subject assigned");
		}



		///////////

		 echo"<script>alert('data successfully saved ')</script>";
		 echo"<script>window.location='index.php?page=admin_student'</script>";
	}else{
		echo"failed ".mysql_error();
	}
	///////

	//////
}


//for Update opretion
if(isset($_REQUEST['edit'])){
	//querystring varible 
	$id   = $_REQUEST['id'];
	
	//form data
	$name   = $_REQUEST['name'];
	$did = $_REQUEST['branch'];
	$rollno  = $_REQUEST['rollno'];
	
	//update query  and exicution of query
	$query = "update student_new set name = '$name', did='$did',rollno='$rollno' where sid='$id'";  
	if(mysql_query($query)){

		echo"<script>alert('data successfully Updeate ')</script>";
		echo"<script>window.location='index.php?page=admin_student'</script>";
	}else{

		echo"failed ".mysql_error();
	}
}


//for Delete opretion
if($action == 'delete'){
	//querystring varible 
	$id   = $_REQUEST['id'];
	
	//update query  and exicution of query
	$query = "delete from student_new where sid='$id'";  
	if(mysql_query($query)){
		echo"<script>alert('data successfully Deleted ')</script>";
		echo"<script>window.location='index.php?page=admin_student'</script>";
	}else{
		echo"failed ".mysql_error();
	}
}

?>
<div class="container">
  <h3>Student Panel</h3>
  
 <br />  <br /> 
  
  
  <?php if($action == 'add'){ ?>
	   <form method="post" >
		<div class="form-group">
		  <label for="email">Name :</label>
		  <input type="text" class="form-control" placeholder="Name" name="name" required="">
		</div>
		
		  <div class="form-group">
		  <label for="email">Branch Id:</label>
		  <input type="number"
		  min="1" max="4" class="form-control" placeholder="Branch" name="branch" required>
		</div>

		<div class="form-group">
		  <label for="email">Roll No:</label>
		  <input type="number"  class="form-control" placeholder="Roll No" name="rollno" required>
		</div>
		
		<button type="submit" class="btn btn-default" name="save" >Submit</button>
	  </form>

  <?php }else if($action == 'edit'){ 
  
          $id = $_REQUEST['id'];
		  $query ="select * from student_new where sid='$id'";
		  $query  = "select * from student_new order by did desc ,rollno";
		  $rs = mysql_query($query) or die("failed ".mysql_error());
		  $data = mysql_fetch_array($rs);
  ?>
		<form method="post" >
		<div class="form-group">
		  <label for="email">Name :</label>
		  <input type="text" class="form-control" placeholder="Name" required name="name" value="<?php echo $data['name']; ?>" >
		</div>
		
		  <div class="form-group">
		  <label for="email">Branch :</label>
		  <input type="number" min="1" max="4" class="form-control" placeholder="Branch" required name="branch"  value="<?php echo $data['did']; ?>" >
		</div>
		<div class="form-group">
		  <label for="email">Roll No :</label>
		  <input type="number" class="form-control" required placeholder="Roll No" name="rollno"  value="<?php echo $data['rollno']; ?>" >
		</div>
		
		<button type="submit" class="btn btn-default" name="edit" >Submit</button>
	  </form>
  
  <?php }else{ ?>
		  <a href="index.php?page=admin_student&action=add" class="btn btn-primary">Add</a>
		  <br /> <br />
				   
		  <table class="table">
			<thead>
			  <tr>
			<th>Name</th>
			<th>branch</th>
			<th>Roll No.</th>
			<th>action</th>
			  </tr>
			</thead>
			<tbody>
			<?php 
		$query  = "select * from student_new order by did desc,rollno";
		$rs = mysql_query($query) or die("failed ".mysql_error());
	
		while($data = mysql_fetch_array($rs))
		{
			
			$d=$data["did"];
			//echo "here".$d;
			$query_dept  = "select * from department where did='$d'";
				
			$dept_rs = mysql_query($query_dept) or die("failed ".mysql_error());
			$data_rs = mysql_fetch_array($dept_rs)
			
			?>
			  <tr>
			  <td><?php echo $data["name"]; ?></td>

			 <td><?php echo $data_rs["dname"]; ?></td> 
			<td><?php echo $data["rollno"]; ?></td>
			<td>
			<a href="index.php?page=admin_student&action=edit&id=<?php echo $data["sid"]; ?>" class="btn btn-success">Edit</a>
			<a href="index.php?page=admin_student&action=delete&id=<?php echo $data["sid"]; ?>" class="btn btn-danger" onclick="return confirm('are you soure want to delete this')" >Delete</a>
			
			
			</td>
			  </tr>
			  <?php 	
		}
			

		?>
			</tbody>
		  </table>
  <?php } ?>
  
</div>
