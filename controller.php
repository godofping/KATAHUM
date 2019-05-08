<?php 
include_once('connection.php');


////////////////////start authentication codes
if (isset($_POST['from']) and $_POST['from'] == 'login') {

	$username = $_POST['username'];
	$password = md5($_POST['password']);


	$qry = mysqli_query($connection, "select * from admin_table where username = '" . $username . "' and password = '" . $password . "'");

	if (mysqli_num_rows($qry) > 0) {

		$qry = mysqli_query($connection, "select * from admin_table where username = '" . $username . "' and password = '" . $password . "'");

		$result = mysqli_fetch_assoc($qry);

		$_SESSION["adminid"] =  $result['adminid'];


		header("Location: admin-dashboard.php");
		

	}
	else
	{
		$qry = mysqli_query($connection, "select * from student_table where username = '" . $username . "' and password = '" . $password . "'");

		if (mysqli_num_rows($qry) > 0) {

			$qry = mysqli_query($connection, "select * from student_table where username = '" . $username . "' and password = '" . $password . "'");

			$result = mysqli_fetch_assoc($qry);

			$_SESSION["studentid"] =  $result['studentid'];


			header("Location: student-dashboard.php");
			

		}
		else
		{
			$qry = mysqli_query($connection, "select * from viewer_table where username = '" . $username . "' and password = '" . $password . "'");

		if (mysqli_num_rows($qry) > 0) {

			$qry = mysqli_query($connection, "select * from viewer_table where username = '" . $username . "' and password = '" . $password . "'");

			$result = mysqli_fetch_assoc($qry);

			$_SESSION["viewerid"] =  $result['viewerid'];


			header("Location: viewer-dashboard.php");
			

			}
			else
			{
				$qry = mysqli_query($connection, "select * from teacher_table where username = '" . $username . "' and password = '" . $password . "'");

				if (mysqli_num_rows($qry) > 0) {

					$qry = mysqli_query($connection, "select * from teacher_table where username = '" . $username . "' and password = '" . $password . "'");

					$result = mysqli_fetch_assoc($qry);

					$_SESSION["teacherid"] =  $result['teacherid'];


					header("Location: teacher-dashboard.php");
					

					}
					else
					{
						header("Location: index.php?status=login-failed");	
					}

			}
			
		}
		
	}
}

////////////////////end authentication codes

///////////////////start teacher registration codes
if (isset($_POST['from']) and $_POST['from'] == 'registration-teacher') {

	$qry = mysqli_query($connection, "select * from teacher_table where username = '" . $username . "'");

	if (mysqli_num_rows($qry) > 0) {

		header("Location: registration.php?s=teacher&firstname=".$_POST['firstname']."&middleinitial=".$_POST['middleinitial']."&lastname=".$_POST['lastname']."&emailaddress=".$_POST['emailaddress']."&contactnumber=".$_POST['contactnumber']."&gender=".$_POST['gender']."&status=username-taken&birthday=".$_POST['birthday']."");
		
	}
	else
	{
		$qry = mysqli_query($connection, "select * from admin_table where username = '" . $username . "'");

		if (mysqli_num_rows($qry) > 0) {

		header("Location: registration.php?s=teacher&firstname=".$_POST['firstname']."&middleinitial=".$_POST['middleinitial']."&lastname=".$_POST['lastname']."&emailaddress=".$_POST['emailaddress']."&contactnumber=".$_POST['contactnumber']."&gender=".$_POST['gender']."&status=username-taken&birthday=".$_POST['birthday']."");
		
		}
		else
		{
			$qry = mysqli_query($connection, "select * from student_table where username = '" . $username . "'");

			if (mysqli_num_rows($qry) > 0) {

			header("Location: registration.php?s=teacher&firstname=".$_POST['firstname']."&middleinitial=".$_POST['middleinitial']."&lastname=".$_POST['lastname']."&emailaddress=".$_POST['emailaddress']."&contactnumber=".$_POST['contactnumber']."&gender=".$_POST['gender']."&status=username-taken&birthday=".$_POST['birthday']."");
			
			}
			else
			{
				$qry = mysqli_query($connection, "select * from viewer_table where username = '" . $username . "'");

				if (mysqli_num_rows($qry) > 0) {

				header("Location: registration.php?s=teacher&firstname=".$_POST['firstname']."&middleinitial=".$_POST['middleinitial']."&lastname=".$_POST['lastname']."&emailaddress=".$_POST['emailaddress']."&contactnumber=".$_POST['contactnumber']."&gender=".$_POST['gender']."&status=username-taken&birthday=".$_POST['birthday']."");
				
				}
				else
				{
					mysqli_query($connection,"insert into teacher_table (firstname, middleinitial, lastname, gender, birthday, emailaddress, contactnumber, username, password) values ('" . $_POST['firstname'] . "', '" . $_POST['middleinitial'] . "', '" . $_POST['lastname'] . "', '" . $_POST['gender'] . "', '" . $_POST['birthday'] . "', '" . $_POST['emailaddress'] . "', '" . $_POST['contactnumber'] . "', '" . $_POST['username'] . "', '" . md5($_POST['password']) . "')");

					$qry = mysqli_query($connection, "select * from teacher_table where username = '" . $_POST['username'] . "'");

					$res = mysqli_fetch_assoc($qry);

					$_SESSION['teacherid'] = $res['teacherid'];
					header("Location: teacher-dashboard.php");

				}
			}
		}			
	}

}
//////////////////end registration teacher codes


///////////////////start student registration codes
if (isset($_POST['from']) and $_POST['from'] == 'registration-student') {

	$qry = mysqli_query($connection, "select * from teacher_table where username = '" . $username . "'");

	if (mysqli_num_rows($qry) > 0) {

		header("Location: registration.php?s=student&firstname=".$_POST['firstname']."&middleinitial=".$_POST['middleinitial']."&lastname=".$_POST['lastname']."&emailaddress=".$_POST['emailaddress']."&contactnumber=".$_POST['contactnumber']."&gender=".$_POST['gender']."&status=username-taken&birthday=".$_POST['birthday']."&studentidnumber=".$_POST['studentidnumber']."&specializedfieldofart=".$_POST['specializedfieldofart']."&address=".$_POST['address']."");
		
	}
	else
	{
		$qry = mysqli_query($connection, "select * from admin_table where username = '" . $username . "'");

		if (mysqli_num_rows($qry) > 0) {

		header("Location: registration.php?s=student&firstname=".$_POST['firstname']."&middleinitial=".$_POST['middleinitial']."&lastname=".$_POST['lastname']."&emailaddress=".$_POST['emailaddress']."&contactnumber=".$_POST['contactnumber']."&gender=".$_POST['gender']."&status=username-taken&birthday=".$_POST['birthday']."&studentidnumber=".$_POST['studentidnumber']."&specializedfieldofart=".$_POST['specializedfieldofart']."&address=".$_POST['address']."");
		
		}
		else
		{
			$qry = mysqli_query($connection, "select * from student_table where username = '" . $username . "'");

			if (mysqli_num_rows($qry) > 0) {

			header("Location: registration.php?s=student&firstname=".$_POST['firstname']."&middleinitial=".$_POST['middleinitial']."&lastname=".$_POST['lastname']."&emailaddress=".$_POST['emailaddress']."&contactnumber=".$_POST['contactnumber']."&gender=".$_POST['gender']."&status=username-taken&birthday=".$_POST['birthday']."&studentidnumber=".$_POST['studentidnumber']."&specializedfieldofart=".$_POST['specializedfieldofart']."&address=".$_POST['address']."");
			
			}
			else
			{
				$qry = mysqli_query($connection, "select * from viewer_table where username = '" . $username . "'");

				if (mysqli_num_rows($qry) > 0) {

				header("Location: registration.php?s=student&firstname=".$_POST['firstname']."&middleinitial=".$_POST['middleinitial']."&lastname=".$_POST['lastname']."&emailaddress=".$_POST['emailaddress']."&contactnumber=".$_POST['contactnumber']."&gender=".$_POST['gender']."&status=username-taken&birthday=".$_POST['birthday']."&studentidnumber=".$_POST['studentidnumber']."&specializedfieldofart=".$_POST['specializedfieldofart']."&address=".$_POST['address']."");
				
				}
				else
				{
					

						$target_dir = "uploaded_images/";
						$target_file = $target_dir . basename($_FILES["profilepicturelocation"]["name"]);
						$uploadOk = 1;
						$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
						// Check if image file is a actual image or fake image
						if(isset($_POST["submit"])) {
						    $check = getimagesize($_FILES["profilepicturelocation"]["tmp_name"]);
						    if($check !== false) {
						        echo "File is an image - " . $check["mime"] . ".";
						        $uploadOk = 1;
						    } else {
						        echo "File is not an image.";
						        $uploadOk = 0;
						    }
						}
					
				
				
						
						    if (move_uploaded_file($_FILES["profilepicturelocation"]["tmp_name"], $target_file)) {
						        echo "The file ". basename( $_FILES["profilepicturelocation"]["name"]). " has been uploaded.";
						    } else {
						        echo "Sorry, there was an error uploading your file.";
						    }
						

						if ($target_file == "uploaded_images/") {
							$target_file =  "images/profile.png";
						}


						mysqli_query($connection,"insert into student_table (firstname, middleinitial, lastname, address, emailaddress, studentidnumber, gender, birthday, specializedfieldofart, profilepicturelocation, username, password, contactnumber) values ('" . $_POST['firstname'] . "', '" . $_POST['middleinitial'] . "', '" . $_POST['lastname'] . "', '" . $_POST['address'] . "', '" . $_POST['emailaddress'] . "', '" . $_POST['studentidnumber'] . "', '" . $_POST['gender'] . "', '" . $_POST['birthday'] . "', '" . $_POST['specializedfieldofart'] . "', '" . $target_file . "', '" . $_POST['username'] . "', '" . md5($_POST['password']) . "', '" . $_POST['contactnumber'] . "')");



					

					$qry = mysqli_query($connection, "select * from student_table where username = '" . $_POST['username'] . "'");

					$res = mysqli_fetch_assoc($qry);

					$_SESSION['studentid'] = $res['studentid'];

					$studentid = $res['studentid'];


					$qry = mysqli_query($connection, "select * from list_of_contribution_and_fine_table where type = 'Contribution'");

					while ($res = mysqli_fetch_assoc($qry)) {
						mysqli_query($connection, "insert into statement_of_account_table (contributionandfineid, studentid, status) values ('" . $res['contributionandfineid'] ."', '" . $studentid . "', 'unpaid')");
					}


					
					header("Location: student-dashboard.php");

				}
			}
		}			
	}

}
//////////////////end registration student codes

///////////////////start viewer registration codes
if (isset($_POST['from']) and $_POST['from'] == 'registration-viewer') {

	$qry = mysqli_query($connection, "select * from teacher_table where username = '" . $username . "'");

	if (mysqli_num_rows($qry) > 0) {

		header("Location: registration.php?s=viewer&firstname=".$_POST['firstname']."&middleinitial=".$_POST['middleinitial']."&lastname=".$_POST['lastname']."&emailaddress=".$_POST['emailaddress']."&contactnumber=".$_POST['contactnumber']."&gender=".$_POST['gender']."&status=username-taken&birthday=".$_POST['birthday']."&address=".$_POST['address']."");
		
	}
	else
	{
		$qry = mysqli_query($connection, "select * from admin_table where username = '" . $username . "'");

		if (mysqli_num_rows($qry) > 0) {

		header("Location: registration.php?s=viewer&firstname=".$_POST['firstname']."&middleinitial=".$_POST['middleinitial']."&lastname=".$_POST['lastname']."&emailaddress=".$_POST['emailaddress']."&contactnumber=".$_POST['contactnumber']."&gender=".$_POST['gender']."&status=username-taken&birthday=".$_POST['birthday']."&address=".$_POST['address']."");
		
		}
		else
		{
			$qry = mysqli_query($connection, "select * from student_table where username = '" . $username . "'");

			if (mysqli_num_rows($qry) > 0) {

			header("Location: registration.php?s=viewer&firstname=".$_POST['firstname']."&middleinitial=".$_POST['middleinitial']."&lastname=".$_POST['lastname']."&emailaddress=".$_POST['emailaddress']."&contactnumber=".$_POST['contactnumber']."&gender=".$_POST['gender']."&status=username-taken&birthday=".$_POST['birthday']."&address=".$_POST['address']."");
			
			}
			else
			{
				$qry = mysqli_query($connection, "select * from viewer_table where username = '" . $username . "'");

				if (mysqli_num_rows($qry) > 0) {

				header("Location: registration.php?s=viewer&firstname=".$_POST['firstname']."&middleinitial=".$_POST['middleinitial']."&lastname=".$_POST['lastname']."&emailaddress=".$_POST['emailaddress']."&contactnumber=".$_POST['contactnumber']."&gender=".$_POST['gender']."&status=username-taken&birthday=".$_POST['birthday']."&address=".$_POST['address']."");
				
				}
				else
				{
					
					mysqli_query($connection,"insert into viewer_table (username, password, firstname, middleinitial, lastname, contactnumber, emailaddress, address, gender, birthday) values ('" . $_POST['username'] . "', '" . md5($_POST['password']) . "', '" . $_POST['firstname'] . "', '" . $_POST['middleinitial'] . "', '" . $_POST['lastname'] . "', '" . $_POST['contactnumber'] . "', '" . $_POST['emailaddress'] . "', '" . $_POST['address'] . "', '" . $_POST['gender'] . "', '" . $_POST['birthday'] . "')");

					$qry = mysqli_query($connection, "select * from viewer_table where username = '" . $_POST['username'] . "'");

					$res = mysqli_fetch_assoc($qry);

					$_SESSION['viewerid'] = $res['viewerid'];
					header("Location: viewer-dashboard.php");

				}
			}
		}			
	}

}
//////////////////end registration viewer codes


//////////////////add party codes
if (isset($_POST['from']) and $_POST['from'] == 'add-party') {

mysqli_query($connection, "insert into party_table (partyname) values ('" . $_POST['partyname'] . "')");

header("Location: list-of-party.php?party=" . $_POST['partyname'] . "&w=added");


}

//////////////////end add party codes

//////////////////delete party codes
if (isset($_GET['from']) and $_GET['from'] == 'delete-party') {

mysqli_query($connection, "delete from party_table where partyid = '" . $_GET['partyid'] . "'");

header("Location: list-of-party.php?party=" . $_GET['partyname'] . "&w=deleted");


}

//////////////////end delete party codes

//////////////////update party codes
if (isset($_POST['from']) and $_POST['from'] == 'edit-party') {

mysqli_query($connection, "update party_table set partyname = '" . $_POST['partyname'] . "' where partyid = '" . $_POST['partyid'] . "'");



header("Location: list-of-party.php?party=" . $_POST['partyname'] . "&w=update");


}

//////////////////end update party codes


//////////////////update member profile codes
if (isset($_POST['from']) and $_POST['from'] == 'edit-member-profile') {

mysqli_query($connection, "update student_table set firstname = '" . $_POST['firstname'] . "', middleinitial = '" . $_POST['middleinitial'] . "', lastname = '" . $_POST['lastname'] . "', gender = '" . $_POST['gender'] . "', birthday = '" . $_POST['birthday'] . "', address = '" . $_POST['address'] . "', studentidnumber = '" . $_POST['studentidnumber'] . "', emailaddress = '" . $_POST['emailaddress'] . "', contactnumber = '" . $_POST['contactnumber'] . "', specializedfieldofart = '" . $_POST['specializedfieldofart'] . "'  where studentid = '" . $_POST['studentid'] . "'");




header("Location: list-of-members.php?name=" . $res['firstname'] . " " . $result['middleinitial'] . " " . $result['lastname'] . "&w=update");


}

//////////////////end update member profile codes


//////////////////update member profile codes
if (isset($_POST['from']) and $_POST['from'] == 'edit-member-profile-1') {

mysqli_query($connection, "update student_table set firstname = '" . $_POST['firstname'] . "', middleinitial = '" . $_POST['middleinitial'] . "', lastname = '" . $_POST['lastname'] . "', gender = '" . $_POST['gender'] . "', birthday = '" . $_POST['birthday'] . "', address = '" . $_POST['address'] . "', studentidnumber = '" . $_POST['studentidnumber'] . "', emailaddress = '" . $_POST['emailaddress'] . "', contactnumber = '" . $_POST['contactnumber'] . "', specializedfieldofart = '" . $_POST['specializedfieldofart'] . "'  where studentid = '" . $_POST['studentid'] . "'");




header("Location: profile.php?w=update");


}

//////////////////end update member profile codes



////////////////// add aspiring member codes
if (isset($_POST['from']) and $_POST['from'] == 'add-candidate') {

			$target_dir = "uploaded_images/";
            $target_file = $target_dir . basename($_FILES["profilepicturelocation"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["profilepicturelocation"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
         
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["profilepicturelocation"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["profilepicturelocation"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

        	if ($target_file == "uploaded_images/") {
				$target_file =  "images/profile.png";
			}

            mysqli_query($connection, "insert into candidate_table (profilepicturelocation, firstname, middleinitial, lastname, positionid, partyid) values ('" . $target_file . "', '" . $_POST['firstname'] . "', '" . $_POST['middleinitial'] . "', '" . $_POST['lastname'] . "', '" . $_POST['positionid'] . "', '" . $_POST['partyid'] . "')");

            header("Location: list-of-aspiring-members.php?member=" . $_POST['firstname'] . " " . $_POST['middleinitial'] . " " . $_POST['lastname'] . "&w=added");




}

//////////////////end add aspiring member codes


////////////////// update aspiring member codes
if (isset($_POST['from']) and $_POST['from'] == 'update-candidate') {

			$target_dir = "uploaded_images/";
            $target_file = $target_dir . basename($_FILES["profilepicturelocation"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["profilepicturelocation"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
         
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["profilepicturelocation"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["profilepicturelocation"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

        	if ($target_file == "uploaded_images/") {
				mysqli_query($connection, "update candidate_table set firstname = '" . $_POST['firstname'] . "', middleinitial = '" . $_POST['middleinitial'] . "', lastname = '" . $_POST['lastname'] . "', positionid = '" . $_POST['positionid'] . "', partyid = '" . $_POST['partyid'] . "' where candidateid = '" . $_POST['candidateid'] . "'  ");
			}
			else
			{
				mysqli_query($connection, "update candidate_table set firstname = '" . $_POST['firstname'] . "', middleinitial = '" . $_POST['middleinitial'] . "', lastname = '" . $_POST['lastname'] . "', positionid = '" . $_POST['positionid'] . "', partyid = '" . $_POST['partyid'] . "', profilepicturelocation = '" . $target_file . "' where candidateid = '" . $_POST['candidateid'] . "'  ");

			}

       

            header("Location: list-of-aspiring-members.php?member=" . $_POST['firstname'] . " " . $_POST['middleinitial'] . " " . $_POST['lastname'] . "&w=update");




}

//////////////////end update aspiring member codes


//////////////////delete candidate codes
if (isset($_GET['from']) and $_GET['from'] == 'delete-candidate') {

mysqli_query($connection, "delete from candidate_table where candidateid = '" . $_GET['candidateid'] . "'");

header("Location: list-of-aspiring-members.php?member=" . $_GET['member'] . "&w=deleted");


}

//////////////////end delete candidate codes


//////////////////delete student codes
if (isset($_GET['from']) and $_GET['from'] == 'delete-student') {

mysqli_query($connection, "delete from student_table where studentid = '" . $_GET['studentid'] . "'");

header("Location: list-of-members.php?member=" . $_GET['member'] . "&w=deleted");


}

//////////////////end delete student codes


//////////////////add news codes
if (isset($_POST['from']) and $_POST['from'] == 'add-news') {

mysqli_query($connection, "insert into news_table (newstitle, newsdescription, adminid, dateposted) values ('" . $_POST['newstitle'] . "', '" . $_POST['newsdescription'] . "', '" . $_SESSION['adminid'] . "', '" . date('Y-m-d') . "')");

header("Location: list-of-news.php?w=added&newstitle=" . $_POST['newstitle'] . "");


}

//////////////////end add news codes


//////////////////delete news codes
if (isset($_GET['from']) and $_GET['from'] == 'delete-news') {

mysqli_query($connection, "delete from news_table where newsid = '" . $_GET['newsid'] . "'");

header("Location: list-of-news.php?w=deleted&newstitle=" . $_GET['newstitle'] . "");


}

//////////////////end delete news codes


//////////////////edit news codes
if (isset($_POST['from']) and $_POST['from'] == 'edit-news') {

mysqli_query($connection, "update news_table set newstitle = '" . $_POST['newstitle'] . "', newsdescription = '" . $_POST['newsdescription'] . "' where newsid = '" . $_POST['newsid'] . "'");

header("Location: list-of-news.php?w=update&newstitle=" . $_POST['newstitle'] . "");


}

//////////////////end edit news codes


//////////////////add event codes
if (isset($_POST['from']) and $_POST['from'] == 'add-event') {

mysqli_query($connection, "insert into event_table (eventtitle, eventdescription, adminid, dateposted) values ('" . $_POST['eventtitle'] . "', '" . $_POST['eventdescription'] . "', '" . $_SESSION['adminid'] . "', '" . date('Y-m-d') . "')");

header("Location: list-of-events.php?w=added&eventtitle=" . $_POST['eventtitle'] . "");


}

//////////////////end add event codes


//////////////////delete event codes
if (isset($_GET['from']) and $_GET['from'] == 'delete-event') {

mysqli_query($connection, "delete from event_table where eventid = '" . $_GET['eventid'] . "'");

header("Location: list-of-events.php?w=deleted&eventtitle=" . $_GET['eventtitle'] . "");


}

//////////////////end delete event codes


//////////////////edit event codes
if (isset($_POST['from']) and $_POST['from'] == 'edit-event') {

mysqli_query($connection, "update event_table set eventtitle = '" . $_POST['eventtitle'] . "', eventdescription = '" . $_POST['eventdescription'] . "' where eventid = '" . $_POST['eventid'] . "'");

header("Location: list-of-events.php?w=update&eventtitle=" . $_POST['eventtitle'] . "");


}

//////////////////end edit event codes



//////////////////add award codes
if (isset($_POST['from']) and $_POST['from'] == 'add-award') {

mysqli_query($connection, "insert into award_table (awardtitle, awarddescription, adminid, dateposted) values ('" . $_POST['awardtitle'] . "', '" . $_POST['awarddescription'] . "', '" . $_SESSION['adminid'] . "', '" . date('Y-m-d') . "')");

header("Location: list-of-awards.php?w=added&awardtitle=" . $_POST['awardtitle'] . "");


}

//////////////////end add award codes


//////////////////delete award codes
if (isset($_GET['from']) and $_GET['from'] == 'delete-award') {

mysqli_query($connection, "delete from award_table where awardid = '" . $_GET['awardid'] . "'");

header("Location: list-of-awards.php?w=deleted&awardtitle=" . $_GET['awardtitle'] . "");


}

//////////////////end delete award codes


//////////////////edit award codes
if (isset($_POST['from']) and $_POST['from'] == 'edit-award') {

mysqli_query($connection, "update award_table set awardtitle = '" . $_POST['awardtitle'] . "', awarddescription = '" . $_POST['awarddescription'] . "' where awardid = '" . $_POST['awardid'] . "'");

header("Location: list-of-awards.php?w=update&awardtitle=" . $_POST['awardtitle'] . "");


}

//////////////////end edit award codes


//////////////////edit viewer codes
if (isset($_POST['from']) and $_POST['from'] == 'edit-viewer-profile') {

mysqli_query($connection, "update viewer_table set firstname = '" . $_POST['firstname'] . "', middleinitial = '" . $_POST['middleinitial'] . "', lastname = '" . $_POST['lastname'] . "', gender = '" . $_POST['gender'] . "', birthday = '" . $_POST['birthday'] . "', address = '" . $_POST['address'] . "', emailaddress = '" . $_POST['emailaddress'] . "', contactnumber = '" . $_POST['contactnumber'] . "' where viewerid = '" . $_POST['viewerid'] . "'");

header("Location: list-of-viewers.php?w=update&viewer=" . $_POST['firstname'] . " " . $_POST['middleinitial'] . " " . $_POST['lastname'] . "");


}

//////////////////end edit viewer codes


//////////////////edit viewer codes
if (isset($_POST['from']) and $_POST['from'] == 'edit-viewer-profile-1') {

mysqli_query($connection, "update viewer_table set firstname = '" . $_POST['firstname'] . "', middleinitial = '" . $_POST['middleinitial'] . "', lastname = '" . $_POST['lastname'] . "', gender = '" . $_POST['gender'] . "', birthday = '" . $_POST['birthday'] . "', address = '" . $_POST['address'] . "', emailaddress = '" . $_POST['emailaddress'] . "', contactnumber = '" . $_POST['contactnumber'] . "' where viewerid = '" . $_POST['viewerid'] . "'");

header("Location: profile.php?w=update");


}

//////////////////end edit viewer codes



//////////////////delete viewer codes
if (isset($_GET['from']) and $_GET['from'] == 'delete-viewer-profile') {

mysqli_query($connection, "delete from viewer_table where viewerid = '" . $_GET['viewerid'] . "'");

header("Location: list-of-viewers.php?w=delete&viewer=" . $_GET['viewer'] . "");


}

//////////////////end delete viewer codes

//////////////////submit vote codes
if (isset($_POST['from']) and $_POST['from'] == 'submit-vote') {

	$qry = mysqli_query($connection, "select * from position_table");

	while ($res = mysqli_fetch_assoc($qry)) {

		if (empty($_POST['a' . $res['positionid']])) {
			$_POST['a' . $res['positionid']] = "";
		}
		mysqli_query($connection, "insert into vote_table (studentid, candidateid) values ('" . $_SESSION['studentid'] . "', '" . $_POST['a' . $res['positionid']] . "')");
	}


header("Location: vote_table.php");

}

//////////////////end submit vote codes


//////////////////add contributions or fines codes
if (isset($_POST['from']) and $_POST['from'] == 'add-contributions-or-fines') {


	
		mysqli_query($connection, "insert into list_of_contribution_and_fine_table (nameofcontributionorfine, amount, type) values ('" . $_POST['nameofcontributionorfine'] . "', '" . $_POST['amount'] . "', '" . $_POST['type'] . "')");

		if ($_POST['type'] == 'Contribution') {

		$qry = mysqli_query($connection, "SELECT * FROM list_of_contribution_and_fine_table ORDER BY contributionandfineid DESC LIMIT 1");

		$res = mysqli_fetch_assoc($qry);

		$contributionandfineid = $res['contributionandfineid'];
		
		$qry = mysqli_query($connection, "select * from student_table");
		while ($res = mysqli_fetch_assoc($qry)) {
			mysqli_query($connection, "insert into statement_of_account_table (contributionandfineid, studentid, status) values ('" . $contributionandfineid ."', '" . $res['studentid'] . "', 'unpaid')");
		}



		}



	
	



header("Location: list-of-contributions-and-fines.php?nameofcontributionorfine='" . $_POST['nameofcontributionorfine'] . "'&w=added");

}

//////////////////end add contributions or fines codes

//////////////////delete contributions or fines codes
if (isset($_GET['from']) and $_GET['from'] == 'delete-contribution-or-fine') {

	mysqli_query($connection, "delete from list_of_contribution_and_fine_table where contributionandfineid = '" . $_GET['contributionandfineid'] . "'");


header("Location: list-of-contributions-and-fines.php?nameofcontributionorfine='" . $_GET['nameofcontributionorfine'] . "'&w=deleted");

}

//////////////////end delete contributions or fines codes


//////////////////edit contributions or fines codes
if (isset($_POST['from']) and $_POST['from'] == 'edit-contribution-or-fine') {

	mysqli_query($connection, "update list_of_contribution_and_fine_table set nameofcontributionorfine = '" . $_POST['nameofcontributionorfine'] . "', type = '" . $_POST['type'] . "', amount = '" . $_POST['amount'] . "' where contributionandfineid = '" . $_POST['contributionandfineid'] . "'");


header("Location: list-of-contributions-and-fines.php?nameofcontributionorfine='" . $_POST['nameofcontributionorfine'] . "'&w=update");

}

//////////////////end edit contributions or fines codes

//////////////////add contributions or fines codes
if (isset($_POST['from']) and $_POST['from'] == 'addcof') {

	mysqli_query($connection, "insert into statement_of_account_table (contributionandfineid, studentid, status,adminid) values ('" . $_POST['contributionandfineid'] . "', '" . $_POST['studentid'] . "', 'unpaid', '" . $_SESSION['adminid'] . "')");



$qry = mysqli_query($connection, "select * from list_of_contribution_and_fine_table where contributionandfineid = '" . $_POST['contributionandfineid'] . "'");
$res = mysqli_fetch_assoc($qry);



header("Location: list-of-statement-of-accounts.php?nameofcontributionorfine='" . $res['nameofcontributionorfine'] . "'&member='" . $_POST['member'] . "'&w=added");

}

//////////////////end add contributions or fines codes


//////////////////remove contributions or fines from student statement of account codes
if (isset($_GET['from']) and $_GET['from'] == 'remove-fines-from-statement-of-account') {

	mysqli_query($connection, "delete from statement_of_account_table where statementofaccountid = '" . $_GET['statementofaccountid'] ."'");

header("Location: list-of-statement-of-accounts.php?nameofcontributionorfine='" . $_GET['nameofcontributionorfine'] . "'&member='" . $_GET['member'] . "'&w=deleted");

}

//////////////////end remove contributions or fines from student statement of account codes

//////////////////start convert to paid codes
if (isset($_GET['from']) and $_GET['from'] == 'convert-to-paid') {

	mysqli_query($connection, "update statement_of_account_table set status = 'paid', datepaid = '" . date('Y-m-d') . "' where statementofaccountid = '" . $_GET['statementofaccountid'] . "'");

header("Location: list-of-statement-of-accounts.php?nameofcontributionorfine='" . $_GET['nameofcontributionorfine'] . "'&member='" . $_GET['member'] . "'&w=update");

}

//////////////////end convert to paid codes

//////////////////start convert to unpaid codes
if (isset($_GET['from']) and $_GET['from'] == 'convert-to-unpaid') {

	mysqli_query($connection, "update statement_of_account_table set status = 'unpaid', datepaid = NULL where statementofaccountid = '" . $_GET['statementofaccountid'] . "'");

	echo


 header("Location: list-of-statement-of-accounts.php?nameofcontributionorfine='" . $_GET['nameofcontributionorfine'] . "'&member='" . $_GET['member'] . "'&w=update");

}

//////////////////end convert to unpaid codes


//////////////////start add artwork category codes
if (isset($_POST['from']) and $_POST['from'] == 'add-artwork-category') {

	mysqli_query($connection, "insert into artwork_category_table (artworkcategoryname) values ('" . $_POST['artworkcategoryname'] ."')");



 header("Location: list-of-artwork-category.php?artworkcategoryname='" . $_POST['artworkcategoryname'] . "'&w=added");

}

//////////////////end add artwork category codes


//////////////////start delete artwork category codes
if (isset($_GET['from']) and $_GET['from'] == 'delete-artwork-category') {

	mysqli_query($connection, "delete from artwork_category_table where artworkcategoryid = '" . $_GET['artworkcategoryid'] . "'");



 header("Location: list-of-artwork-category.php?artworkcategoryname='" . $_GET['artworkcategoryname'] . "'&w=deleted");

}

//////////////////end delete artwork category codes

//////////////////start edit artwork category codes
if (isset($_POST['from']) and $_POST['from'] == 'edit-artwork-category') {

	mysqli_query($connection, "update artwork_category_table set artworkcategoryname = '" . $_POST['artworkcategoryname'] . "' where artworkcategoryid = '" . $_POST['artworkcategoryid'] . "'");


 header("Location: list-of-artwork-category.php?artworkcategoryname='" . $_POST['artworkcategoryname'] . "'&w=update");

}

//////////////////end edit artwork category codes


//////////////////start add artwork announcement
if (isset($_POST['from']) and $_POST['from'] == 'add-artwork-announcement') {

	mysqli_query($connection, "insert into announced_artwork_category_table (artworkcategoryid, teacherid, dateannounced, description) values ('" . $_POST['artworkcategoryid'] . "', '" . $_SESSION['teacherid'] . "', '" . date('Y-m-d') . "', '" . $_POST['description'] . "')");


header("Location: announce-artwork-category.php?w=added");

}

//////////////////start add artwork announcement

//////////////////start delete artwork announcement
if (isset($_GET['from']) and $_GET['from'] == 'delete-artwork-announcement') {

	mysqli_query($connection, "delete from announced_artwork_category_table where announcedartworkcategoryid = '" . $_GET['announcedartworkcategoryid'] . "'");


header("Location: announce-artwork-category.php?w=deleted");

}

//////////////////start delete artwork announcement


//////////////////start edit artwork announcement
if (isset($_POST['from']) and $_POST['from'] == 'edit-artwork-announcement') {

	mysqli_query($connection, "update announced_artwork_category_table set artworkcategoryid = '" . $_POST['artworkcategoryid'] . "', description = '" . $_POST['description'] . "' where announcedartworkcategoryid = '" . $_POST['announcedartworkcategoryid'] ."'");


 header("Location: announce-artwork-category.php?w=updated");

}

//////////////////end edit artwork announcement


//////////////////start add submit-artwork
if (isset($_POST['from']) and $_POST['from'] == 'submit-artwork') {

						$target_dir = "uploaded_images/";
						$target_file = $target_dir . basename($_FILES["uploadfile"]["name"]);
						$uploadOk = 1;
						$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
						// Check if image file is a actual image or fake image
						if(isset($_POST["submit"])) {
						    $check = getimagesize($_FILES["uploadfile"]["tmp_name"]);
						    if($check !== false) {
						        echo "File is an image - " . $check["mime"] . ".";
						        $uploadOk = 1;
						    } else {
						        echo "File is not an image.";
						        $uploadOk = 0;
						    }
						}
						// Check if file already exists
						if (file_exists($target_file)) {
						    echo "Sorry, file already exists.";
						    $uploadOk = 0;
						}
				
						// Allow certain file formats
						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
						&& $imageFileType != "gif" ) {
						    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
						    $uploadOk = 0;
						}
						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
						    echo "Sorry, your file was not uploaded.";
						// if everything is ok, try to upload file
						} else {
						    if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file)) {
						        echo "The file ". basename( $_FILES["uploadfile"]["name"]). " has been uploaded.";
						    } else {
						        echo "Sorry, there was an error uploading your file.";
						    }
						}

						if ($target_file == "uploaded_images/") {
							$target_file =  "images/profile.png";
						}


						mysqli_query($connection,"insert into artwork_table (announcedartworkcategoryid, studentid, dateposted, imagelocation, message) values ('" . $_POST['announcedartworkcategoryid'] . "', '" . $_SESSION['studentid'] . "', '" . date('Y-m-d') . "', '" . $target_file . "', '" . $_POST['message'] . "')");







 header("Location: submit-artworks.php?announcedartworkcategoryid=" . $_POST['announcedartworkcategoryid'] . "&status=success");

}

//////////////////end add submit-artwork


//////////////////update teacher profile admin
if (isset($_POST['from']) and $_POST['from'] == 'edit-teacher-profile') {
mysqli_query($connection, "update teacher_table set firstname = '" . $_POST['firstname'] . "', middleinitial = '" . $_POST['middleinitial'] . "', lastname = '" . $_POST['lastname'] . "', emailaddress = '" . $_POST['emailaddress'] . "', contactnumber = '" . $_POST['contactnumber'] . "', gender = '" . $_POST['gender'] . "', birthday = '" . $_POST['birthday'] . "' where teacherid = '" . $_POST['teacherid'] . "'");

header("Location: list-of-teachers.php?status=update");

}
//////////////////end update teacher profile admin


//////////////////update teacher profile 
if (isset($_POST['from']) and $_POST['from'] == 'edit-teacher-profile-1') {
mysqli_query($connection, "update teacher_table set firstname = '" . $_POST['firstname'] . "', middleinitial = '" . $_POST['middleinitial'] . "', lastname = '" . $_POST['lastname'] . "', emailaddress = '" . $_POST['emailaddress'] . "', contactnumber = '" . $_POST['contactnumber'] . "', gender = '" . $_POST['gender'] . "', birthday = '" . $_POST['birthday'] . "' where teacherid = '" . $_POST['teacherid'] . "'");

header("Location: profile.php?w=update");

}
//////////////////end update teacher profile 



//////////////////delete teacher profile admin
if (isset($_GET['from']) and $_GET['from'] == 'delete-teacher-profile') {
mysqli_query($connection, "delete from teacher_table where teacherid = '" . $_GET['teacherid'] . "'");

header("Location: list-of-teachers.php?status=delete");

}
//////////////////end delete teacher profile admin


if (isset($_POST['from']) and $_POST['from'] == 'add-service-offered') {


						$target_dir = "uploaded_images/";
						$target_file = $target_dir . basename($_FILES["imagelocation"]["name"]);
						$uploadOk = 1;
						$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
						// Check if image file is a actual image or fake image
						if(isset($_POST["submit"])) {
						    $check = getimagesize($_FILES["imagelocation"]["tmp_name"]);
						    if($check !== false) {
						        echo "File is an image - " . $check["mime"] . ".";
						        $uploadOk = 1;
						    } else {
						        echo "File is not an image.";
						        $uploadOk = 0;
						    }
						}
						// Check if file already exists
						if (file_exists($target_file)) {
						    echo "Sorry, file already exists.";
						    $uploadOk = 0;
						}
				
						// Allow certain file formats
						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
						&& $imageFileType != "gif" ) {
						    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
						    $uploadOk = 0;
						}
						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
						    echo "Sorry, your file was not uploaded.";
						// if everything is ok, try to upload file
						} else {
						    if (move_uploaded_file($_FILES["imagelocation"]["tmp_name"], $target_file)) {
						        echo "The file ". basename( $_FILES["imagelocation"]["name"]). " has been uploaded.";
						    } else {
						        echo "Sorry, there was an error uploading your file.";
						    }
						}

						if ($target_file == "uploaded_images/") {
							$target_file =  "images/profile.png";
						}


mysqli_query($connection, "insert into serviceoffered_table (serviceofferedtitle, servicedescription, studentid, dateposted, imagelocation) values ('" . $_POST['serviceofferedtitle'] . "', '" . $_POST['servicedescription'] . "', '" . $_SESSION['studentid'] . "', '" . date('Y-m-d') . "', '" . $target_file . "')");
header("Location: services.php?status=added");
}


if (isset($_POST['from']) and $_POST['from'] == 'update-service-offered') {
mysqli_query($connection, "update serviceoffered_table set serviceofferedtitle = '" . $_POST['serviceofferedtitle'] . "', servicedescription = '" . $_POST['servicedescription'] . "' where serviceofferedid = '" . $_POST['serviceofferedid'] . "'");
header("Location: services.php?status=updated");
}


if (isset($_GET['from']) and $_GET['from'] == 'delete-service-offered') {
mysqli_query($connection, "delete from serviceoffered_table where serviceofferedid = '" . $_GET['serviceofferedid'] . "'");	
header("Location: services.php?status=deleted");
}


if (isset($_POST['from']) and $_POST['from'] == 'set-election') {
	$startingelectiondateandtime = $_POST['startingdate'] . " " . $_POST['startingtime'];
	$endingelectiondateandtime = $_POST['endingdate'] . " " . $_POST['endingtime'];

	mysqli_query($connection, "update election_table set electiondateandtimestart = '" . $startingelectiondateandtime . "', electiondateandtimeend = '" . $endingelectiondateandtime . "', status = '" . $_POST['status'] . "'");

	header("Location: election-setting.php?status=added");
}

if (isset($_POST['from']) and $_POST['from'] == 'submit-message') {
	

	mysqli_query($connection, "insert into service_offered_conversation_table (viewerid, message, serviceofferedid, datetime, studentid,fromwho) values ('" . $_SESSION['viewerid'] . "', '" . $_POST['message'] . "', '" . $_POST['serviceofferedid'] . "', '" . date('Y-m-d H:i:s') . "', '" . $_POST['studentid'] . "','viewer')");


	 header("Location: contact-student-in-services.php?serviceofferedid=". $_POST['serviceofferedid'] ."&status=sent");
}


if (isset($_POST['from']) and $_POST['from'] == 'send-message-from-student') {
	

		mysqli_query($connection, "insert into service_offered_conversation_table (viewerid, message, serviceofferedid, datetime, studentid,fromwho) values ('" . $_POST['viewerid'] . "', '" . $_POST['message'] . "', '" . $_POST['serviceofferedid'] . "', '" . date('Y-m-d H:i:s') . "', '" . $_SESSION['studentid'] . "','student')");

	

			 header("Location: conversation.php?serviceofferedid=" . $_POST['serviceofferedid'] ."&status=sent");
}


if (isset($_POST['from']) and $_POST['from'] == 'edit-password-member-profile') {
mysqli_query($connection, "update student_table set password = '" . md5($_POST['password']) . "' where studentid = '" . $_POST['studentid'] . "'");
header("Location: profile.php?status=updatedpassword");
}

if (isset($_POST['from']) and $_POST['from'] == 'edit-admin-profile-1') {
mysqli_query($connection, "update admin_table set firstname = '" . $_POST['firstname'] . "', middleinitial = '" . $_POST['middleinitial'] . "', lastname = '" . $_POST['lastname'] . "' where adminid = '" . $_POST['adminid'] . "'");


header("Location: profile.php?w=update");
}


if (isset($_POST['from']) and $_POST['from'] == 'edit-password-admin-profile') {
mysqli_query($connection, "update admin_table set password = '" . md5($_POST['password']) . "' where adminid = '" . $_POST['adminid'] . "'");
header("Location: profile.php?status=updatedpassword");
}


if (isset($_POST['from']) and $_POST['from'] == 'edit-password-viewer-profile') {
mysqli_query($connection, "update viewer_table set password = '" . md5($_POST['password']) . "' where viewerid = '" . $_POST['viewerid'] . "'");
header("Location: profile.php?status=updatedpassword");
}

if (isset($_POST['from']) and $_POST['from'] == 'edit-password-teacher-profile') {
mysqli_query($connection, "update teacher_table set password = '" . md5($_POST['password']) . "' where teacherid = '" . $_POST['teacherid'] . "'");
header("Location: profile.php?status=updatedpassword");
}



if (isset($_POST['from']) and $_POST['from'] == 'edit-profile-picture-member') {
						$target_dir = "uploaded_images/";
						$target_file = $target_dir . basename($_FILES["profilepicturelocation"]["name"]);
						$uploadOk = 1;
						$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
						// Check if image file is a actual image or fake image
						if(isset($_POST["submit"])) {
						    $check = getimagesize($_FILES["profilepicturelocation"]["tmp_name"]);
						    if($check !== false) {
						        echo "File is an image - " . $check["mime"] . ".";
						        $uploadOk = 1;
						    } else {
						        echo "File is not an image.";
						        $uploadOk = 0;
						    }
						}
						// Check if file already exists
						if (file_exists($target_file)) {
						    echo "Sorry, file already exists.";
						    $uploadOk = 0;
						}
				
						// Allow certain file formats
						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
						&& $imageFileType != "gif" ) {
						    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
						    $uploadOk = 0;
						}
						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
						    echo "Sorry, your file was not uploaded.";
						// if everything is ok, try to upload file
						} else {
						    if (move_uploaded_file($_FILES["profilepicturelocation"]["tmp_name"], $target_file)) {
						        echo "The file ". basename( $_FILES["profilepicturelocation"]["name"]). " has been uploaded.";
						    } else {
						        echo "Sorry, there was an error uploading your file.";
						    }
						}

						if ($target_file == "uploaded_images/") {
							$target_file =  "images/profile.png";
						}

						mysqli_query($connection, "update student_table set profilepicturelocation = '" . $target_file . "' where studentid = '" . $_POST['studentid'] . "'");
						header("Location: profile.php");

}

if (isset($_GET['from']) and $_GET['from'] == 'inbox-header') {
	mysqli_query($connection,"update service_offered_conversation_table set isread = '1' where serviceofferedconversationid = '" . $_GET['serviceofferedconversationid'] . "'");

	 header("Location: conversation.php?serviceofferedid=".$_GET['serviceofferedid']."");
}

 ?>