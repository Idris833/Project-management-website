<?php
include_once '../includes/db_connect_restricted.php';
session_start();

if(isset($_POST['submit'])) {
    if(empty($_POST['txt_uname']) || empty($_POST['txt_pwd']))
    {
        header("location:login_page.php?message= Please fill in both fields");
    }
    else{
        // sanitizing the input
        $username = mysqli_real_escape_string($conn,$_POST['txt_uname']);
        $password = mysqli_real_escape_string($conn,$_POST['txt_pwd']);

        $sql = "SELECT * FROM login_user WHERE username = '$username' AND userpass = '$password';";
        $result = mysqli_query($conn,$sql);
        if(mysqli_fetch_assoc($result))
        {
            $_SESSION['user'] = $_POST['txt_uname'];
            header("location:../../maintenance.php");
        }
        else
        {
            header("location:login_page.php?invalid=Incorrect username or password");
        }
    }

}
else{
    echo 'Error';
}

?>