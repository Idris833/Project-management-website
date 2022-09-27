<?php
    include_once '../includes/db_connect.php';
    session_start();
    if(!isset($_SESSION['user']))
    {
        header("location:../Login/login_page.php");
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css"/>
    <title>Helps or Requests Input</title>
</head>
<body>
<div style="display: flex;">
        <div class="navbar-left" >
            <div><img class="image-css" src="../../Logos/name-logo.png" alt="jpts" /></div>    
            <div><a href="../../index.html"><p>Home</p></a></div>
            <div><a href="../../project.html"><p>Project</p></a></div>
            <a href="../../imprint.html"><div><p>Imprint</p></div></a>
            <div><a href="../../maintenance.php"><p>Maintenance Pages</p></a></div>
            
        </div>
<div class="main-css">
<div style = "display: flex;">
<div>
<?php
    // used as a reference, to assign employees
    $sql = "SELECT tpid ,company_name, client, partner FROM Third_Party";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0){
    echo "<table>"; // start a table tag in the HTML
    echo "<tr><td>tpid</td><td>company_name</td><td>client</td><td>partner</td></tr>";
    while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
        echo "<tr><td>" . $row['tpid'] . "</td><td>" . $row['company_name'] . "</td><td>".$row['client']."</td><td>".$row['partner']."</td></tr>";  
    }   
    echo "</table>"; //Close the table in HTML
    } else {echo "0 results";}

    // it will only run if submit is clicked
    if(isset($_POST['submit'])) {
        $tpid = $_POST['tpid'];
        $pid = $_POST['pid'];
        $description = $_POST['description'];
        $sql = "INSERT INTO helps_or_requests (tpid, pid, description) VALUES ($tpid, $pid, '$description');";
        $result = mysqli_query($conn, $sql);   
        if(!$result){
            header("Location: http://clabsql.clamv.jacobs-university.de/~ibenyamna/PHPtesting/feedback/feedback.php?message=Insertion Failed!");
            exit();
        }
        else {
            header("Location: http://clabsql.clamv.jacobs-university.de/~ibenyamna/PHPtesting/feedback/feedback.php?message=Insertion Successful!&tpid=$tpid&pid=$pid");
            exit();
        }    
    }
?>
</div>
<div style = "margin-left: 30px;">
<?php
// used as a reference, to assign employees
$sql = "SELECT pid, project_name, is_external FROM Project;";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0){
echo "<table>"; // start a table tag in the HTML
echo "<tr><td>pid</td><td>project_name</td><td>is_external</td></tr>";
while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
    echo "<tr><td>" . $row['pid'] . "</td><td>" . $row['project_name'] . "</td><td>". $row['is_external'] ."</td></tr>";  
}   
echo "</table>"; //Close the table in HTML
} else {echo "0 results";}

?>
</div>
</div>

<p>Type in the tpid of the Third Party along with the pid of which project you want to assign it to.</p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <input type="text" name="tpid" placeholder="tpid">
    <br>
    <input type="text" name="pid" placeholder="pid">
    <br>
    <textarea name="description" cols="30" rows="10" placeholder="description"></textarea>
    <br>
    <button type="submit" name="submit">Insert</button>
</form>
</div>
</div>
</body>
</html>