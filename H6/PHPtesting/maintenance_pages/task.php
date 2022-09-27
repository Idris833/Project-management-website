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
    <title>Task Input</title>
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
    $sql = "SELECT pid, project_name FROM Project;";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0){
    echo "<table>"; // start a table tag in the HTML
    echo "<tr><td>pid</td><td>project_name</td></tr>";
    while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
        echo "<tr><td>" . $row['pid'] . "</td><td>" . $row['project_name'] ."</td></tr>";  
    }   
    echo "</table>"; //Close the table in HTML
    } else {echo "0 results";}

    // it will only run if submit is clicked
    if(isset($_POST['submit'])) {
        $task_name = $_POST['task_name'];
        $project_id = $_POST['project_id'];
        $description = $_POST['description'];
        $start_date=$_POST['start_date'];
        $start_date = date("Y-m-d", strtotime($start_date));
        $end_date=$_POST['end_date'];
        $end_date = date("Y-m-d", strtotime($end_date));
        $sql = "INSERT INTO Task (task_name, project_id,description, start_date, end_date) VALUES ('$task_name', $project_id ,'$description' ,'$start_date','$end_date');";
        $result = mysqli_query($conn, $sql);   
        if(!$result){
            header("Location: http://clabsql.clamv.jacobs-university.de/~ibenyamna/PHPtesting/feedback/feedback.php?message=Insertion Failed!");
            exit();
        }
        else {
            header("Location: http://clabsql.clamv.jacobs-university.de/~ibenyamna/PHPtesting/feedback/feedback.php?message=Insertion Successful!&referer=task&task_name=$task_name");
            exit();
        }
    }
?>
<p>Create a new task and assign it to a project using the pid of the project</p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <input type="text" name="task_name" placeholder="task name">
    <br>
    <input type="text" name="project_id" placeholder="pid">
    <br>
    <input type="date" name="start_date" placeholder="start date">
    <br>
    <input type="date" name="end_date" placeholder="end date">
    <br>
    <textarea name="description" cols="30" rows="10" placeholder="description"></textarea>
    <br>
    <button type="submit" name="submit">Insert</button>
</form>
</div>
</div>
</body>
</html>