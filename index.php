<?php

    session_start();
    $user="";
    $pass="";

    if(isset($_POST["btnLogin"]))
    {
        $user=$_POST["txtUser"];
        $pass=$_POST["txtPass"];
        if($user=="admin" && $pass=="admin")
        {
            $_SESSION["id"]="asdfghjkl";
            header("location:dashboard.php");
        }
        else{
            echo "Incorrect username and password";
        }
    }

?>

<html>

<head>
    <title>Book Information System</title>
    <link rel="stylesheet" href="style.php">
</head>

<body>
    <h1 class="header1">Book Information System</h1>
    <div class="container">
        <div class="login">
            <form action="index.php" method="post">
                <table>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="txtUser" class="input" required></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="txtPass" class="input" required></td>
                    </tr> 
                </table>
                <button class="btn" name="btnLogin">Login</button>    
            </form>
        </div>
    </div>
</body>

</html>