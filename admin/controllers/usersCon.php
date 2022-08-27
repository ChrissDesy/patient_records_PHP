<?php

    //handle posting
	if(isset($_POST["addRec"])) {
		$nid = $_POST["natid"];
	    $fname = $_POST["fname"];
	    $uname = $_POST["uname"];
	    $lname = $_POST["lname"];
		$gen = $_POST["gender"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$typ = $_POST["typ"];
		$dpt = $_POST["dpt"];
		$pwd = $_POST["pwd"];
        $uid = 'SU'. mt_rand(1000,9999);

	    $sql = 'INSERT INTO users (uname, fname, lname, gender, email, phone, type, userid, password, natid, status, department, date) 
        VALUES ("'.$uname.'","'.$fname.'","'.$lname.'","'.$gen.'","'.$email.'","'.$phone.'","'.$typ.'","'.$uid.'","'.$pwd.'","'.$nid.'","active","'.$dpt.'",NOW())';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./users.php'; </script>";
	}

    //handle editing
	if(isset($_POST["editRec"])) {
		
	    // $ref = $_POST["id"];
	    $nid = $_POST["natid"];
	    $fname = $_POST["fname"];
	    $lname = $_POST["lname"];
		$gen = $_POST["gender"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];

	    $sql = '
            UPDATE users SET
                fname = "'.$fname.'",
                lname = "'.$lname.'",
                gender = "'.$gen.'",
                email = "'.$email.'",
                phone = "'.$phone.'",
                natid = "'.$nid.'"
            WHERE id = "'.$ref.'"
        ';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./users.php'; </script>";
	}

	//handle deleting
	if(isset($_POST["deleteRec"])) {
		$id = $_POST["id"];

	    $sql = "
			DELETE FROM users 
			WHERE id = '".$id."'
        ";
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./users.php'; </script>";
		// echo $id;
	}

	//handle password change
	if(isset($_POST["pwdChange"])) {
		$old = $_POST["old"];
		$pwd = $_POST["new"];
		$conf = $_POST["confirm"];

		if($pwd !== $conf){
            $_SESSION['errorMessage'] = 'Confirm Password Mismatch.';
        }
		else{
			$sql = "SELECT password FROM users WHERE uname='".$_SESSION['uname']."'";
			$statement = $db->prepare($sql);
			$statement->execute();
			$result = $statement->fetchAll();

			if(sizeof($result) > 0){
				$r = $result[0];
				$pass = $r['password'];

				if($old !== $pass){
					$_SESSION['errorMessage'] = 'Wrong Old Password.';
				}
				else{
					
					$sql = "
						UPDATE users SET 
						password = '".$pwd."' 
						WHERE uname = '".$_SESSION['uname']."'
					";
					
					$query = $db->prepare($sql);   
					$query->execute();

					$_SESSION['infoMessage'] = 'Password Changed.';

					// echo "<script type='text/javascript'> document.location ='./change-password.php'; </script>";

				}
			}
			else{
				$_SESSION['errorMessage'] = 'User Not Found.';
			}
		}

	}

 ?>