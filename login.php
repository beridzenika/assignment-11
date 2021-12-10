<?php
    include 'helper/DB_connection.php';

    $error = '';

    if (isset($_POST['action']) && $_POST['action'] == 'login') {
        $username = isset($_POST['username']) && $_POST['username'] != '' ? $_POST['username'] : null;
        $password = isset($_POST['password']) && $_POST['password'] != '' ? $_POST['password'] : null;
    
        if ($username && $password) {
            $password = md5($password);
            $select_query = 'SELECT * FROM users WHERE username = "'.$username.'" AND password = "'.$password.'"';
            $user = getFirst($select_query);
            
            if($user) {
                session_start();
                $_SESSION['is_admin'] = true;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['username'];
                header('location: index.php');
            } else {
                $error = 'Invalid User';
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
            <form action="" class="form-login" method="POST">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password">
                </div>
                <div class="form-group">
                    <input type="hidden" name="action" value="login">
                    <button class="btn">Login</button>
                    <a class="registration-btn" href="registration.php">Registration</a>
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