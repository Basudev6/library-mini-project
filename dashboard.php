<?php

    session_start();
    if(!isset($_SESSION["id"])=="asdfghjkl")
    {
        header("location:index.php");
    }

    if(isset($_POST["showAll"]))
    {
        header("location:showAll.php");
    }
    if(isset($_POST["showIndividual"]))
    {
        header("location:showIndividual.php");
    }
    if(isset($_POST["insert"]))
    {
        header("location:insert.php");
    }
    if(isset($_POST["update"]))
    {
        header("location:update.php");
    }
    if(isset($_POST["delete"]))
    {
        header("location:delete.php");
    }

    if(isset($_POST["logout"]))
    {   
        session_unset();
        session_destroy();
        header("location:index.php");
    }
    

?>

<html>

<head>
    <title>Dashboard</title>
</head>
<link rel="stylesheet" href="style.css">

<body>
    <form action="dashboard.php" method="post">
        <h1 class="textCenter">Dashboard</h1>
        <div class="dashboard">
            <div class="row1">
                <button class="btndash" name="showAll">Show All Book</button>
                <button class="btndash" name="showIndividual">Show Individual Book</button>
                <button class="btndash" name="insert">Insert Book</button>
            </div>
            <div class="row2">
                <button class="btndash" name="update">Update Book</button>
                <button class="btndash" name="delete">Delete Book</button>
                <button class="btndash" name="logout">Logout</button>
            </div>
        </div>
    </form>
</body>

</html>