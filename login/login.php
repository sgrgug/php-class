<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>
<body>

    <?php

        //db connection
        $db_name = "mysql:host=localhost;dbname=websoft";
        $conn = new PDO($db_name, "root", "");

    ?>

    <?php
    
        if(isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
            $sql->bindParam(':username', $username);
            $sql->bindParam(':password', md5($password));
            $sql->execute();

            $user = $sql->fetch(PDO::FETCH_ASSOC);

            // if($username != $user['user'])
            // {
            //     echo "username is not match";
            // } elseif($password != $user['password']) {
            //     echo "password is not match";
            // } else {
            //     echo "login success";
            // }


            if($user) {
                echo "Login success";
                header("Location: home.php");
            } else {
                echo "Login failed";
            }
        }
    
    ?>

    <div class="container">
        <form class="row g-3 needs-validation" novalidate method="POST">
          <div class="col-12">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" required>
          </div>
          <div class="col-12">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
          </div>
          <div class="col-12">
            <button class="btn btn-primary" type="submit" name="login">login</button>
          </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>