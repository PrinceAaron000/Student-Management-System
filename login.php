<?php

if(!isset($_SESSION)){
    session_start();
}


include_once("connections/connection.php");
$con = connection();



if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM student_users WHERE username = '$username' AND password = 
    '$password'";

    $user = $con->query($sql) or die ($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

    if($total > 0){
        $_SESSION['UserLogin'] = $row['username'];
        $_SESSION['Access'] = $row['access'];

        $_SESSION['UserLogin'];

        echo header("Location: indexx.php");
    }else{
        
        echo "No user found.";
    }

}


// do{

//     echo $row['first_name']." " .$row['first_name']. "<br/>";

// }while($row = $students->fetch_assoc());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/back.css">


</head>
<body>
<div class="login-box">

    
    <h1>Student Management System
        Login
    </h1>
    <br/>
    <form action="" method="post"> 
    <div class="user-box">


    <label>Username</label>
    <br/>
    <input type="text" name="username" id="username" required="" > 

    </div>
			<div class="user-box">


    <label>Password</label>
    <br/>
    <input type="password" name="password" id="password" required="" >

    </div>
    
    <button type="submit" name="login">Login</button>
 



    </form>
	</div>


</body>
</html>