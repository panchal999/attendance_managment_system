<?php
include 'config1.php';



	 if(isset($_POST['submit']))
     {
     	//echo "1";
		if(isset($_POST['name']) && isset($_POST['pass']) && isset($_POST['email']) && isset($_POST['repass']) && isset($_POST['dept']))
		{
			//echo "2";
			if(!empty($_POST['name']) && !empty($_POST['pass']) && !empty($_POST['email']) && !empty($_POST['repass']) && !empty($_POST['dept'] ) && $_POST['dept']!=0  )
        	{
				//echo "3";
				$u=$_POST['name'];
				$email=$_POST['email'];
				$p=$_POST['pass'];
				$rp=$_POST['repass'];
				$dept=$_POST['dept'];
				$date = new DateTime();
				$dd=$date->getTimestamp();
				$zero=0;



				$stmt = $conn->prepare("SELECT uname,did FROM user_new WHERE uname= ? AND did=?"); 
            	$stmt->execute(array($u,$dept));

             
             	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
             	//echo "herecc".count($result);
             	if(count($result))
            	{
            		header("Location:../index.php?page=signup&invalid_username=USERNAME ALREADY EXIST");
            		//echo "username alredy exist";
            	}
            	else{

            		if($p === $rp)
					{
						
						$stmtInsert=$conn->prepare("INSERT into user_new (uname,password,did,email,status,created)  values (:u, :p,:dept,:email, :v1,:dd)");

						$stmtInsert->bindParam(':u', $u);
						$stmtInsert->bindParam(':p', $p);
						$stmtInsert->bindParam(':dept', $dept);
						$stmtInsert->bindParam(':email', $email);
						$stmtInsert->bindParam(':v1',$zero); 
						$stmtInsert->bindParam(':dd', $dd); 
						
						$stmtInsert->execute();
						
						//echo "succesfully added....";
						header("Location:../index.php?page=signup&success=y");
					}

					else{
						
						header("Location:../index.php?page=signup&invalid_password=PASSWORD NOT MATCH");
						// header("url=index.php?page=signup&invalid_password=PASSWORD NOT MATCH");
				
					}

            	}	
				
			}	
		else{
					// header("Refresh: 5; url=index.php?page=signup&invalid_field=INVALID ENTRY");
				
					header("Location:../index.php?page=signup&invalid_field=INVALID ENTRY");
					
			}

		}
	}


?>
