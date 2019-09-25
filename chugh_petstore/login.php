
<?php 
ob_start();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$passwordErr = $emailErr = "";
$email = $password ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {



  if (empty($_POST["email"])) {
    $emailErr = "email is required";
  } else {
    $email = test_input($_POST["email"]);
  }


if (empty($_POST["password"])) {
    $emailErr = "password is required";
  } else {
    $password = test_input($_POST["passwordErr"]);
  }





  $servername = "localhost";
  $username = "cpses_rufqkgxjsy";
  $password = "123456";
  $dbname = "ruchirch_db";

  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT email,password,roleid FROM User WHERE email= '$email' ";

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

if($row["roleid"]==1)

{

  //echo "<sript>location.href='clientlogin.php';</scrpt>";

  header("Location:clientlogin.html");
}
else
{
//echo "<sript>location.href='businesslogin.php';</scrpt>";


  header("Location:businesslogin.html");

}


$sql="SELECT roleid from User where User.email='{$email}'";

$role=$conn->query($sql);


if($passwordintable==$password)

{
if($role==1)

{

  header("Location: clientlogin.php");
}
if($role==2)


{
 header("Location: businesslogin.php");

}

}


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
var y=document.forms["myform"]["password"].value;
    
if (y == "") {
        alert("Name must be filled out");
        return false;
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
<h2>Login </h2>
</p>
<article > 
<p>Required Information is marked with an asterisk (*).</p>
<table>
<form name ="myform" action="login.php" method="post" onsubmit="return validateForm()">
<tr>

<td>

<label>Email:</label>
</td>
<td>
<input type=text name=email pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"title="valid email format required"required="required">
</td>
</tr>


<tr>
<td>
<label>Password:</label>
</td>
<td>
<input type=password name=password required="required">
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


