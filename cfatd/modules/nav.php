<?php
	session_start();
?>

<?php if (isset($_SESSION['islogin']) && $_SESSION['islogin'] == 1) : ?>
	<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
			<ul class="nav sidebar-nav">
					<li class="sidebar-brand">
							<a href="index.php">
								<img src="images/mattendance_logo_small.png" alt="mAttendance">
							</a>
					</li>
					<li>
							<a href="index.php?page=dashboard">Dashboard</a>
					</li>
					<li>
							<a href="index.php">Take Attendance</a>
					</li>
					<li>
							<a href="index.php?page=studentinfo">Assigned to You</a>
					</li>
					<li>
							<a href="index.php?page=reports">Reports</a>
					</li>
					<li>
							<a href="index.php?page=help">Help</a>
					</li>
					<li>
							<a href="index.php?page=logout">Logout</a>
					</li>
					<?php if (isset($_SESSION['uname']) && $_SESSION['uname'] == "admin") : ?>
					<li>
						<a href="index.php?page=admin_student">Add Student Data</a>
					</li>
					<li>
						<a href="index.php?page=admin_faculty">Add Faculty Data</a>
					</li>
					<?php endif; ?>
			</ul>
	</nav>
<?php else: ?>
	<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
			<ul class="nav sidebar-nav">
					<li class="sidebar-brand">
							<a href="index.php">
								<img src="images/mattendance_logo_small.png" alt="mAttendance">
							</a>
					</li>
					<li>
							<a href="index.php?page=signup">SignUp Here</a>
					</li>
					<li>
							<a href="index.php">Login</a>
					</li>
					<li>
							<a href="index.php?page=teacherspage">Teacher's Section</a>
					</li>
					<li>
							<a href="index.php?page=studentspage">Student's Section</a>
					</li>
					<li>
							<a href="index.php?page=about">About</a>
					</li>
					
			</ul>
	</nav>
<?php endif; ?>