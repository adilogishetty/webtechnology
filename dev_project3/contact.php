<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Contact</title>
<link rel="stylesheet" href="code.css">
<script type="text/javascript" src="code.js"></script>
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<style>
.buttonHolder{ text-align: center; }
button {
	width: 380px;
	height: 45px;
}
</style>
</head>
<body style="background-image: url(sample1.jpg)">
<div id="tab4" align="center">
<!-- page 4 -->

<?php
// define variables and set to empty values
$link= mysqli_connect("localhost","root","","contact");
//Check connection
//if (!$link) {
  //  die("Connection failed: " . mysqli_connect_error());
//}
//echo "Connected successfully";

$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

date_default_timezone_set("America/New_York");
       $timestamp = date('Y-m-d G:i:s');

$querry = "INSERT INTO cont1(name,email,website,comment,gender,timestamp)
VALUES ('$name', '$email', '$website', '$comment', '$gender' , '$timestamp')";

if ($link->query($querry) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $querry . "<br>" . $link->error;
}

// Mail Stuff
     //  $to = "adi.logishetty@gmail.com";
       //$subject = "New Form Submitted";
       //$txt = "Someone submitted new form";
       //$headers = "From: donotreply@fmt.com" ;
	   
	 //  $stmt=$link->prepare($querry);
           //         if($stmt->execute()==true)
               //         {
             //                mail($to,$subject,$txt,$headers);
                 //            echo "<script>alert(' Submitted Successful')</script>";
                   //          EXIT();
                             //header('Location:index.php');
                        }

//}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>



<h2>Contact form</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

//<?php
//echo "<h2>Your Input:</h2>";
//echo $name;
//echo "<br>";
//echo $email;
//echo "<br>";
//echo $website;
//echo "<br>";
//echo $comment;
//echo "<br>";
//echo $gender;
//?>

	
	<!-- /tab4 -->
</body>
</html>