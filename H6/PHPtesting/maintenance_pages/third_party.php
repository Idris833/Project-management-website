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
    <title>Third Party Input</title>
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
        $company_name = $_POST['company_name'];
        $address = $_POST['address'];
        $description = $_POST['description'];
        $client = $_POST['client'];
        $partner = $_POST['partner'];
        $sql = "INSERT INTO Third_Party (company_name, address, description, client, partner) VALUES ('$company_name', '$address','$description',$client, $partner);";
        $result = mysqli_query($conn, $sql);   
        if(!$result){
            header("Location: http://clabsql.clamv.jacobs-university.de/~ibenyamna/PHPtesting/feedback/feedback.php?message=Insertion Failed!");
            exit();
        }
        else {
            header("Location: http://clabsql.clamv.jacobs-university.de/~ibenyamna/PHPtesting/feedback/feedback.php?message=Insertion Successful!&referer=third_party&company_name=$company_name&client=$client&partner=$partner");
            exit();
        }
        
}
?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <input type="text" name="company_name" placeholder="company name">
    <br>
    <input type="text" name="address" placeholder="address">
    <br>
    <textarea name="description" cols="30" rows="10" placeholder="description"></textarea>
    <br>
    Client?
    <br>
    yes <input type="radio" name="client" id="yes" value=true>
    <br>
    no <input type="radio" name="client" id="no" value=false checked="checked">
    <br>
    Partner?
    <br>
    yes <input type="radio" name="partner" id="yes" value=true>
    <br>
    no <input type="radio" name="partner" id="no" value=false checked="checked">
    <br>
    <button type="submit" name="submit">Insert</button>
</form>
</div>
</div>
</body>
</html>