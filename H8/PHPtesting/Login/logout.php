<?php
    session_start();
    if($_GET['logout'] == 'true')
    {
        session_destroy();
        header("location: login_page.php");
    }

?>