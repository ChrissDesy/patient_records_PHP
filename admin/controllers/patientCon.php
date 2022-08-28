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
		$rurl = $_POST['returnUrl'];

	    $sql = 'INSERT INTO patients (kin_name, fname, lname, gender, email, phone, address, patid, kin_email, kin_phone, natid, status, date) 
        VALUES ("'.$knam.'","'.$fname.'","'.$lname.'","'.$gen.'","'.$email.'","'.$phone.'","'.$add.'","'.$uid.'","'.$kemail.'","'.$kphone.'","'.$nid.'","active",NOW())';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./".$rurl."'; </script>";
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

	//handle add visit
	if(isset($_POST["addVis"])) {
		$patid = $_POST["patid"];

	    $sql = 'INSERT INTO visits (patid, stage, dis_date, status, date) 
        VALUES ("'.$patid.'","admission","-","active",NOW())';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./admissions.php'; </script>";
	}

	// patient discharge
	if(isset($_POST["addDis"])) {
		$patid = $_POST["patid"];

	    $sql = "UPDATE visits SET status='discharged', dis_date=NOW() WHERE patid='".$patid."' and status='active'";
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

	    echo "<script type='text/javascript'> document.location ='./admissions.php'; </script>";
	}

	//patient precheck
	if(isset($_POST["addPre"])) {
		$vid = $_POST["visit"];
	    $pid = $_POST["patid"];
	    $temp = $_POST["temp"];
	    $blood = $_POST["blood"];
		$weight = $_POST["weight"];
		$other = $_POST["notes"];
		$dnby = $_SESSION['username'];

	    $sql = 'INSERT INTO precheck (visitid, patid, temprature, blood, weight, other, status, date, done_by) 
        VALUES ("'.$vid.'","'.$pid.'","'.$temp.'","'.$blood.'","'.$weight.'","'.$other.'","active",NOW(),"'.$dnby.'")';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

		$sql2 = "UPDATE visits SET stage='precheck' WHERE id='".$vid."'";
		$query2 = $db->prepare($sql2);   
	    $query2->execute();

	    echo "<script type='text/javascript'> document.location ='./prechecks.php'; </script>";
	}

	//patient consultation
	if(isset($_POST["addCon"])) {
		$vid = $_POST["visit"];
	    $pid = $_POST["patid"];
	    $desc = $_POST["desc"];
	    $pesc = $_POST["prescription"];
	    $refer = $_POST["refer"] ?? '-';
		$dnby = $_SESSION['username'];
		$prescId = 0;
		
		if($pesc != ''){
			$sql2 = 'INSERT INTO prescription (visitid, patid, description, approved_by, status, date, done_by) 
			VALUES ("'.$vid.'","'.$pid.'","'.$pesc.'","-","active",NOW(),"'.$dnby.'")';
			$query2 = $db->prepare($sql2);   
			$query2->execute();

			$prescId = $db->lastInsertId();
		}

	    $sql = 'INSERT INTO consultation (visitid, patid, description, prescription, refer, status, date, done_by) 
        VALUES ("'.$vid.'","'.$pid.'","'.$desc.'","'.$prescId.'","'.$refer.'","active",NOW(),"'.$dnby.'")';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

		$sql3 = "UPDATE visits SET stage='consult' WHERE id='".$vid."'";
		$query3 = $db->prepare($sql3);   
	    $query3->execute();

	    echo "<script type='text/javascript'> document.location ='./consultation.php'; </script>";
	}

	//patient procedure
	if(isset($_POST["addPro"])) {
		$vid = $_POST["visit"];
	    $pid = $_POST["patid"];
	    $desc = $_POST["desc"];
	    $pesc = $_POST["prescription"];
	    $name = $_POST["name"];
	    $dpt = $_SESSION['udpt'];
		$dnby = $_SESSION['username'];
		$prescId = 0;
		
		if($pesc != ''){
			$sql2 = 'INSERT INTO prescription (visitid, patid, description, approved_by, status, date, done_by) 
			VALUES ("'.$vid.'","'.$pid.'","'.$pesc.'","-","active",NOW(),"'.$dnby.'")';
			$query2 = $db->prepare($sql2);   
			$query2->execute();

			$prescId = $db->lastInsertId();
		}

	    $sql = 'INSERT INTO procedures (visitid, patid, description, prescription, name, status, date, done_by, department) 
        VALUES ("'.$vid.'","'.$pid.'","'.$desc.'","'.$prescId.'","'.$name.'","active",NOW(),"'.$dnby.'","'.$dpt.'")';
	    
	    $query = $db->prepare($sql);   
	    $query->execute();

		$sql3 = "UPDATE visits SET stage='specialist' WHERE id='".$vid."'";
		$query3 = $db->prepare($sql3);   
	    $query3->execute();

	    echo "<script type='text/javascript'> document.location ='./specialist.php'; </script>";
	}

	// dispense
	if(isset($_POST["addDisp"])) {
		$ref = $_POST["ref"];
	    $status = $_POST["status"];
		$dnby = $_SESSION['username'];
		
		$sql3 = "UPDATE prescription SET status='$status', approved_by='$dnby' WHERE id='".$ref."'";
		$query3 = $db->prepare($sql3);   
	    $query3->execute();

	    echo "<script type='text/javascript'> document.location ='./pharmacy.php'; </script>";
	}

 ?>