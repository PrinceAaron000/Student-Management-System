<?php

include_once("connections/connection.php");

$con = connection();
$id = $_GET['ID'];


$sql = "SELECT * FROM student_list WHERE id = '$id'";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

if(isset($_POST['submit'])){

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    


  $sql = "UPDATE student_list SET first_name = '$fname', last_name = '$lname', birth_day = '$birthday' , gender = '$gender' 
  WHERE id  = '$id'";

    $con->query($sql) or die ($con->error);

    echo header("location: details.php?ID=".$id);

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
    

    <form action="" method="post" onsubmit="checkforblank()">
    </br></br><label>First Name:</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $row['first_name'];?>">

        </br></br> <label>Last Name:</label>
        <input type="text" name="lastname" id="lastname" value="<?php echo $row['last_name'];?>">

        </br></br> <label>Birthdate:</label>
        <input type="text" name="birthday" id="birthday" value="<?php echo $row['birth_day'];?>">

        </br></br> <label>Gender:</label>
        <select name="gender" id="gender">
                <option value="Male" <?php echo($row['gender'] == "Male")? 'selected' : '';?> >Male</option>
                <option value="Female" <?php echo($row['gender'] == "Female")? 'selected' : '';?> >Female</option>

        </select>

        </br></br><input type="submit" name="submit" value="Update">
      
    </form>

</body>
</html>