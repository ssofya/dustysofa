<html>
<head>
<title>Use cluster statistics</title>
</head>
<body text=#336699>
<form action="result.php" method="get">
<form action="diagramma.php" method="get">
<h2>Internal use cluster</h2>
<tr>Select date:</tr>
<table width="50%" height="20" border="0" cellspacing="30">
  <tr>
    <td>from:</td> 
    <td ALIGN=RIGHT>Year:</td>
    <td><select name="year">
        <option value="year">

<?php


for($i=2006;$i<=2012;$i++)
{
        $year=date("Y");
	if($i==$year) printf("<option value=%02d selected>%02d</option>",$i,$i);
	else printf("<option value=%02d>%02d</option>",$i,$i);
} 
	
?>

    </select></td>
    <td ALIGN=RIGHT>Month:</td>
    <td><select name="month">
        <option value="month">

<?php
for($i=1;$i<=12;$i++)
{
        $month=date("m");
	if($i==$month) printf("<option value=%02d selected>%02d</option>",$i,$i);
	else printf("<option value=%02d>%02d</option>",$i,$i);

}
?>


    </select></td>
    <td ALIGN=RIGHT>Day:</td>
    <td><select name="day">
        <option value="day">

<?php
for ($i=1;$i<=31;$i++)
{
	if($i==1) printf("<option value=%02d selected>%02d</option>",$i,$i);
	else printf("<option value=%02d>%02d</option>",$i,$i);
} 

?>


    </select></td>

  </tr>
  
    <tr>
    <td>to:</td> 
    <td ALIGN=RIGHT>Year:</td>
    <td><select name="year_end">
        <option value="year">

<?php
for($i=2006;$i<=2012;$i++)
{
        $year=date("Y");
	if($i==$year) printf("<option value=%02d selected>%02d</option>",$i,$i);
	else printf("<option value=%02d>%02d</option>",$i,$i);
} 
	
?>

    </select></td>
    <td ALIGN=RIGHT>Month:</td>
    <td><select name="month_end">
        <option value="month">
    
<?php
for($i=1;$i<=12;$i++)
{
        $month=date("m");
	if($i==$month) printf("<option value=%02d selected>%02d</option>",$i,$i);
	else printf("<option value=%02d>%02d</option>",$i,$i);

}
?>


    </select></td>
    <td ALIGN=RIGHT>Day:</td>
    <td><select name="day_end">
        <option value="day">

<?php
for ($i=1;$i<=31;$i++)
{
	if($i==31) printf("<option value=%02d selected>%02d</option>",$i,$i);
	else printf("<option value=%02d>%02d</option>",$i,$i);
} 

?>

 </select></td>
 </tr>
 </table> 


<table width="45%" height="20" border="0" cellspacing="30">
     <tr>
    <td ALIGN=RIGHT>Department:</td>
    <td><select name="searchdepartament">
         <option value="departament">
     
<?php


@ $db=mysql_pconnect("localhost", "farmacnt", "farmacnt2007");

if (!$db)
  {
    echo "Error: Could not connect to database.";
    exit;
  }
   
mysql_select_db("farmacnt");
$query="select name_depart from DEPARTAMENT";
$result=mysql_query($query);
$num_results=mysql_num_rows($result);

for ($i=0; $i<$num_results; $i++)
  {
   $searchdepart=mysql_fetch_array($result);
   print("<option>$searchdepart[0]</option>");
   }
?>
 

</select></td>
</tr>
</table>

<table width="50%" height="20" border="0" cellspacing="30">
   <tr>
    <td ALIGN=CENTER><input type=submit  value="Search"></td>
  </tr>
</table>
</form>
<HR NOSHADE>
<head>

</head>
<body text=#336699>
<form action="grid_result.php" method="get">
<h2>External use cluster</h2>
<tr>Select date</tr>
<table width="50%" height="20" border="0" cellspacing="30">
<tr>
<td>from:</td>
<td ALIGN=RIGHT>Year:</td>
<td><select name="year">
<option value="year">

<?php
for($i=2006;$i<=2012;$i++)
   {
    $year=date("Y");
    if($i==$year) printf("<option value=%02d selected>%02d</option>",$i,$i);
    else printf("<option value=%02d>%02d</option>",$i,$i);
   }

?>

</select></td>
<td ALIGN=RIGHT>Month:</td>
<td><select name="month">
<option value="month">

<?php
for($i=1;$i<=12;$i++)
  {
   $month=date("m");
   if($i==$month) printf("<option value=%02d selected>%02d</option>",$i,$i);
   else printf("<option value=%02d>%02d</option>",$i,$i);
  }
?>

    </select></td>
    <td ALIGN=RIGHT>Day:</td>
    <td><select name="day">
    <option value="day">

<?php
for ($i=1;$i<=31;$i++)
  {
   if($i==1) printf("<option value=%02d selected>%02d</option>",$i,$i);
   else printf("<option value=%02d>%02d</option>",$i,$i);
  }

?>


    </select></td>

    </tr>

    <tr>
    <td>to:</td>
    <td ALIGN=RIGHT>Year:</td>
    <td><select name="year_end">
        <option value="year">

<?php
for($i=2006;$i<=2012;$i++)
   {
    $year=date("Y");
    if($i==$year) printf("<option value=%02d selected>%02d</option>",$i,$i);
    else printf("<option value=%02d>%02d</option>",$i,$i);
   }
?>

    </select></td>
    <td ALIGN=RIGHT>Month:</td>
    <td><select name="month_end">
    <option value="month">

<?php
for($i=1;$i<=12;$i++)
   {
    $month=date("m");
    if($i==$month) printf("<option value=%02d selected>%02d</option>",$i,$i);
    else printf("<option value=%02d>%02d</option>",$i,$i);
   }
?>


    </select></td>
    <td ALIGN=RIGHT>Day:</td>
    <td><select name="day_end">
    <option value="day">

<?php
for ($i=1;$i<=31;$i++)
    {
     if($i==31) printf("<option value=%02d selected>%02d</option>",$i,$i);
     else printf("<option value=%02d>%02d</option>",$i,$i);
   }
?>

    </select></td>
    </tr>
    </table>
<table width="50%" height="20" border="0" cellspacing="30">
     <tr>
         <td ALIGN=CENTER><input type=submit  value="Search"></td>
     </tr>
   </table>
   </form>
<HR NOSHADE>
<body text=#336699>
<form action="ratio.php" method="get">
<h2>External/internal cluster use ratio</h2>
<tr>Select date</tr>
<table width="50%" height="20" border="0" cellspacing="30">
<tr>
<td>from:</td>
<td ALIGN=RIGHT>Year:</td>
<td><select name="year">
<option value="year">

<?php
for($i=2006;$i<=2012;$i++)
   {
    $year=date("Y");
    if($i==$year) printf("<option value=%02d selected>%02d</option>",$i,$i);
    else printf("<option value=%02d>%02d</option>",$i,$i);
   }

?>

</select></td>
<td ALIGN=RIGHT>Month:</td>
<td><select name="month">
<option value="month">

<?php
for($i=1;$i<=12;$i++)
    {
     $month=date("m");
     if($i==$month) printf("<option value=%02d selected>%02d</option>",$i,$i);
     else printf("<option value=%02d>%02d</option>",$i,$i);
    }
?>

</select></td>
<td ALIGN=RIGHT>Day:</td>
<td><select name="day">
<option value="day">

<?php
for ($i=1;$i<=31;$i++)
    {
     if($i==1) printf("<option value=%02d selected>%02d</option>",$i,$i);
     else printf("<option value=%02d>%02d</option>",$i,$i);
    }

?>

</select></td>

   </tr>

   <tr>
   <td>to:</td>
   <td ALIGN=RIGHT>Year:</td>
   <td><select name="year_end">
       <option value="year">

<?php
for($i=2006;$i<=2012;$i++)
   {
    $year=date("Y");
    if($i==$year) printf("<option value=%02d selected>%02d</option>",$i,$i);
    else printf("<option value=%02d>%02d</option>",$i,$i);
   }
?>

</select></td>
<td ALIGN=RIGHT>Month:</td>
<td><select name="month_end">
<option value="month">

<?php
for($i=1;$i<=12;$i++)
   {
    $month=date("m");
    if($i==$month) printf("<option value=%02d selected>%02d</option>",$i,$i);
    else printf("<option value=%02d>%02d</option>",$i,$i);
   }
?>

</select></td>
<td ALIGN=RIGHT>Day:</td>
<td><select name="day_end">
<option value="day">

<?php
for ($i=1;$i<=31;$i++)
    {
     if($i==31) printf("<option value=%02d selected>%02d</option>",$i,$i);
     else printf("<option value=%02d>%02d</option>",$i,$i);
    }
?>
</select></td>
</tr>
    </table>
    <table width="50%" height="20" border="0" cellspacing="30">
    <tr>
    <td ALIGN=CENTER><input type=submit  value="Search"></td>
    </tr>
    </table>
    </form>


</body>
</html> 
