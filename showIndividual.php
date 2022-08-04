<?php
    

    
    session_start();
    if(!isset($_SESSION["id"])=="asdfghjkl")
    {
        header("location:index.php");
    }

    include 'db_connect.php';

    $sql = "select * from tblbook";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);

    $t="";
    if(isset($_POST["btnBrowse"]))
    {
        

        $selectDropdown = $_POST["dropdown"];

        $sql1 = "select * from tblbook where id='$selectDropdown'";
        $result1 = mysqli_query($conn,$sql1);

     $t= "<table border=1>
        <tr>
            <td>S.N</td>
            <td>Book Name</td>
            <td>Course</td>
            <td>Writer</td>
            <td>Edition</td>
            <td>Publisher</td>
            <td>Price</td>
        </tr>";
    $sno=1;    
    while($row= mysqli_fetch_assoc($result1))
    {
         $t=$t."<tr>
                    <td>".$sno."</td>
                    <td>$row[name]</td>
                    <td>$row[course]</td>
                    <td>$row[writer]</td>
                    <td>$row[edition]</td>
                    <td>$row[publisher]</td>
                    <td>$row[price]</td>
                </tr>"; 
         $sno++;       
    }
    $t=$t."</table>";  
    }
    

?>

<html>
    <head>
        <title>Show Individual Book Information</title>
    </head>
    <body>
        <h1 class="textCenter">Show Individual Book Information</h1>
        <form action="showIndividual.php" method="post">
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
        <h2>Book Information</h2>
        <div class="centerDiv">
            <form action="showIndividual.php" method="post">
                <?php echo $t ;?>
            </form>    
        </div>
    </body>
</html>
