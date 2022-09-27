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
    <title>Team Input</title>
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

    // it will only run if submit is clicked
    if(isset($_POST['submit'])) {
        $team_name = $_POST['team_name'];
        $sql = "INSERT INTO Team (team_name) VALUES ('$team_name');";
        $result = mysqli_query($conn, $sql);   
        if(!$result){
            header("Location: http://clabsql.clamv.jacobs-university.de/~ibenyamna/PHPtesting/feedback/feedback.php?message=Insertion Failed!");
            exit();
        }
        else {
            header("Location: http://clabsql.clamv.jacobs-university.de/~ibenyamna/PHPtesting/feedback/feedback.php?message=Insertion Successful!&referer=team&team_name=$team_name");
            exit();
        }    
    }
?>


<p>Type in the name of the new team you want to create</p>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <input type="text" name="team_name" placeholder="team name">
    <button type="submit" name="submit">Insert</button>
</form>
</div>
</div>
</body>
</html>