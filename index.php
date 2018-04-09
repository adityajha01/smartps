
<html>
<head>
    <title>Smart Parking System</title>
</head>
<body bgcolor='skyblue' >
<h1 align="center" >SMART PARKING SYSTEM</h1>

<?php


$db="parking";
$connection=mysqli_connect("park-prj.cd8ikscfhncx.us-east-2.rds.amazonaws.com","aditya","adityajha",$db);
if($connection)
{
    $sql="SELECT * FROM park1 where slot='slot'";
    $results= mysqli_query($connection, $sql);
    $row=mysqli_fetch_array($results);
    echo "<table border='5' width='1200' height='200' id= results align='center'>
<tr style='background-color:lightgrey;'>
<th>SLOT1</th>
<th>SLOT2</th>
<th>SLOT3</th>
<th>SLOT4</th>
<th>SLOT5</th>
<th>SLOT6</th>
<th>SLOT7</th>
<th>SLOT8</th>

</tr>";

  echo "<tr>"; 
    
    if($row[1]==1 )
    {
       echo "<td style='background-color:#F00;' align='center'>Reserved</td>";
    }
    else if($row[1]==2 )
    {
       echo "<td style='background-color:#F00;' align='center'>Reserved</td>";
    }
    else
    {
	echo "<td style='background-color:#0F0;' align='center'>Available</td>";
    }

    if($row[2]==1)
    {
       echo "<td style='background-color:#F00;' align='center'>Reserved</td>";
    }
    else
    {
	echo "<td style='background-color:#0F0;' align='center'>Available</td>";
    }
   if($row[3]==1)
    {
       echo "<td style='background-color:#F00;' align='center'>Reserved</td>";
    }
    else
    {
	echo "<td style='background-color:#0F0;' align='center'>Available</td>";
    }
    if($row[4]==1)
    {
       echo "<td style='background-color:#F00;' align='center'>Reserved</td>";
    }
    else
    {
	echo "<td style='background-color:#0F0;' align='center'>Available</td>";
    }
   if($row[5]==1)
    {
       echo "<td style='background-color:#F00;' align='center'>Reserved</td>";
    }
    else
    {
	echo "<td style='background-color:#0F0;' align='center'>Available</td>";
    }
   if($row[6]==1)
    {
       echo "<td style='background-color:#F00;' align='center'>Reserved</td>";
    }
    else
    {
	echo "<td style='background-color:#0F0;' align='center'> Available </td>";
    }
   if($row[7]==1)
    {
       echo "<td style='background-color:#F00;' align='center'> Reserved </td>";
    }
    else
    {
	echo "<td style='background-color:#0F0;' align='center'> Available </td>";
    }
   if($row[8]==1)
    {
       echo "<td style='background-color:#F00;' align='center'> Reserved </td>";
    }
    else
    {
	echo "<td style='background-color:#0F0;' align='center'> Available </td>";
    }

   echo "</tr>";
   echo "</table>";
   mysqli_close($connection);
}
else{

   echo "connection failed";

}

  

?>
<?php
if(isset($_POST['reserv']))
{
$x=$_POST['sno'];
if($x >0 && $x<=8)
{
$db="parking";
$connection=mysqli_connect("park-prj.cd8ikscfhncx.us-east-2.rds.amazonaws.com","aditya","adityajha",$db);
$sql="update park1 set slot$x=1 where slot='slot'";
$results=mysqli_query($connection,$sql);
$cname=$_POST['pname'];
$cno=$_POST['carno'];
$ctno=$_POST['ctno'];
$eid=$_POST['eid'];
$st=$_POST['stime'];
$et=$_POST['etime'];
if($cno!="")
{

    $sq1="insert into custinfo values('$cname','$cno','$ctno','$eid','$st','$et')";
    $result1=mysqli_query($connection,$sq1);
}
mysqli_close($connection);
}

}

?>
<?php
if(isset($_POST['cancel']))
{
$x=$_POST['sno1'];


if($x >0 && $x<=8)
{
$db="parking";
$connection=mysqli_connect("park-prj.cd8ikscfhncx.us-east-2.rds.amazonaws.com","aditya","adityajha",$db);
$sql="update park1 set slot$x=0 where slot='slot'";
$results=mysqli_query($connection,$sql);
mysqli_close($connection);
}


}

?>
<form  method="post"><br>

<font size="4" style="bold" >
<center><b>****************************************************************Reservation***********************************************************************</b></center><br>
<center>Name : <input type="text" name="pname" maxlength="20" size=12  > 
Car_no     : <input type="text" name="carno" maxlength="12" size=12 > </center><br>
<center>contact no : <input type="text" name="ctno" maxlength="10" size=11 > 
email_id  :<input type="text" name="eid" maxlength="30" size=15 ></center><br>  
<center>Reservation starting time: <input type="datetime-local" name="stime"> Reservation end time: <input type="datetime-local" name="etime" ></center><br>
<center>slot no.:  <input type="text" name="sno" maxlength="1" size=2 ></center><br>
<center><input type="submit" value="Reserve" name="reserv" style="height:20px;color:green">    
<input type="submit" value="Make Payment" name="pay"style="height:20px;color:green"> </center><br>
<center><b>****************************************************************Cancellation**********************************************************************</b></center><br>
<center>slot no.: 
<input type="text" name="sno1" maxlength="1" size=2 ></center><br>
<center><input type="submit" value="Cancel " name="cancel" style="height:20px;color:red"></center><br>
<center><b>**************************************************************************************************************************************************************</b></center>
<center><input type='submit' name='submitAdd' value='Refresh' onclick='window.location.reload(true);' ></center>
</font>
</form>
</body>
</html>

