<form action="drop.php" method="post" name="group">
<table align="center">
<tr><td width="200px">user:</td><td>
<select name="leader">

<?php
 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "loanmanage";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


 $sql="select employee_id from employee";
 $r=$conn->query($sql);
 
   if($r->num_rows > 0)
 {
    
    while($row = $r->fetch_assoc())
    {
        $id=$row['employee_id'];
        echo "<option value='$id'>$id</option>";
    }
 }
 
 
?>
</select></td></tr>

<tr><td width="200px"></td><td><input name="add" type="submit" value="Add"/></td></tr>

</table>
</form>