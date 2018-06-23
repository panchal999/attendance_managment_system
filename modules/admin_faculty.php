

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
	$uname   = $_REQUEST['uname'];
	$pass = $_REQUEST['password'];
	$did   = $_REQUEST['did'];
	$email   = $_REQUEST['email'];
	$status   = 1;
	$subject = array();
	$subject=$_REQUEST['subject'];
	//insert query  and exicution of query
	
	$query = "insert into user_new(uname,password,did,email,status) values('$uname','$pass','$did','$email','$status')";  
	
	if(mysql_query($query)){

		$uid=mysql_insert_id();
		   for($j = 0; $j < count($subject); $j++)
		 {
		 	$stmtInsert = $conn->prepare("INSERT INTO user_subject(uid,id)
									VALUES (:uid,:id)");
										
										

			$stmtInsert->bindParam(':uid', $uid);
		
		 	$stmtInsert->bindParam(':id', $subject[$j]);
			
		 	$stmtInsert->execute();
		 	//print_r("subject assigned");
		 }


		echo"<script>alert('data successfully saved ')</script>";
		echo"<script>window.location='index.php?page=admin_faculty'</script>";
	}else{
		echo"failed ".mysql_error();
	}

	
}


//for Update opretion
if(isset($_REQUEST['edit'])){
	//querystring varible 
	$id   = $_REQUEST['id'];

	//form data
	$uname   = $_REQUEST['uname'];
	$password   = $_REQUEST['password'];
	
	$did   = $_REQUEST['did'];
	$email   = $_REQUEST['email'];
	if($_REQUEST['status']=="0")
		$status   = 0;
	else
		$status=1;
	
	//update query  and exicution of query
	$query = "update user_new set uname = '$uname',password='$password',did='$did',email='$email',status='$status' where uid='$id'";  
	if(mysql_query($query)){
		echo"<script>alert('data successfully Updeate ')</script>";
		echo"<script>window.location='index.php?page=admin_faculty'</script>";
	}else{
		echo"failed ".mysql_error();
	}
}


//for Delete opretion
if($action == 'delete'){
	//querystring varible 
	$id   = $_REQUEST['id'];
	
	//update query  and exicution of query
	$query = "delete from user_new where uid='$id'";  
	if(mysql_query($query)){
		echo"<script>alert('data successfully Deleted ')</script>";
		echo"<script>window.location='index.php?page=admin_faculty'</script>";
	}else{
		echo"failed ".mysql_error();
	}
}

?>

<div class="container">
  <h3>Faculty Panel</h3>
  
 <br />  <br /> 
  
  
  <?php if($action == 'add'){ ?>
	   <form method="post" >
		<div class="form-group">
		  <label for="email">UserName :</label>
		  <input type="text" class="form-control" placeholder="Name" name="uname" required>
		</div>
		
		  <div class="form-group">
		  <label for="email">Password :</label>
		  <input type="text" class="form-control" placeholder="Password" name="password" required>
		</div>
		<div class="form-group">
		  <label for="email">Email Id:</label>
		  <input type="email" class="form-control" placeholder="Email Id" name="email" required>
		</div>
		<div class="form-group">
		  <label for="email">Deptartment Id:</label>
		 <!--  <input type="number" class="form-control" placeholder="Department Id" name="did" required> -->	
			 <select name='did' id="did" class="form-control" required="required">	
			 	<option value=''>------- Select --------</option>
			 	<?php
												
					$query_dep = "SELECT did, dname from department ";
					$dep=$conn->query($query_dep);
					$rdep=$dep->fetchAll(PDO::FETCH_ASSOC);
					for($i = 0; $i<count($rdep); $i++)
					{
						
							echo"<option value='". $rdep[$i]['did']."' >".$rdep[$i]['dname']."</option>";
					
					}
					
				?>	

			</select>

		</div>
		<div class="form-group">
		  <label for="subjects">Subject:</label>
		 <select name="subject[]" id="subject"  class="form-control" required multiple>		 	
		 	<option value="">------- Select --------</option>
		 </select>

		</div>
		



		<button type="submit" class="btn btn-default" name="save" >Submit</button>
	  </form>
  <?php }else if($action == 'edit'){ 
  
          $id = $_REQUEST['id'];
		  $query ="select * from user_new where uid='$id'";
	
		  $rs = mysql_query($query) or die("failed ".mysql_error());
		  $data = mysql_fetch_array($rs);
  ?>
		<form method="post" >
		<div class="form-group">
		  <label for="user">UserName :</label>
		  <input type="text" class="form-control" required placeholder="Name" name="uname" value="<?php echo $data['uname']; ?>" >
		</div>
		<div class="form-group">
		  <label for="password">Password:</label>
		  <input type="password" class="form-control" required placeholder="Password" name="password" value="<?php echo $data['password']; ?>" >
		</div>
		<div class="form-group">
		  <label for="email">Email Id:</label>
		  <input type="email" class="form-control" required placeholder="Email Id" name="email" value="<?php echo $data['email']; ?>" >
		</div>
		  <div class="form-group">
		  <label for="email">Department Id :</label>
		  <input type="number" min="1" max="4" class="form-control" required placeholder="Department Id" name="did"  value="<?php echo $data['did']; ?>" >
		</div>
	

		<div class='form-group'>
		 <label for='email'>Status :</label>

			
			<input type='number' class='form-control ' required min="0" max="1" name='status' value="<?php echo $data['status']; ?>">;

		
		</div>
	
		<button type="submit" class="btn btn-default" name="edit" >Submit</button>
	  </form>
  
  <?php }else{ ?>
		  <a href="index.php?page=admin_faculty&action=add" class="btn btn-primary">Add</a>
		  <br /> <br />
				   
		  <table class="table">
			<thead>
			  <tr>
			<th>Name</th>
			<th>dept id</th>
			<th>email</th>
			<th>status</th>
			<th>subjects</th>
			  </tr>
			</thead>
			<tbody>
			<?php 
		$query  = "select * from user_new order by did desc";
		$rs = mysql_query($query) or die("failed ".mysql_error());
		while($data = mysql_fetch_array($rs))
		{
			?>
			  <tr>
			  <td><?php echo $data["uname"]; ?></td>
			<td><?php 

					$did=$data["did"]; 
					$qud = "SELECT dname from department  WHERE did = $did";
					$depqu=$conn->query($qud);
					$rdep=$depqu->fetchAll(PDO::FETCH_ASSOC);	
					if(count($rdep))
					{
						echo $rdep[0]['dname'];
					}

				


			?></td>
			<td><?php echo $data["email"]; ?></td>
			<td>
				<?php
					if($data["status"]==1)
			 			echo "active"; 
			 		else
			 			echo "deactive";
				?>
			 	
			 </td>
			 <td>
			 	<?php
			 		$uid=$data["uid"];
					$qu = "SELECT user_subject.id , subject.name from user_subject natural join subject WHERE uid = $uid";
					$subqu=$conn->query($qu);
					$rsub=$subqu->fetchAll(PDO::FETCH_ASSOC);	
					for($i = 0; $i<count($rsub); $i++)
					{
						echo $rsub[$i]['name'].", " ;
					}
				?>
			 	
			 </td>
			<td>
			<a href="index.php?page=admin_faculty&action=edit&id=<?php echo $data["uid"]; ?>" class="btn btn-success">Edit</a>
			<a href="index.php?page=admin_faculty&action=delete&id=<?php echo $data["uid"]; ?>" class="btn btn-danger" onclick="return confirm('are you soure want to delete this')" >Delete</a>
			
			
			</td>
			  </tr>
			  <?php 	
		}
			

		?>
			</tbody>
		  </table>
  <?php } ?>
  
</div>






