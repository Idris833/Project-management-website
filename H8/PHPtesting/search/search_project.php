<?php
    include_once '../includes/db_connect_restricted.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Search</title>
    <link rel="stylesheet" href="../../style.css" />
</head>

<body>
    <h1 class="feedback-header"> <u>Search Page</u></h1>
    <div style="display: flex;">
    <div style="margin-left: 20px; margin-right: 50px;">
   
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <input type="text" name="project_name" placeholder="project name">
        <br>
        <input type="text" name="description" placeholder="description">
        <br>
        <input type="date" name="start_date" placeholder="start date">
        <br>
        <input type="date" name="end_date" placeholder="end date">
        <br>
        <input type="radio" name="external" id="no" value="0"> only internal projects 
        <br>
        <input type="radio" name="external" id="yes" value="1"> only external projects
        <br>
        <input type="radio" name="external" id="both" value="" checked="checked"> show both 
        <br>
        <button type="submit" name="submit">Search</button>
    </form>
    </div>
<div>
<?php

// it will only run if search is clicked
if(isset($_POST['submit'])) {
    $project_name = $_POST['project_name'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $is_external = $_POST['external'];
    $sql = "SELECT * FROM Project WHERE project_name LIKE '%$project_name%' AND description LIKE '%$description%' AND start_date LIKE '%$start_date%' AND end_date LIKE '%$end_date%' AND is_external LIKE '%$is_external%';" ; 
    $result = mysqli_query($conn, $sql);   
    if(!$result){
        echo "Selection Failed!";
    }
    else {
        echo "Selection Successful ";
        if ($result->num_rows > 0){
            echo "<table>"; // start a table tag in the HTML
            echo "<tr><td>pid</td><td>project_name</td><td>description</td><td>start_date</td><td>end_date</td><td>is_external</td></tr>";
            while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
                echo "<tr><td>" . $row['pid'] . "</td><td>" . $row['project_name'] . "</td><td>" . $row['description'] . "</td><td>" . $row["start_date"]."</td><td>" . $row['end_date'] . "</td><td>" . $row['is_external'] . "</td></tr>";
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