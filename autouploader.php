<?php

##CSV to MYSQL made by Paul Mcilwaine
##Please feel free to distribute and modify this program, all i ask is that you notify me of 
##updated code.

error_reporting(E_ALL);

$config['host'] = 'localhost'; //host name
$config['user'] = 'insitefu_76217';//database username
$config['pass'] = 'D@4tym3!';//database password

mysql_connect($config['host'],$config['user'],$config['pass']);

mysql_select_db('insitefu_jml01');

$show = mysql_query("SHOW FIELDS FROM jos_homenet");

mysql_query('TRUNCATE TABLE `jos_homenet`');

$feildsnum = 0;

while($do = mysql_fetch_array($show)) {
	$feild[$do['Field']] = $do['Field'];
	$feildsnum++;
  }
  
$numSQL = 1;

$sqlKey = null;

foreach ($feild as $key ) {
	if ($numSQL == $feildsnum) {
	  $sqlKey .= $key;
	} else {
	  $sqlKey .= $key.", ";
	}
	$numSQL++;
  }

$fp = fopen("_vehicles.xls","r");

$contents = fread($fp, filesize("_vehicles.xls"));
  
$newLine = explode("\n",$contents);
array_shift($newLine);
$rows = 1;
  foreach ($newLine as $key => $value) {
	$rows++;
    if (empty($value)) {
	
    } else {
	  $feilds = explode("\t",$value);
      $num = count($feilds);
	  if ($num > $feildsnum) {
		die ('<b>Error:</b> There are '.$feildsnum.' feilds in the CSV File, and the num variable is '.$num);
		break;
	  } else {
		if ($num < $feildsnum) {
		  
		  $values = null;
		  $i = 1;
		  foreach ($feilds as $key => $v) {
		    $v2 = mysql_real_escape_string($v);
			if ($i == $num) {
			  $values .= "'".$v2."'";
			} else {
			  $values .= "'".$v2."',";
			}
			$i++;
		  }
		  
		  mysql_query("INSERT INTO jos_homenet
					($sqlKey)
					VALUES($values)
					")or die(mysql_error() ."<br>".$rows." ".__LINE__);

		} else {
		  
		  $values = null;
		  $i = 1;
		  foreach ($feilds as $key => $v) {
			$v2 = mysql_real_escape_string($v);
			if ($i == $num) {
			  $values .= "'".$v2."'";
			} else {
			  $values .= "'".$v2."',";
			}
			$i++;
		  }
		  
		  mysql_query("INSERT INTO jos_homenet
					($sqlKey)
					VALUES($values)
					")or die(mysql_error() ."<br>".$rows." ".__LINE__);

		}
	  }
    }
  }

  echo 'All '.($rows-2).'Records Added to Inventory List';