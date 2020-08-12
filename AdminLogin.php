

<?php 
include ('db_connect.php');
$Name = "";
$Password = "";
if (isset($_POST['Login'])) {

		$Name =$_POST['Name'];
		$Password = $_POST['Password'];
	if (empty($Name) || empty($Password)) {
		$mess = "Fill up all the field";
	}else{
		$sql = "SELECT Password FROM admin WHERE Name = '$Name' ";
		$pass=getdata($sql);
		foreach ($pass as $key => $value) {
			$passdb = $value['Password'];
		}
		echo $passdb;
		if ($Password == $passdb) {
			header('location:AdminHome.php');
		}
		else{
			$mess="Password Wrong";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<center>
<head>
	<title>Admin Login</title>
</head>
<body>
	<div>
		<h2> Log In</h2>

	</div>
	<h2>
		<?php 
			if (isset($mess)) {
				echo $mess;
			}
		 ?>
	</h2>
	<form method="post" action="AdminLogin.php" >
	  <div>
	  	<tr>
			<td>
				<label>Name </label>
				<input type="text" name="Name" align="left"> 
				<br></br>
			</td>
		</tr>
		<tr>
			<td>
				<label>Password</label>
				<input type="Password" name="Password" align="left" >
					<br></br>
			</td>
		</tr>
		
		<button name="Login">Login</button>

		<p>Not a member yet? <a href="AdminReg.php">Sign Up </a></p>

	  </div>
 </form>

</body>
</center>
</html>