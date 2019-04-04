<html>
<title>Search result</title>
<body>
<link rel="stylesheet" type="text/css" href="style.css"/>
<!-- connect database server -->

<?php
/* Set oracle user login and password info */
$dbuser = ""; /* your login */
$dbpass = ""; /* your oracle access password */
$db = "SSID";
$connect = OCILogon($dbuser, $dbpass, $db);
if (!$connect) {
echo "An error occurred connecting to the database";
exit;
} 
$array = oci_parse($connect, "SELECT make,name,price from phone where id = ".$id);
oci_execute($array);
while($row=oci_fetch_array($array))
{
$make = $row[0];
$name = $row[1];
$price = $row[2];
} 

?>









<!-- Search Result table -->
<table>
                  <tr >
                     <td style="border:2px solid black;">
					 <!-- Search Result picture -->
                        <a href="phone.html#<? echo strtolower($name); ?>"><img src="pic/<? echo $name;?>.jpg" alt="<? echo $name;?>" class="phoneimg" height="200" width="200"></a>
						<!-- Search Result list -->
                        <dl class="phonedl2">
                           <dt >Search Result:</dt>
						   <dd ><? echo $make." ".$name;?></dd>
                           <dd >Price: $<? echo $price; ?></dd>

                        </dl>
                  </td>
                  </tr>

</table>

</body>

</html>