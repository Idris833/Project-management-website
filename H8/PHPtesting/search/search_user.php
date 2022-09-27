<?php
    include_once '../includes/db_connect_restricted.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Search</title>
    <link rel="stylesheet" href="../../style.css" />
</head>

<body>
    <h1 class="feedback-header"> <u>Search Page</u></h1>
    <div style="display: flex;">
    <div style="margin-left: 20px; margin-right: 50px;">
   
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <input type="text" name="username" placeholder="username">
        <br>
        <input type="text" name="email" placeholder="email">
        <br>
        <input type="text" name="first_name" placeholder="first name">
        <br>
        <input type="text" name="last_name" placeholder="last name">
        <br>
        <input type="radio" name="manager" id="no" value="0"> only employees 
        <br>
        <input type="radio" name="manager" id="yes" value="1"> only managers
        <br>
        <input type="radio" name="manager" id="both" value="" checked="checked"> show both 
        <br>
        <button type="submit" name="submit">Search</button>
    </form>
    </div>
<div>
<?php

// it will only run if search is clicked
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $manager = $_POST['manager'];
    $sql = "SELECT * FROM User WHERE username LIKE '%$username%' AND email LIKE '%$email%' AND first_name LIKE '%$fname%' AND last_name LIKE '%$lname%' AND is_manager LIKE '%$manager%';" ;
    $result = mysqli_query($conn, $sql);   
    if(!$result){
        echo "Selection Failed!";
    }
    else {
        echo "Selection Successful ";
        if ($result->num_rows > 0){
            echo "<table>"; // start a table tag in the HTML
            echo "<tr><td>uid</td><td>username</td><td>email</td><td>first_name</td><td>last_name</td><td>is_manager</td></tr>";
            while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
                echo "<tr><td>" . $row['uid'] . "</td><td>" . $row['username'] . "</td><td>" . $row["email"]."</td><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['is_manager'] . "</td></tr>";
            }   
            echo "</table>"; //Close the table in HTML
        } else {echo "0 results";}
    }
   
    
}
?>
</div>
</div>
</body>

</html>