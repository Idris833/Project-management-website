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
    <title>Project Input</title>
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
    // it will only run if submit is clicked
    if(isset($_POST['submit'])) {
        $project_name = $_POST['project_name'];
        $description = $_POST['description'];
        $start_date=$_POST['start_date'];
        $start_date = date("Y-m-d", strtotime($start_date));
        $end_date=$_POST['end_date'];
        $end_date = date("Y-m-d", strtotime($end_date));
        $is_external = $_POST['is_external'];
        $sql = "INSERT INTO Project (project_name, description, start_date, end_date, is_external) VALUES ('$project_name', '$description' ,'$start_date','$end_date', $is_external);";
        $result = mysqli_query($conn, $sql);   
        if(!$result){
            header("Location: http://clabsql.clamv.jacobs-university.de/~ibenyamna/PHPtesting/feedback/feedback.php?message=Insertion Failed!");
            exit();
        }
        else {
            header("Location: http://clabsql.clamv.jacobs-university.de/~ibenyamna/PHPtesting/feedback/feedback.php?message=Insertion Successful!&referer=project&project_name=$project_name");
            exit();
        }
    }
?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <input type="text" name="project_name" placeholder="project name">
    <br>
    <input type="date" name="start_date" placeholder="start date">
    <br>
    <input type="date" name="end_date" placeholder="end date">
    <br>
    <textarea name="description" cols="30" rows="10" placeholder="description"></textarea>
    <br>
    External?
    <br>
    yes <input type="radio" name="is_external" id="yes" value=true>
    <br>
    no <input type="radio" name="is_external" id="no" value=false checked="checked">
    <br>
    <button type="submit" name="submit">Insert</button>
</form>
</div>
</div>
</body>
</html>