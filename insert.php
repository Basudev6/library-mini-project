<?php
    session_start();
    if(!isset($_SESSION["id"])=="asdfghjkl")
    {
        header("location:index.php");
    }

    $name=$course=$writer=$edition=$publisher=$price="";

    if(isset($_POST["btnSave"]))
    {   
        $name=$_POST["txtName"];
        $course=$_POST["txtCourse"];
        $writer=$_POST["txtWriter"];
        $edition=$_POST["txtEdition"];
        $publisher=$_POST["txtPublisher"];
        $price=$_POST["txtPrice"];


        include 'db_connect.php';
        
        if(!$conn){
            die("Error occured!");
        }

        $sql="insert into tblbook(name,course,writer,edition,publisher,price) values('$name','$course','$writer','$edition','$publisher','$price')";

        $result = mysqli_query($conn,$sql);

        if($result){
            echo "<script>alert('Data has been inserted successfully')</script>";
        }
        else{
            echo "<script>alert('Data not inserted')</script>";
        }

    }
    
?>

<html>
    <head>
        <title>Insert Book Information</title>
    </head>
    <body>
        <h1 class="textCenter">Insert Book Information</h1>
        <div class="centerDiv">
            <form action="insert.php" method="post">
                <table>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="txtName" required></td>
                    </tr>
                    <tr>
                        <td>Course</td>
                        <td><input type="text" name="txtCourse" required></td>
                    </tr>
                    <tr>
                        <td>Writer</td>
                        <td><input type="text" name="txtWriter" required></td>
                    </tr>
                    <tr>
                        <td>Edition</td>
                        <td><input type="text" name="txtEdition" required></td>
                    </tr>
                    <tr>
                        <td>Publisher</td>
                        <td><input type="text" name="txtPublisher" required></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type="text" name="txtPrice" required></td>
                    </tr>
                    <tr>
                        <td><button class="btn" name="btnSave">Save</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>