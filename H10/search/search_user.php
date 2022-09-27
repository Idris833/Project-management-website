<?php
include_once '../includes/db_connect_restricted.php';
?>

<!-- A server side php to fetch all details of our users -->
<?php
$sql = "SELECT * FROM User;";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo " Selection for auto completion Failed!";
} else {
    // echo "All-of Selection Successful ";
    // 4 arrays for columns of tables each for username,
    // email, first name and last name
    $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $array_of_Users = array();
    $array_of_email = array();
    $array_of_first_name = array();
    $array_of_last_name = array();
    // populate each array for relevatnt data from array
    foreach ($res as $r => $value) {
        array_push($array_of_Users, $value["username"]);
        array_push($array_of_email, $value["email"]);
        array_push($array_of_first_name, $value["first_name"]);
        array_push($array_of_last_name, $value["last_name"]);
    }
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Search</title>
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
                <input id="username" type="text" name="username" placeholder="username">
                <br>
                <input id="email" type="text" name="email" placeholder="email">
                <br>
                <input id="first_name" type="text" name="first_name" placeholder="first name">
                <br>
                <input id="last_name" type="text" name="last_name" placeholder="last name">
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
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $fname = $_POST['first_name'];
                $lname = $_POST['last_name'];
                $manager = $_POST['manager'];
                $sql = "SELECT * FROM User WHERE username LIKE '%$username%' AND email LIKE '%$email%' AND first_name LIKE '%$fname%' AND last_name LIKE '%$lname%' AND is_manager LIKE '%$manager%';";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo "Selection Failed!";
                } else {
                    echo "Selection Successful ";
                    if ($result->num_rows > 0) {
                        echo "<table>"; // start a table tag in the HTML
                        echo "<tr><td>uid</td><td>username</td><td>email</td><td>first_name</td><td>last_name</td><td>is_manager</td></tr>";
                        while ($row = mysqli_fetch_assoc($result)) {   //Creates a loop to loop through results
                            echo "<tr><td>" . $row['uid'] . "</td><td>" . $row['username'] . "</td><td>" . $row["email"] . "</td><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['is_manager'] . "</td></tr>";
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
        var array_of_Users = <?php echo json_encode($array_of_Users); ?>;
        var array_of_email = <?php echo json_encode($array_of_email); ?>;
        var array_of_first_name = <?php echo json_encode($array_of_first_name); ?>;
        var array_of_last_name = <?php echo json_encode($array_of_last_name); ?>;
        // auto-complete suggestion for each user
        $("#username").autocomplete({
            source: array_of_Users
        });
        $("#email").autocomplete({
            source: array_of_email
        });
        $("#first_name").autocomplete({
            source: array_of_first_name
        });
        $("#last_name").autocomplete({
            source: array_of_last_name
        });
    </script>


</body>

</html>