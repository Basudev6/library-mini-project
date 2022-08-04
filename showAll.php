<?php
    
    session_start();
    if(!isset($_SESSION["id"])=="asdfghjkl")
    {
        header("location:index.php");
    }

    include 'db_connect.php';

    $sql= "select * from tblbook";
    $result=mysqli_query($conn,$sql);

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
    while($row= mysqli_fetch_assoc($result))
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

?>

<html>
    <head>
        <title>Show All Book Information</title>
    </head>
    <body>
        <form action="showall.php" method="post">
            <h1>Books Information</h1>
            <?php echo $t ;?>
        </form>
    </body>
</html>