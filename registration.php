<?php
    include 'helper/DB_connection.php';

    $error = '';

    if (isset($_POST['action']) && $_POST['action'] == 'registration') {
        $username = isset($_POST['username']) && $_POST['username'] != '' ? $_POST['username'] : null;
        $password = isset($_POST['password']) && $_POST['password'] != '' ? $_POST['password'] : null;
        $repeat_password = isset($_POST['repeat_password']) && $_POST['repeat_password'] != '' ? $_POST['repeat_password'] : null;
    
        if ($username && $password && $repeat_password) {
            if ($password == $repeat_password) {
                $password = md5($password);
                $insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
                if (query($insert_query)) {
                    header('location: login.php');
                }
            } else {
                $error = 'passwords does not match';
            }
        } else {
            $error = 'please fill in all fields';
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="login-container">
        <div class="content">
            <form method="POST" class="form-login">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password">
                </div>
                <div class="form-group">
                    <label for="">Repeat Password</label>
                    <input type="password" name="repeat_password">
                </div>
                <div class="form-group">
                    <input type="hidden" name="action" value="registration">
                    <button class="btn">Registration</button>
                </div>
                <div>
                    <?php if ($error) { 
                            echo $error;
                          } ?>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>