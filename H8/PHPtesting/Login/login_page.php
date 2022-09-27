<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>
<body>
<div class="container">
    
    <form method="post" action="process.php">
        <div id="div_login">
            <h1>Login</h1>
            <?php
                if($_GET['message'] == true)
                {
                    echo $_GET['message'];
                }
            ?>
            <?php
                if($_GET['invalid'] == true)
                {
                    echo $_GET['invalid'];
                }
            ?>
            <div>
                <input type="text" class="textbox" name="txt_uname" placeholder="Username" />
            </div>
            <div>
                <input type="password" class="textbox" name="txt_pwd" placeholder="Password"/>
            </div>
            <div>
                <button type="submit" name="submit">Login</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>