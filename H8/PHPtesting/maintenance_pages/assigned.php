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
    <link rel="stylesheet" href="../../style.php"/>
    <title>Assigned Input</title>
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
<div style = "display: flex;">
<div>
<?php
    // used as a reference, to assign employees
    $sql = "SELECT eid, username FROM User INNER JOIN Employee ON User.uid = Employee.uid";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0){
    echo "<table>"; // start a table tag in the HTML
    echo "<tr><td>eid</td><td>username</td>";
    while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
        echo "<tr><td>" . $row['eid'] . "</td><td>" . $row['username'] . "</td></tr>";  
    }   
    echo "</table>"; //Close the table in HTML
    } else {echo "0 results";}

    // it will only run if submit is clicked
    if(isset($_POST['submit'])) {
        $eid = $_POST['eid'];
        $rid = $_POST['rid'];
        $task_id = $_POST['task_id'];
        $sql = "INSERT INTO assigned (eid, rid, task_id) VALUES ($eid, $rid, $task_id);";
        $result = mysqli_query($conn, $sql);   
        if(!$result){
            header("Location: http://clabsql.clamv.jacobs-university.de/~ibenyamna/PHPtesting/feedback/feedback.php?message=Insertion Failed!");
            exit();
        }
        else {
            header("Location: http://clabsql.clamv.jacobs-university.de/~ibenyamna/PHPtesting/feedback/feedback.php?message=Insertion Successful!&referer=assigned&eid=$eid&rid=$rid&task_id=$task_id");
            exit();
        }    
    }
?>
</div>
<div style = "margin-left: 30px;">
<?php
// used as a reference, to assign employees
    $sql = "SELECT rid, role_name FROM Role;";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0){
    echo "<table>"; // start a table tag in the HTML
    echo "<tr><td>rid</td><td>role_name</td></tr>";
    while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
        echo "<tr><td>" . $row['rid'] . "</td><td>" . $row['role_name'] . "</td></tr>";  
    }   
    echo "</table>"; //Close the table in HTML
    } else {echo "0 results";}
?>
</div>
<div style = "margin-left: 30px;">
<?php
// used as a reference, to assign employees
    $sql = "SELECT task_id, task_name, project_id, project_name FROM Task INNER JOIN Project ON pid = project_id;";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0){
    echo "<table>"; // start a table tag in the HTML
    echo "<tr><td>task_id</td><td>task_name</td><td>project_id</td><td>project_name</td></tr>";
    while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
        echo "<tr><td>" . $row['task_id'] . "</td><td>".$row['task_name']. "</td><td>".$row['project_id']."</td><td>".$row['project_name']. "</td></tr>";  
    }   
    echo "</table>"; //Close the table in HTML
    } else {echo "0 results";}
?>
</div>
</div>

<p>Type in the eid of the employee you want to assign a task to along with the task id and role id.</p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <input type="text" name="eid" placeholder="eid">
    <br>
    <input type="text" name="rid" placeholder="rid">
    <br>
    <input type="text" name="task_id" placeholder="task id">
    <br>
    <button type="submit" name="submit">Insert</button>
</form>
</div>
</div>
</body>
</html>