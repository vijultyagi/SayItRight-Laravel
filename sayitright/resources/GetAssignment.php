<?php
include "../DB/DbConnection.php";
$sql_query = "Select * from Assignment";
$result = mysqli_query($conn,$sql_query);
$emparray = array();
while($row =mysqli_fetch_assoc($result))
{
    $emparray[] = $row;
}
return json_encode($emparray);

?>