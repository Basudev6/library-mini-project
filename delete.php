<?php
    

    
    session_start();
    if(!isset($_SESSION["id"])=="asdfghjkl")
    {
        header("location:index.php");
    }


    include 'db_connect.php';  // includes  database connectivity

    $sql = "select * from tblbook";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);

    $id=$name=$course=$writer=$edition=$publisher=$price="";

    if(isset($_POST["btnBrowse"]))
    {
        

        $selectDropdown = $_POST["dropdown"];


        $sql1 = "select * from tblbook where id='$selectDropdown'";
        $result1 = mysqli_query($conn,$sql1);
        
        $rowCount=mysqli_num_rows($result1);

        if($rowCount){

            $row = mysqli_fetch_assoc($result1);
        
            $id=$row["id"];
            $name=$row["name"];
            $course=$row["course"];
            $writer=$row["writer"];
            $edition=$row["edition"];
            $publisher=$row["publisher"];
            $price=$row["price"];

        }
        
    }

    if(isset($_POST["txtDelete"]))
    {
        $id=$_POST["txtId"];

        $sql2 = "delete from tblbook where id=$id";
        $result2 = mysqli_query($conn,$sql2);

        if($result2){
            echo "<script>alert('Data has been deleted successfully')</script>";
    
        }
        header("refresh:0");

    }


?>

<html>
    <head>
        <title>Delete Book Information</title>
    </head>
    <body>
        <form action="delete.php" method="post">
        <table>
            <tr>
                <td>Book Name</td>
                <td>
                    <select name="dropdown">
                        <option>Select book</option>
                        <?php
                            if($num>0)
                            {
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    echo "<option value=".$row["id"].">".$row["name"]."</option><br>";
                                }
                            }
                            
                            ?>
                    </select>
                </td>
                <td><button name="btnBrowse">Browse</button></td>
            </tr>
        </table>
        </form>
        <h1 class="textCenter">Delete Book Information</h1>
        <div class="centerDiv">
            <form action="delete.php" method="post">
                <table>
                    <tr>
                        <td>Id</td>
                        <td><input type="text" name="txtId" value="<?php echo $id ;?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="txtName" value="<?php echo $name ;?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Course</td>
                        <td><input type="text" name="txtCourse" value="<?php echo $course ;?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Writer</td>
                        <td><input type="text" name="txtWriter" value="<?php echo $writer ;?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Edition</td>
                        <td><input type="text" name="txtEdition" value="<?php echo $edition ;?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Publisher</td>
                        <td><input type="text" name="txtPublisher" value="<?php echo $publisher ;?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type="text" name="txtPrice" value="<?php echo $price ;?>" readonly></td>
                    </tr>
                    <tr>
                        <td><button class="btn" name="txtDelete">Delete</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
