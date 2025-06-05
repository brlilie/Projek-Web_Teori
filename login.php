<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
            background: linear-gradient(135deg, #312A77, #822EA4, #D332D0, #E96AE7, #796CFF);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        h2 {
            text-align: center;
            color: #312A77;
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin: 7px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background: #312A77;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: #4a3da1;
        }
        p {
            text-align: center;
            margin-top: 10px;
        }
        a {
            color: #822EA4;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Masuk</h2>
        <form method="POST" action="proses_login.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Masuk</button>
        </form>
        <p>Belum memiliki akun? <a href="register.php">Daftar</a></p>
    </div>
</body>
</html>
