<div class="container" s>

 <div class="row">
    <div class="col-md-6 col-md-offset-3 col-lg-6 text-center">
      <img src="images/mattendance_logo_small.png" alt="mAttendance">
      
      <h1 class="text-center login-title">Let’s get you started!</h1>
    </div>
  </div>
  <div class="row">

  		<?php if(isset($_GET['invalid_username'])) : ?>
			<div class="col-md-6 col-md-offset-3 col-lg-6 no-column-padding">
				<div class="form-group alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Sorry!</strong> UserName Alredy Exist
				</div>
			</div>
		<?php endif; ?>
  		<?php if(isset($_GET['invalid_field'])) : ?>
			<div class="col-md-6 col-md-offset-3 col-lg-6 no-column-padding">
				<div class="form-group alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Sorry!</strong> Select Department
				</div>
			</div>
		<?php endif; ?>
		<?php if(isset($_GET['invalid_password'])) : ?>
			<div class="col-md-6 col-md-offset-3 col-lg-6 no-column-padding">
				<div class="form-group alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Sorry!</strong> Password Not Match!!
				</div>
			</div>
		<?php endif; ?>
		<?php if(isset($_GET['success'])) : ?>
			<div class="col-md-6 col-md-offset-3 col-lg-6 no-column-padding">
				<div class="alert alert-success" role="alert">
					 <a href="index.php" class="alert-link">Your Account Will Be Verify As Soon As Possible</a>
				</div>
			</div>
		<?php endif; ?>

<div class="col-md-6 col-md-offset-3 col-lg-6">

<form action="modules/signup_verify.php" class="form-horizontal"  method="post" id="facultyForm" data-toggle="validator">
  <div class="form-group">
    <label for="exampleInputEmail1">UserName</label>
    <div class="input-group">
    	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input type="name" required name="name" class="form-control" id="exampleInputUser1" placeholder="UserName">
	</div>
  </div>
  <div class="form-group">
    <label for="example1InputEmail1">Email</label>
    <div class="input-group">
    	<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
    <input type="email" required name="email" class="form-control" id="exampleUser1" placeholder="Email Address">
	</div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input type="password" required class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password">
	</div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Repeat Password</label>
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input type="password" required class="form-control" name="repass" id="exampleInputPassword1" placeholder="Repeat Password">
	</div>

  </div>
  <div  class="form-group">
  	<label for="exampleInputPassword1">Select Department</label>
    <div class="input-group">
    <span class="input-group-addon"><i  class="glyphicon glyphicon-education"></i></span>
    <select name="dept" class="form-control" required >
    	<option value="0">--SELECT--</option>
		<hr>
		<option value="1">CE</option>
		<hr>
		<option value="2">CH</option>
		<hr>
		<option value="3">MH</option>
		<hr>
		<option value="4">IT</option>
	</select>
	</div>
  </div>
   <span></span>
   <div class="form-group">
          <input type="submit" name="submit" value="SUBMIT" class="btn btn-info btn-block" value="Sign in">
        </div>
 
</form>

</div>
</div>
</div>
<script>
	$('#facultyForm').validator();
</script>

