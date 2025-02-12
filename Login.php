<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * from user WHERE Username=? AND Password=?";
    $row = $koneksi->execute_query($sql, [$username, $password]) -> fetch_assoc();


    if ($row){
        session_start();
        $_SESSION["Username"] = $row["Username"]; 
        header("Location:Profile.php");
    }
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style>
        /* style.css */
    body {
    font-family: Arial, sans-serif;
    background-color: #f3f4f6;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    }

    .container {
    background: #ffffff;
    padding: 20px 25px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 300px;
    }

    .container label {
    font-size: 14px;
    font-weight: bold;
    color: #333333;
    }

    .container input[type="text"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0 15px 0;
    border: 1px solid #cccccc;
    border-radius: 5px;
    font-size: 14px;
    }

    .container input[type="text"]:focus {
    border-color: #4a90e2;
    outline: none;
    }

    .container .login {
    text-align: center;
    }

    .container button {
    width: 100%;
    background: #4a90e2;
    color: #ffffff;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease;
    }

    .container button:hover {
    background: #357ab8;
    }

    .container a {
    display: block;
    text-align: center;
    margin-top: 15px;
    font-size: 14px;
    color: #4a90e2;
    text-decoration: none;
    }

    .container a:hover {
    text-decoration: underline;
    }
        </style>

    </head>
    <body>
        <form class="container" action="" method="post">
            <div class="name">
                <label for="username"> username </label> <br>
                <input type="text" name="username">
            </div>
            <div class="password">
                <label for="password"> password </label> <br>
                <input type="text" name="password">
            </div>
            <a href="Register.php"> Register akun </a>
            <div class="login">
                <button type="submit"> login </button>
            </div>
        </form>
    </body>
</html>