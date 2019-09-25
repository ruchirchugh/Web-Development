


<?php 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$firstnameErr = $emailErr = $lastnameErr = "";
$firstname = $lastname = $email = $phone = $businessname = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$password1='1234';
$phone=$_POST["phone"];
$businessname=$_POST["businessname"];

  if (empty($_POST["firstname"])) {
    $firstnameErr = "Name is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
  }


   if (empty($_POST["lastname"])) {
    $lastnameErr = "Name is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
  }



  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email= test_input($_POST["email"]);
  }






  $servername = "localhost";
  $username = "ruj8j1g6fq";
  $password = "123";
  $dbname = "ruchirch_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO User(email,password,roleid)
VALUES ('{$email}','{$password1}',1)";
if ($conn->query($sql) === TRUE) {
  
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "INSERT INTO Client(fname,lname,phone,email)
VALUES ('{$firstname}','{$lastname}','{$phone}','{$email}')";
if ($conn->query($sql) === TRUE) {
  
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();


$subject=$firstname.'Your Registration is complete';
$to=$email;
$message='Your temporry password is 1234';
$headers='From :'.$email;
mail($to, $subject, $message, $headers);


echo $firstnameErr;
echo $lastnameErr;

echo $emailErr;

}

?>



<!DOCTYPE html>
<html>
<head>
<title>Pet Store</title>
<link rel="stylesheet" type="text/css" href="css\pet.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script type='text/javascript'>
function validateForm() {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      var numbers = /^[0-9]+$/;

var x=document.forms["myform"]["email"].value;
if (x == "") {
        alert("Name must be filled out");
        return false;
    }
if(!(x.match(mailformat)))

{
alert("Not valid input format");
        return false;

}
var a=document.forms["myform"]["firstname"].value;

if (a == "") {
        alert("Name must be filled out");
        return false;
    }
if (a.length>15){


  alert("lenth should be less than 15");
        return false;
  }
var b=document.forms["myform"]["lastname"].value;

if (b == "") {
        alert("Name must be filled out");
        return false;
    }
if (b.length>15){


  alert("lenth should be less than 15");
        return false;
  var c=document.forms["myform"]["businessname"].value;


if (c.length>15){


  alert("lenth should be less than 15");
        return false;
  }

  ar v=document.forms["myform"]["phone"].value;
{
if (v == "") {
        alert(" phone number must be filled out");
        return false;
    }
if (v.length>10){


  alert("lenth should be less than 15");
        return false;
  }

}
if(!(v.match(numbers)))

{


  alert("phone no should not contain alphabates");
        return false;
  }
} 

}
</script>
</head>
<body id="wrapper">

<header><h1> Pet Store</h1>

</header>

<div class=row>
<div class =column id=c1>
<nav class="wrap">
               <a href=index.php>Home</a>
               <a href=AboutUs.php>About Us</a>
               <a href=contactus.php>Contact Us</a>
               <a href=client.php>Client</a>
               
               <a href=service.php>Service</a>
               <a href=login.php>Login</a>
            </nav>
</div>
<div class =column id=c2>
<img src=Images/petstorebanner5.png>
<div class="wrap">
<p>
<h2>Client</h2>
</p>
<article > 
<p>Required Information is marked with an asterisk (*).</p>
<table>
<form name ="myform" action="client.php" method="post" onsubmit="return validateForm()">


<tr>
<td>    
<label>* First  Name: </label>

 
<td>
<input type=text name="firstname" maxlength="15” pattern="[A-Za-z]+" title="Should not contain numbers"required="required">
</td>
</tr>



<tr>

<td>

<label>* Last Name: </label>
</td>
<td>
<input type=text name="lastname" maxlength="15” pattern="[A-Za-z]+"title="Should not contain numbers"required="required">
</td>
</tr>
<tr>

<td>

<label>* Email</label>
</td>
<td>
<input type=text name="email" pattern= "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"title="valid email format required"required="required">
</td>
</tr>

<tr>

<td>

<label>Phone:</label>
</td>
<td>
<input type=text name="phone">
</td>
</tr>




<tr>

<td>

<label>*Business Name:</label>
</td>
<td>
<input type=text name="businessname" maxlength="15” pattern="[A-Za-z]+"title="Should not contain numbers"required="required">
</td>
</tr>
<tr>
<td>
 <input type="submit" name="submit" value="Submit">  
</td>
</tr>
</form>
</table>

 </article>
</div>
<footer>
<p><i>copyright&copy;2018 Pet Store</i></p>
<p><a href=“mailto:chugh@ruchir.com”>chugh@ruchir.com</a></p>
</footer>
</div>
</div> 

</body>

