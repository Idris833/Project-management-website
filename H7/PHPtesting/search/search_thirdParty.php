<?php
    include_once '../includes/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Third Party Search</title>
    <link rel="stylesheet" href="../../style.css" />
</head>

<body>
    <h1 class="feedback-header"> <u>Search Page</u></h1>
    <div style="display: flex;">
    <div style="margin-left: 20px; margin-right: 50px;">
   
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <input type="text" name="company_name" placeholder="company_name">
        <br>
        <input type="text" name="address" placeholder="address">
        <br>
        <input type="text" name="description" placeholder="description">
        <br>
        Client ?
        <br>
        <input type="radio" name="client" value="1"> yes
        <br>
        <input type="radio" name="client" value="0"> no
        <br>
        Partner ?
        <br>
        <input type="radio" name="partner" value="1"> yes
        <br>
        <input type="radio" name="partner" value="0"> no
        <br>
        <button type="submit" name="submit">Search</button>
    </form>
    </div>
<div>
<?php

// it will only run if search is clicked
if(isset($_POST['submit'])) {
    $company_name = $_POST['company_name'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $client = $_POST['client'];
    $partner = $_POST['partner'];
    $sql = "SELECT * FROM Third_Party WHERE company_name LIKE '%$company_name%' AND address LIKE '%$address%' 
    AND description LIKE '%$description%' AND client LIKE '%$client%' AND partner LIKE '%$partner%';" ;
    $result = mysqli_query($conn, $sql);   
    if(!$result){
        echo "Selection Failed!";
    }
    else {
        echo "Selection Successful ";
        if ($result->num_rows > 0){
            echo $result->num_rows . " results";
            echo "<table>"; // start a table tag in the HTML
            echo "<tr><td>tpid</td><td>company_name</td><td>address</td><td>description</td><td>client</td><td>partner</td></tr>";
            while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results
                echo "<tr><td>" . $row['tpid'] . "</td><td>" . $row['company_name'] . "</td><td>" . $row["address"]."</td><td>" . $row['description'] . "</td><td>" . $row['client'] . "</td><td>" . $row['partner'] . "</td></tr>";
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