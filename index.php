<?php

if(!isset($_SESSION)){
    session_start();
}
    if(isset($_SESSION['UserLogin'])){
        echo"Welcome ".$_SESSION['UserLogin'];
    
    }else{ 
        echo"Welcome Guest ";   
        
    }


// Include the database connection file
include_once("connections/connection.php");

// Establish a connection to the database
$con = connection();



$sql = "SELECT * FROM student_list ORDER BY id DESC";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();


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
    <link rel="stylesheet" href="css/style.css">


</head>
<body>
    <h1>Student Management System</h1>
    <br/>
    <br/>

    <form action="result.php" method="get">    
        <input type="text" name="search" id="search">
    <button type="submit" >search</button>
</form>






    <?php if(isset($_SESSION['UserLogin']))?>
     <a href="indexx.php"></a>
     <a href="logout.php">Logout</a>
    <a href="Add.php">Add New</a>

    <table>
        <thead>
        <tr>
            <th></th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Birthdate</th>

        </tr>
        </thead>
        </tbody> 
        
        <?php do{ ?>

        <tr>
            <td><a href="details.php?ID=<?php echo $row['id'];?>">view</a></td>
        <td> <?php echo $row['first_name']?> </td>
        <td><?php echo $row['last_name']?></td>
        <td><?php echo $row['birth_day']?></td> 

        </tr>
        <?php }while($row = $students->fetch_assoc()) ?>
    </tbody>    

    </table>
</body>
</html>