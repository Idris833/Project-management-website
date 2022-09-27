<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../style.css" />
</head>

<body>
    <h1 class="feedback-header"> <u>Feedback Page</u></h1>

    <p class="message"> <?php
                        echo $_GET['message'];
                        ?>
    </p>

    <div class='new-user-feedback'  > 
        <?php 
            if ($_GET['referer'] == "user")  {
                echo "<p > A user with 
                username <b>$_GET[username]</b>, 
                and email <b>$_GET[email]</b> has been created. </p>";
            }elseif($_GET['referer'] == "employee"){
                echo "<p> User with uid $_GET[uid] has been added as employee. </p>";
            }elseif ($_GET['referer'] == 'project') {
                echo "<p>A new project <b>$_GET[project_name]</b> has been added.</p>";
            }elseif ($_GET['referer'] == 'manager') {
                echo "<p>A user with uid <b>$_GET[uid]</b> has been assigned as manager. S/he is also assigned a project with pid M<b>$_GET[pid]</b>.</p>";
            }elseif ($_GET['referer'] == 'team') {
                echo "<p>A new team <b>$_GET[team_name]</b> has been created. </p>";
            }elseif ($_GET['referer'] == 'role') {
                echo "<p>A new role <b>$_GET[role_name]</b> has been created. </p>";
            }elseif ($_GET['referer'] == 'team_member') {
                echo "<p>A user with eid <b> $_GET[eid] </b> has been added to the team with id <b>$_GET[tid] </b> with roleid <b> $_GET[rid]</b>.</p>";
            }elseif ($_GET['referer'] == 'task') {
                echo "<p>A new task <b> $_GET[task_name] </b> has been created.</p>";
            }elseif ($_GET['referer'] == 'assigned'){
                echo "<p>  An employee with eid <b>$_GET[eid] </b> and role id <b> $_GET[rid] </b> has been assigned a task with id <b> $_GET[task_id]. </b> </p>";
            }elseif ($_GET['referer'] == 'third_party' ) {
                echo "<p> A new third party <b>$_GET[company_name]</b> has created.</p>";
                
                if ($_GET['client'] == 'true' & $_GET['partner'] == 'true')  {
                    echo "<p>It is both client and partner. </p>";
                }elseif ($_GET['client'] == 'true') {
                    echo "<p>It is a client. </p>";
                }elseif ($_GET['partner'] == 'true') {
                    echo "<p>It is a partner. </p>";
                }
            }elseif ($_GET['referer'] == 'helps_or_requests') {
               echo "<p>A help request has been created for task <b>$_GET[tpid]</b> and project <b>$_GET[pid]</b></p>";
            }
        
        
        
    
        ?>
    </div>
    
    <p class="previous-page" > <a href="<?php
        echo $_SERVER['HTTP_REFERER'] 
    ?>" >Return to Previous Page</a> </p>
    <p class="goto-maintenanc-page">
        <a href="../../maintenance.html" >
        Return to Maintenance Page
        </a>

    </p>

</body>

</html>