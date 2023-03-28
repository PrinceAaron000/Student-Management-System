<?php


include_once("connections/connection.php");

$con = connection();

if(isset($_POST['submit'])){

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    


  $sql = "INSERT INTO `student_list`(`first_name`, `last_name`,`birth_day`,`gender`) 
   VALUES ('$fname','$lname','$birthday','$gender')";

    $con->query($sql) or die ($con->error);

    echo header("location: index.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/style.css">

    <script>

    function checkforblank(){
        if(document.getElementById('firstname').value == "")    {
            alert('please enter information');
            return false;                         
        }
    }

</script>

</head>
<body>

    <b>
    <form action="" method="post" onsubmit="checkforblank()">
    </br></br><label>First Name:</label>
        <input type="text" name="firstname" id="firstname">

        </br></br> <label>Last Name:</label>
        <input type="text" name="lastname" id="lastname">

        </br></br> <label>Birthdate:</label>
        <input type="text" name="birthday" id="birthday">

        </br></br> <label>Gender:</label>
        <select name="gender" id="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>

        </select>

        </br></br><input type="submit" name="submit" value="Submit form"> </b> <a href="index.php">Back</a>
      
    </form>
   
</body>
</html>