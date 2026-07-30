<?php 
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['password'];

    $qry=$conn->prepare("SELECT * FROM users WHERE username=?");
    $qry->bind_param("s",$username);
    $qry->execute();
    $result=$qry->get_result();
    if($result->num_rows>0){
        echo $result->num_rows;
        echo "Email already exists!";
        exit();
    }

    if ($password === $confirm_password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // $hashed_password=md5($password);
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashed_password);
        $stmt->execute();
        $stmt->close();
        echo "login successful!";
    } else {
        echo "Passwords do not match!";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

   

<style>



.box{
    background:lightblue;
    width: 500px;
    margin:auto;
    margin-top:40px;
    padding:50px;
    border-radius:10px;
    border:3px solid #ff66d9;
}

h1{
    font-size:30px;
}
button{
    font-size:2 0px;
}
p{
    font-size:30px;
}
label{
    display: block;
    font-size:30px;
    margin: 12px 0 6px;
}

input {
    width: 100%;
    padding: 8px 10px;
    margin-bottom: 12px;
    font-size: 18px;
    box-sizing: border-box;
}

a{
    font-size:30px;
    color:blue;
}

</style>
</head>

<body>

<div class="box">
    
    <h1>Login</h1>
    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
</div>
</body>
</html>