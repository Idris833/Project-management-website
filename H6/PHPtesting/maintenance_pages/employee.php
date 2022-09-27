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
    <title>Manager Input</title>
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
<div class="main-css">
<?php
    // used as a reference, to assign employees
    $sql = "SELECT uid, username, is_manager FROM User ORDER BY uid";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0){
    echo "<table>"; // start a table tag in the HTML
    echo "<tr><td>uid</td><td>username</td><td>is_manager</td></tr>";
    while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
        echo "<tr><td>" . $row['uid'] . "</td><td>" . $row['username'] . "</td><td>" . $row["is_manager"]."</td></tr>";  //$row['index'] the index here is a field name
    }   
    echo "</table>"; //Close the table in HTML
    } else {echo "0 results";}

    // it will only run if submit is clicked
    if(isset($_POST['submit'])) {
        $uid = $_POST['uid'];
        $sql = "INSERT INTO Employee (uid) VALUES ($uid);";
        $result = mysqli_query($conn, $sql);   
        if(!$result){
            header("Location: http://clabsql.clamv.jacobs-university.de/~ibenyamna/PHPtesting/feedback/feedback.php?message=Insertion Failed!");
            exit();
        }
        else {
            header("Location: http://clabsql.clamv.jacobs-university.de/~ibenyamna/PHPtesting/feedback/feedback.php?message=Insertion Successful!&referer=employee&uid=$uid");
            exit();
        }
        
}
?>
<p>Type in the uid of the user you want to add as an employee.<br>The insertion will fail if the user was already assigned as an employee</p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <input type="text" name="uid" placeholder="uid">
    <br>
    <button type="submit" name="submit">Insert</button>
</form>
</div>
</div>
</body>
</html>