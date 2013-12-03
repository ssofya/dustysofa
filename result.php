<?php
session_start();
?>
<html>
<head>
<title>Department's info search results</title>
</head>
<body text=#336699 link=#6600FF vlink=#6600FF>
<form action="ihep.php" method="get">
<h1>Department's info search results</h1>
<TABLE ALIGN=LEFT>
<!--INPUT TYPE="button"VALUE="      Used_cput        " onClick="sort_auth()"> 

function sort_auth() 

{ hudlit.SortColumn="Used_cput"; 

hudlit.Reset() ;-->


<?php
require "config.php";

if($_GET['year']=="year" || $_GET['month']=="month" || $_GET['day']=="day" and $_GET['searchdepartament']=="departament")//nothing
  {
    echo "<p><strong>"."You have not entered search details. Please go back and try again.";
    exit;  
  }
 
if ($_GET['year']!="year" and $_GET['month']!="month" and $_GET['day']!="day" and $_GET['year_end']!="year" and $_GET['month_end']!="month" and $_GET['day_end']!="day" and $_GET['searchdepartament']=="departament")//po date
  {
@ $db=mysql_pconnect($db["host"], $db["user"], $db["password"]);

if (!$db)
  {
    echo "Error: Could not connect to database.";
    exit;
  }

$depart=$_GET['searchdepartament'];
$_SESSION['depart']=$depart;
$date=$_GET['year']."-".$_GET['month']."-".$_GET['day'];
$_SESSION['date']=$date;
$date_end=$_GET['year_end']."-".$_GET['month_end']."-".$_GET['day_end']; 
$_SESSION['date_end']=$date_end;
echo "<TD ALIGN=LEFT><B>"."From: {$_SESSION['date']}</B>";
echo "<P>"; 
echo "</TD>";
echo "<TR><TD ALIGN=LEFT><B>"."To: {$_SESSION['date_end']}</B>";
echo "<P>";
echo "</TD>";
echo "</TR>";
  
mysql_select_db("farmacnt");

if (! isset($_GET['key']))
  {
    $key=1;
    $_SESSION['key']=$key;
  }
else
   {
     $key=$_GET['key'];
     $_SESSION['key']=$key;
   }
     
if($_SESSION['key']==1)
  {
    $query="select otdel,sec_to_time(max(time_to_sec(used_cput))),max(used_mem),max(used_vmem),round(sum(time_to_sec(used_walltime))/3600) from IHEP_arhiv where date_end>='{$_SESSION['date']}' and date_end<='{$_SESSION['date_end']}' group by otdel order by {$_SESSION['key']}";
    $result=mysql_query($query);
    $num_results=mysql_num_rows($result);
    echo "<TR><TD ALIGN=LEFT><B>"."Number of rows found: $num_results</B>";
    echo "<P>";
    echo "</TD>";
    echo "</TR>";
  }
 elseif($_SESSION['key']==2)
   {
    $query="select otdel,sec_to_time(max(time_to_sec(used_cput))),max(used_mem),max(used_vmem),round(sum(time_to_sec(used_walltime))/3600) from IHEP_arhiv where date_end>='{$_SESSION['date']}' and date_end<='{$_SESSION['date_end']}' group by otdel order by max(time_to_sec(used_cput)) desc";
    $result=mysql_query($query);
    $num_results=mysql_num_rows($result);
    echo "<TR><TD ALIGN=LEFT><B>"."Number of rows found: $num_results</B>";
    echo "<P>";
    echo "</TD>";
    echo "</TR>";
   }
 else
  {
   $query="select otdel,sec_to_time(max(time_to_sec(used_cput))),max(used_mem),max(used_vmem),round(sum(time_to_sec(used_walltime))/3600) from IHEP_arhiv where date_end>='{$_SESSION['date']}' and date_end<='{$_SESSION['date_end']}' group by otdel order by {$_SESSION['key']} desc";
    $result=mysql_query($query);
    $num_results=mysql_num_rows($result);
    echo "<TR><TD ALIGN=LEFT><B>"."Number of rows found: $num_results</B>";
    echo "<P>";
    echo "</TD>";
    echo "</TR>";
  }  



//$query1="select account from EMPLOYEES";
//$result1=mysql_query($query1);
//$num_results1=mysql_num_rows($result1);
 //echo "<p><strong>"."Number of rows found: $num_results1";


//echo "<p><strong>"."<INPUT TYPE=button VALUE=Used_cput onClick=sort_auth()>";

echo "<TR><TD VALIGN=TOP>";
//echo "<TABLE BORDER=0 CELLPADING=0 CELLSPACING-0>";

echo "<p><strong>"."<TABLE BORDER ALIGN=LEFT><TR bgcolor=#C0C0C0><TD ALIGN=CENTER><a href=\"result.php?key=1&year={$_GET['year']}&month={$_GET['month']}&day={$_GET['day']}&year_end={$_GET['year_end']}&month_end={$_GET['month_end']}&day_end={$_GET['day_end']}&searchdepartament={$_GET['searchdepartament']}\">Department</a></TD><TD ALIGN=CENTER><a href=\"result.php?key=2&year={$_GET['year']}&month={$_GET['month']}&day={$_GET['day']}&year_end={$_GET['year_end']}&month_end={$_GET['month_end']}&day_end={$_GET['day_end']}&searchdepartament={$_GET['searchdepartament']}\">Used cput</a></TD><TD ALIGN=CENTER><a href=\"result.php?key=3&year={$_GET['year']}&month={$_GET['month']}&day={$_GET['day']}&year_end={$_GET['year_end']}&month_end={$_GET['month_end']}&day_end={$_GET['day_end']}&searchdepartament={$_GET['searchdepartament']}\">Used mem</a></TD><TD ALIGN=CENTER><a href=\"result.php?key=4&year={$_GET['year']}&month={$_GET['month']}&day={$_GET['day']}&year_end={$_GET['year_end']}&month_end={$_GET['month_end']}&day_end={$_GET['day_end']}&searchdepartament={$_GET['searchdepartament']}\">Used vmem</a></TD><TD ALIGN=CENTER><a href=\"result.php?key=5&year={$_GET['year']}&month={$_GET['month']}&day={$_GET['day']}&year_end={$_GET['year_end']}&month_end={$_GET['month_end']}&day_end={$_GET['day_end']}&searchdepartament={$_GET['searchdepartament']}\">Used walltime</a></TD></TR>";


 //$m=0; 
 //$n=0;
 //for ($i=0; $i <$num_results; $i++)
 //{
 // $row=mysql_fetch_array($result);
 // $account_grid[$m]=$row['account_grid'];
 // $m=$m+1;
 //}
//echo implode (',',$account_grid);

//for ($j=1; $j <=$num_results1; $j++)
 //{
 // $row1=mysql_fetch_array($result1);
 // $account[$n]=$row1['account'];
 // $n=$n+1;
 // }
 //echo "<p><strong>";
 //echo implode (',',$account);

 //$query2="select account_grid,experement_name,round(sum(time_to_sec(used_cput))/3600),sum(used_mem),sum(used_vmem),round(sum(time_to_sec(used_walltime))/3600) from GRID_arhiv where date_end>='$date' and date_end<='$date_end' group by account_grid";
 //$result2=mysql_query($query2);
 //$num_results2=mysql_num_rows($result2);
 //echo "<p><strong>"."Number of rows found: $num_results2";


for ($i=0; $i <$num_results; $i++)
  {
    $row=mysql_fetch_array($result);
    //    for ($j=0; $j <$num_results1; $j++)
    //{   
    //$row1=mysql_fetch_array($result1);
	//	echo "<p><strong>"."Number of rows found: $account_grid[$i]";
        //     	echo "<p><strong>"."Number of rows found: $account[$j]";
	//if($account_grid[$i]==$account[$j])
    // {	
	    echo "<TR>";
	    echo "<TD ALIGN=CENTER><a href=\"ihep.php?smth={$row['otdel']}&key={$_SESSION['key']}&year={$_GET['year']}&month={$_GET['month']}&day={$_GET['day']}&year_end={$_GET['year_end']}&month_end={$_GET['month_end']}&day_end={$_GET['day_end']}&searchdepartament={$_GET['searchdepartament']}\">{$row['otdel']}</a></TD><TD ALIGN=CENTER>{$row['sec_to_time(max(time_to_sec(used_cput)))']}</TD><TD ALIGN=CENTER>{$row['max(used_mem)']}</TD><TD ALIGN=CENTER>{$row['max(used_vmem)']}</TD><TD ALIGN=CENTER>{$row['round(sum(time_to_sec(used_walltime))/3600)']}</TD>";
	    echo "</TR>";
	    //continue 2;
	    //}
	    //elseif($j==$num_results1-1 and $account_grid[$i]!=$account[$j])	
	    //{
	    //echo "<TR>";
	    // echo "<TD ALIGN=CENTER><a href=http://localhost/ihep.php?smth={$row['account_grid']}>{$account_grid[$i]}</a></TD><TD ALIGN=CENTER>{$row['experement_name']}</TD><TD ALIGN=CENTER>{$row['round(sum(time_to_sec(used_cput))/3600)']}</TD><TD ALIGN=CENTER>{$row['sum(used_mem)']}</TD><TD ALIGN=CENTER>{$row['sum(used_vmem)']}</TD><TD ALIGN=CENTER>{$row['round(sum(time_to_sec(used_walltime))/3600)']}</TD><TD ALIGN=CENTER>GRID</TD>";
	    // echo "</TR>";
	    //continue 2;
	    //}
	    //}

	//echo "<p><strong>"."To: {$_SESSION['used_walltime'][0]}";
  }
 //echo "<p><strong>"."To: {$_SESSION['used_walltime']}";
 
 echo "</TABLE BORDER>";                                                                                                                       
echo "</TABLE BORDER>";
echo "<BR>";                                                                                                                                               echo "<p align=right><a href=\"index.php\">Start</a><BR CLEAR=LEFT>";
echo "<P>";
echo "<TD>";
echo "<TD WIDTH=150></TD>";
echo "<TD VALIGN=TOP>";
echo "<TABLE BORDER=0>";
//echo "<img src=diagramma.php>";
echo "</TABLE BORDER>";
echo "</TD>";


//echo "<img src=diagramma_cput.php>";

unset($_SESSION['array1']);
unset($_SESSION['array2']);
unset($_SESSION['array_cput']);
unset($_SESSION['array_ot']);
unset($_SESSION['array_mem']);
unset($_SESSION['array_otd']);
unset($_SESSION['array_vmem']);
unset($_SESSION['array_otdel']);

$query1="select otdel, round(sum(time_to_sec(used_walltime))/3600) from IHEP_arhiv where date_end>='{$_SESSION['date']}' and date_end<='{$_SESSION['date_end']}' group by otdel";

$result1=mysql_query($query1);
$num_results1=mysql_num_rows($result1);
//echo "<p><strong>"."$num_results1";
echo "<p><strong>";

$array1=array();
$array2=array();
$m=0;
$n=0;
$j=0;
for ($i=0; $i <$num_results1; $i++)
  {
   $row1=mysql_fetch_array($result1);
//   echo "<p><strong>"."Massiv {$row1['round(sum(time_to_sec(used_walltime))/3600)']}";
   $array1[$m]=$row1['round(sum(time_to_sec(used_walltime))/3600)'];
   $sum_wall=$array1[$m]+$sum_wall;
   $array2[$n]=$row1['otdel'];
   $_SESSION['array1'][$j]=$array1[$m];
  // echo "<p><strong>"."Massiv {$_SESSION['array1'][$j]}";
   $_SESSION['array2'][$i]=$array2[$n];
   //echo "<p><strong>"."Massiv {$_SESSION['array2'][$i]}";
   $m=$m+1;
   $n=$n+1;
   $j=$j+1;
   //echo "$array1";
  }

$_SESSION['num_results1']=$num_results1;
//echo "<p><strong>"."Number of rows found1: {$_SESSION['num_results1']}";
echo "<p><strong>";
//echo "$row1[0]";
echo "<p><strong>";
//echo implode(',',($_SESSION['array1']));
echo "<p><strong>";
//echo implode(',',($_SESSION['array2']));
//$data=$_SESSION['array1'];
echo "<p><strong>";
//echo "$data[0]";
//print_r ($array1);
echo "<p><strong>";
//$_SESSION['array1']=$array1;
//print_r ($_SESSION['array1']);

$query2="select otdel, sec_to_time(max(time_to_sec(used_cput))) from IHEP_arhiv where date_end>='{$_SESSION['date']}' and date_end<='{$_SESSION['date_end']}' group by otdel";
$result2=mysql_query($query2);
$num_results2=mysql_num_rows($result2);


$j=0;
for ($i=0; $i <$num_results2; $i++)
  {
   $row2=mysql_fetch_array($result2);
   $array_cput[$i]=$row2['sec_to_time(max(time_to_sec(used_cput)))'];
   $sum_cput=$array_cput1[$i]+$sum_cput;
   $array_ot[$i]=$row2['otdel'];
   $_SESSION['array_cput'][$j]=$array_cput[$i];
   $_SESSION['array_ot'][$i]=$array_ot[$i];
   $j=$j+1;
  }

$_SESSION['num_results2']=$num_results2;


$query3="select otdel, max(used_mem) from IHEP_arhiv where date_end>='{$_SESSION['date']}' and date_end<='{$_SESSION['date_end']}' group by otdel";
$result3=mysql_query($query3);
$num_results3=mysql_num_rows($result3);


$j=0;
for ($i=0; $i <$num_results3; $i++)
  {
   $row2=mysql_fetch_array($result3);
   $array_mem[$i]=$row2['max(used_mem)'];
   $sum_mem=$array_mem[$i]+$sum_mem;
   $array_otd[$i]=$row2['otdel'];
   $_SESSION['array_mem'][$j]=$array_mem[$i];
   $_SESSION['array_otd'][$i]=$array_otd[$i];
   $j=$j+1;
  }

$_SESSION['num_results3']=$num_results3;


$query4="select otdel, max(used_vmem) from IHEP_arhiv where date_end>='{$_SESSION['date']}' and date_end<='{$_SESSION['date_end']}' group by otdel";
$result4=mysql_query($query4);
$num_results4=mysql_num_rows($result4);


$j=0;
for ($i=0; $i <$num_results3; $i++)
  {
   $row2=mysql_fetch_array($result4);
   $array_vmem[$i]=$row2['max(used_vmem)'];
   $sum_vmem=$array_vmem[$i]+$sum_vmem;
   $array_otdel[$i]=$row2['otdel'];
   $_SESSION['array_vmem'][$j]=$array_vmem[$i];
   $_SESSION['array_otdel'][$i]=$array_otdel[$i];
   $j=$j+1;
  }

$_SESSION['num_results4']=$num_results4;

echo "</TABLE BORDER>";
echo "<TABLE ALIGN=CENTER WIDTH=70% BORDER=0 CELLPADDING=0 CELLSPACING=0>";
echo "<CAPTION><H2><CENTER>Use cluster on the departments...</CENTER><H2>";
echo "<TR><TD VALIGN=TOP>";
echo "<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0>";
if ($sum_cput==0)
     {
	echo "<TR><TD><img src=graph_cpu.php></TD></TR>";
     }	
else{
       echo "<TR><TD><img src=diagramma_cput.php></TD></TR>";
    }	
if ($sum_vmem==0)
     {
        echo "<TR><TD><img src=graph_vmem.php></TD></TR>";
     }
else{
       echo "<TR><TD><img src=diagramma_vmem.php></TD></TR>";
    }
echo "</TABLE BORDER>";

echo "<P>";
echo "<TD>";
echo "<TD WIDTH=150></TD>";
echo "<TD VALIGN=TOP>";
echo "<TABLE BORDER=0>";
if ($sum_mem==0)
     {
       echo "<TR><TD><img src=graph_mem.php></TD></TR>";
     }
else{
     echo "<TR><TD><img src=diagramma_mem.php></TD></TR>";
		         }
if ($sum_wall<1800)
   {
     echo "<TR><TD><img src=graph_wall.php></TD></TR>";
   }
else{
      echo "<TR><TD><img src=diagramma_walltime.php></TD></TR>";
     }
echo "</TABLE BORDER>";
echo "</TD>";
}

if ($_GET['searchdepartament']!="departament" and $_GET['year']!="year" and $_GET['month']!="month" and $_GET['day']!="day" and $_GET['year_end']!="year" and $_GET['month_end']!="month" and $_GET['day_end']!="day")//po otdely i date
  {
@ $db=mysql_pconnect($db["host"], $db["user"], $db["password"]);

if (!$db)
  {
    echo "Error: Could not connect to database.";
    exit;
  }

 $date=$_GET['year']."-".$_GET['month']."-".$_GET['day'];
 $_SESSION['date']=$date;
 $date_end=$_GET['year_end']."-".$_GET['month_end']."-".$_GET['day_end'];
 $_SESSION['date_end']=$date_end;
 $depart=$_GET['searchdepartament'];
 echo "<TD ALIGN=LEFT><B>"."From:</B> {$_SESSION['date']}";
 echo "<P>";
 echo "</TD>";
 echo "<TR><TD ALIGN=LEFT><B>"."To:</B> {$_SESSION['date_end']}";
 echo "<P>";
 echo "</TD>";
 echo "<TR><TD ALIGN=LEFT><B>"."Department:</B> $depart";
 echo "<P>";
 echo "</TD>";
 echo "</TR>";

   
mysql_select_db("farmacnt");

$query="select otdel,sec_to_time(max(time_to_sec(used_cput))),max(used_mem),max(used_vmem),round(sum(time_to_sec(used_walltime))/3600) from IHEP_arhiv where otdel='$depart' and date_end>='{$_SESSION['date']}' and date_end<='{$_SESSION['date_end']}' group by otdel";
$result=mysql_query($query);
$num_results=mysql_num_rows($result);
echo "<TR><TD ALIGN=LEFT><B>"."Number of rows found:</B> $num_results";
echo "<P>";
echo "</TD>";
echo "</TR>";


echo "<TR><TD VALIGN=TOP>";
//echo "<TABLE BORDER=0 CELLPADING=0 CELLSPACING-0>";

echo "<p><strong>"."<TABLE BORDER ALIGN=LEFT><TR bgcolor=#C0C0C0><TD ALIGN=CENTER>Department</TD><TD ALIGN=CENTER>Used cput</TD><TD ALIGN=CENTER>Used mem</TD><TD ALIGN=CENTER>Used vmem</TD><TD ALIGN=CENTER>Used walltime</TD></TR>";
for ($i=0; $i <$num_results; $i++)
  {
    $row=mysql_fetch_array($result);
    echo "<TR>";
    echo "<TD ALIGN=CENTER><a href=\"ihep.php?smth={$row['otdel']}&year={$_GET['year']}&month={$_GET['month']}&day={$_GET['day']}&year_end={$_GET['year_end']}&month_end={$_GET['month_end']}&day_end={$_GET['day_end']}\">{$row['otdel']}</a></TD><TD ALIGN=CENTER>{$row['sec_to_time(max(time_to_sec(used_cput)))']}</TD><TD ALIGN=CENTER>{$row['max(used_mem)']}</TD><TD ALIGN=CENTER>{$row['max(used_vmem)']}</TD><TD ALIGN=CENTER>{$row['round(sum(time_to_sec(used_walltime))/3600)']}</TD>";
    echo "</TR>";
  }
 echo "</TABLE BORDER>";
 }
echo "</TABLE BORDER>";

//if ($_POST['year']!="year" and $_POST['month']!="month" and $_POST['day']!="day" and $_POST['year_end']!="year" and $_POST['month_end']!="month_end" and $_POST['day_end']!="day" and $_POST['searchdepartament']=="departament" )//po date i account
// {
//@ $db=mysql_pconnect($db["host"], $db["user"], $db["password"]);

//if (!$db)
// {
//   echo "Error: Could not connect to database.";
//  exit;
// }

//$account=$_POST['searchaccount'];
 //echo "<p><strong>".$account;
// $date=$_POST['month']."/".$_POST['day']."/".$_POST['year'];
//echo "<p><strong>".$date;
//$date_end=$_POST['month_end']."/".$_POST['day_end']."/".$_POST['year_end'];
// echo "<p><strong>".$date_end;

  
//mysql_select_db($db["test"]);
//$query="select account_grid,experement_name,round(sum(time_to_sec(used_cput))/3600),sum(used_mem),sum(used_vmem),round(sum(time_to_sec(used_walltime))/3600) from GRID_arhiv where account_grid='$account' and date_end>='$date' and date_end<='$date_end' group by account_grid";
//$result=mysql_query($query);
//$num_results=mysql_num_rows($result);
//echo "<p><strong>"."Number of rows found: $num_results";

//$query1="select account from EMPLOYEES";
//$result1=mysql_query($query1);
//$num_results1=mysql_num_rows($result1);
 //echo "<p><strong>"."Number of rows found: $num_results1";

 //echo "<p><strong>"."<TABLE BORDER><TR bgcolor=#C0C0C0><TD ALIGN=CENTER>Account</TD><TD ALIGN=CENTER>Experement name</TD><TD ALIGN=CENTER>Used cput</TD><TD ALIGN=CENTER>Used mem</TD><TD ALIGN=CENTER>Used vmem</TD><TD ALIGN=CENTER>Used walltime</TD><TD ALIGN=CENTER>User</TD></TR>";

//$m=0;
//$n=0;

//for ($i=0; $i <$num_results; $i++)
// {
//  $row=mysql_fetch_array($result);
//  $account_grid[$m]=$row['account_grid'];
//  $m=$m+1;
// }
//echo implode (',',$account_grid);

//or ($j=1; $j <=$num_results1; $j++)
   // {
   // $row1=mysql_fetch_array($result1);
   //$account_ihep[$n]=$row1['account'];
   //$n=$n+1;
   //}
   //echo "<p><strong>";
 //echo implode (',',$account_ihep);


   //$account=$_POST['searchaccount'];
   //$query2="select account_grid,experement_name,round(sum(time_to_sec(used_cput))/3600),sum(used_mem),sum(used_vmem),round(sum(time_to_sec(used_walltime))/3600) from GRID_arhiv where account_grid='$account' and date_end>='$date' and date_end<='$date_end' group by account_grid";
   //$result2=mysql_query($query2);
   //$num_results2=mysql_num_rows($result2);
   //echo "<p><strong>"."Number of rows found: $num_results2";
   //echo "<p><strong>"."Account: $account";  

   //for ($i=0; $i <$num_results2; $i++)
   //  {
   //    $row=mysql_fetch_array($result2);
   //    for ($j=0; $j <$num_results1; $j++)
   //      {   
   //	$row1=mysql_fetch_array($result1);
	//	echo "<p><strong>"."Number of rows found: $account_grid[$i]";
	//     	echo "<p><strong>"."Number of rows found: $account_ihep[$j]";
	//if($account_grid[$i]==$account_ihep[$j])
   //{	
   //    echo "<TR>";
   //    echo "<TD ALIGN=CENTER><a href=http://localhost/ihep.php?smth={$row['account_grid']}>{$account_grid[$i]}</a></TD><TD ALIGN=CENTER>{$row['experement_name']}</TD><TD ALIGN=CENTER>{$row['round(sum(time_to_sec(used_cput))/3600)']}</TD><TD ALIGN=CENTER>{$row['sum(used_mem)']}</TD><TD ALIGN=CENTER>{$row['sum(used_vmem)']}</TD><TD ALIGN=CENTER>{$row['round(sum(time_to_sec(used_walltime))/3600)']}</TD><TD ALIGN=CENTER>IHEP</TD>";
   //    echo "</TR>";
   //    continue 2;
   //  }
   //elseif($j==$num_results1-1 and $account_grid[$i]!=$account_ihep[$j])	
   //  {
   //    echo "<TR>";
   //    echo "<TD ALIGN=CENTER><a href=http://localhost/ihep.php?smth={$row['account_grid']}>{$account_grid[$i]}</a></TD><TD ALIGN=CENTER>{$row['experement_name']}</TD><TD ALIGN=CENTER>{$row['round(sum(time_to_sec(used_cput))/3600)']}</TD><TD ALIGN=CENTER>{$row['sum(used_mem)']}</TD><TD ALIGN=CENTER>{$row['sum(used_vmem)']}</TD><TD ALIGN=CENTER>{$row['round(sum(time_to_sec(used_walltime))/3600)']}</TD><TD ALIGN=CENTER>GRID</TD>";
   //    echo "</TR>";
   //    continue 2;
   //  }
   // }
   //  }


   // echo "</TABLE BORDER>";
   //


//for ($i=0; $i <$num_results; $i++)
//  {
//    $row=mysql_fetch_array($result);
//    echo "<TR>";
//    echo "<TD ALIGN=CENTER><a href=http://localhost/ihep.php?smth={$row['account_grid']}>{$row['account_grid']}</a></TD><TD ALIGN=CENTER>{$row['experement_name']}</TD><TD ALIGN=CENTER>{$row['round(sum(time_to_sec(used_cput))/3600)']}</TD><TD ALIGN=CENTER>{$row['sum(used_mem)']}</TD><TD ALIGN=CENTER>{$row['sum(used_vmem)']}</TD><TD ALIGN=CENTER>{$row['round(sum(time_to_sec(used_walltime))/3600)']}</TD>";
//    echo "</TR>";
//  }
// echo "</TABLE BORDER>";
// }
//echo "<a href=\"diagramma.php\">График</a>";

?>

</body>
</html>
