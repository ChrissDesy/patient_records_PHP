<?php

    //handle posting
	if(isset($_POST["addPat"])) {
		$nid = $_POST["natid"];
	    $fname = $_POST["fname"];
	    $add = $_POST["address"];
	    $lname = $_POST["lname"];
		$gen = $_POST["gender"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$knam = $_POST["kname"];
		$kemail = $_POST["kemail"];
		$kphone = $_POST["kphone"];
        $uid = 'PT'. mt_rand(1000,9999);

	    $sql = 'INSERT INTO patients (kin_name, fname, lname, gender, email, phone, address, patid, kin_email, kin_phone, natid, status, date) 
        VALUES ("'.$knam.'","'.$fname.'","'.$lname.'","'.$gen.'","'.$email.'","'.$phone.'","'.$add.'","'.$uid.'","'.$kemail.'","'.$kphone.'","'.$nid.'","active",NOW())';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./patients.php'; </script>";
	}

    //handle editing
	if(isset($_POST["editPat"])) {
		
	    // $ref = $_POST["id"];
	    $nid = $_POST["natid"];
	    $fname = $_POST["fname"];
	    $add = $_POST["address"];
	    $lname = $_POST["lname"];
		$gen = $_POST["gender"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$knam = $_POST["kname"];
		$kemail = $_POST["kemail"];
		$kphone = $_POST["kphone"];

	    $sql = '
            UPDATE patients SET
                fname = "'.$fname.'",
                lname = "'.$lname.'",
                gender = "'.$gen.'",
                address = "'.$add.'",
                email = "'.$email.'",
                phone = "'.$phone.'",
                kin_name = "'.$knam.'",
                kin_email = "'.$kemail.'",
                kin_phone = "'.$kphone.'",
                natid = "'.$nid.'"
            WHERE id = "'.$ref.'"
        ';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./patients.php'; </script>";
	}

	//handle deleting
	if(isset($_POST["deletePat"])) {
		$id = $_POST["id"];

	    $sql = "
			UPDATE patients SET status='deleted' 
			WHERE id = '".$id."'
        ";
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./patients.php'; </script>";
		// echo $id;
	}


 ?>