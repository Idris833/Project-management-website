<?php
    include_once '../includes/db_connect.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css"/>
    <title>User Input</title>
</head>
<body>
<div style="display: flex;">
        <div class="navbar-left" >
            <div><img class="image-css" src="../../Logos/name-logo.png" alt="jpts" /></div>    
            <div><a href="../../index.html"><p>Home</p></a></div>
            <div><a href="../../project.html"><p>Project</p></a></div>
            <a href="../../imprint.html"><div><p>Imprint</p></div></a>
            <div><a href="../../maintenance.html"><p>Maintenance Pages</p></a></div>
            
        </div>
<div class="main-css" style="margin-top: 20px;">
<?php
    
    /*$sql = "SELECT uid, username, is_manager FROM User ORDER BY uid";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0){
        echo "<table>"; // start a table tag in the HTML
        echo "<tr><td>uid</td><td>username</td><td>is_manager</td></tr>";
        while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
            echo "<tr><td>" . $row['uid'] . "</td><td>" . $row['username'] . "</td><td>" . $row["is_manager"]."</td></tr>";  //$row['index'] the index here is a field name
        }   
        echo "</table>"; //Close the table in HTML
    } else {echo "0 results";}
    */


    // it will only run if submit is clicked
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $manager = $_POST['manager'];
        $sql = "INSERT INTO User (username, email, first_name, last_name, is_manager) VALUES ('$username', '$email','$fname','$lname', $manager);";
        $result = mysqli_query($conn, $sql);   
        if(!$result){
            echo "Insertion Failed!";
            header("Location: ../feedback/feedback.php?message=Insertion Failed!");
            exit();
        }
        else {
            echo "Insertion Successful!";
            header("Location: ../feedback/feedback.php?message=Insertion Successful!&referer=user&username=$username&email=$email&fname=$fname&lname=$lname");
            exit();
        }
       
        
}
?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <input type="text" name="username" placeholder="username">
    <br>
    <input type="text" name="email" placeholder="email">
    <br>
    <input type="text" name="first_name" placeholder="first name">
    <br>
    <input type="text" name="last_name" placeholder="last name">
    <br>
    Manager?
    <br>
    yes <input type="radio" name="manager" id="yes" value=true>
    <br>
    no <input type="radio" name="manager" id="no" value=false checked="checked">
    <br>
    <button type="submit" name="submit">Insert</button>
</form>
</div>
</div>
</body>
</html>