<?php
include_once '../includes/db_connect_restricted.php';
?>

<!-- A server side php to fetch all details of our Projects-->
<?php
$sql = "SELECT * FROM Project;";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "All-of Selection Failed!";
} else {
    $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $array_of_names = array();
    $array_of_descriptions = array();

    foreach ($res as $r => $value) {
        array_push($array_of_names, $value["project_name"]);
        array_push($array_of_descriptions, $value["description"]);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Search</title>
    <link rel="stylesheet" href="../../style.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <h1 class="feedback-header"> <u>Search Page</u></h1>
    <div style="display: flex;">
        <div style="margin-left: 20px; margin-right: 50px;">

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input id="project_name" type="text" name="project_name" placeholder="project name">
                <br>
                <input id="description" type="text" name="description" placeholder="description">
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
            if (isset($_POST['submit'])) {
                $project_name = $_POST['project_name'];
                $description = $_POST['description'];
                $start_date = $_POST['start_date'];
                $end_date = $_POST['end_date'];
                $is_external = $_POST['external'];
                $sql = "SELECT * FROM Project WHERE project_name LIKE '%$project_name%' AND description LIKE '%$description%' AND start_date LIKE '%$start_date%' AND end_date LIKE '%$end_date%' AND is_external LIKE '%$is_external%';";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo "Selection Failed!";
                } else {
                    echo "Selection Successful ";
                    if ($result->num_rows > 0) {
                        echo "<table>"; // start a table tag in the HTML
                        echo "<tr><td>pid</td><td>project_name</td><td>description</td><td>start_date</td><td>end_date</td><td>is_external</td></tr>";
                        while ($row = mysqli_fetch_assoc($result)) {   //Creates a loop to loop through results
                            echo "<tr><td>" . $row['pid'] . "</td><td>" . $row['project_name'] . "</td><td>" . $row['description'] . "</td><td>" . $row["start_date"] . "</td><td>" . $row['end_date'] . "</td><td>" . $row['is_external'] . "</td></tr>";
                        }
                        echo "</table>"; //Close the table in HTML
                    } else {
                        echo "0 results";
                    }
                }
            }
            ?>
        </div>
    </div>
    <!-- javascript tag with jquery to autocomplete suggestion -->
    <script>
        // converting php arrays to javascript arrays
        var array_of_names = <?php echo json_encode($array_of_names); ?>;
        var array_of_descriptions = <?php echo json_encode($array_of_descriptions); ?>;
        
        $("#project_name").autocomplete({
            source: array_of_names
        });
        $("#description").autocomplete({
            source: array_of_descriptions
        });
    </script>

</body>

</html>