<?php
require_once("dbConfig.php");

$username = "";
$password = "";
$userlevel = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = trim($_POST["username"]);
    $password = md5(trim($_POST["password"]));
    $username = trim($_POST["userlevel"]);
    
    //find any available registered username
    $sql = "SELECT id FROM users WHERE username = '$username'";

    $result = mysqli_query($link, $sql);
    $rows = mysqli_num_rows($result);

    if ($rows == 0) {
        //no username in the database
        
        $sql_insert = "INSERT INTO users (username, userpassword, userlevel) VALUES ($username, $password, $userlevel)";

        $result_insert = mysqli_query($link, $sql_insert);

        header("Location: index.php");
    }else{
        echo "<script>alert('OOOOps! Username already taken. please use another username')</script>";
    }

    mysqli_close($link);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Register Form</title>
</head>
<body>

<div class="wrapper">
    <h2>Register page</h2>

    <form action="" method="post">
        <div class="form-group">
            <label for="username">username</label>
            <input class="form-control" type="text" name="username" id="username" />
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" name="password" id="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="userlevel">User Level</label>
            <input type="text" name="userlevel" id="userlevel" class="form-control">
        </div>

        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary">
            <input type="reset" value="Reset" class="btn btn-danger">
        </div>
        </form>
        <p>Login <a href="./login.php">here</a></p> 

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>