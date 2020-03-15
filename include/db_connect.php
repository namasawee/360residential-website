<?php

function connect()
{
	 $db_config=array(
		"host"=>"us-cdbr-iron-east-04.cleardb.net",  
		"user"=>"bf1dc098d4d14a", 
		"pass"=>"06628048",  
		"dbname"=>"heroku_8e6e36f610ca205", 
		"charset"=>"utf8" 
	);


	$mysqli = @new mysqli($db_config["host"], $db_config["user"], $db_config["pass"], $db_config["dbname"]);
	if(mysqli_connect_error()) {
		die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
		exit;
	}
	
	if(!$mysqli->set_charset($db_config["charset"])) { // เปลี่ยน charset เป้น utf8 พร้อมตรวจสอบการเปลี่ยน
	}else{
	}
	return $mysqli;

}
//	  ฟังก์ชันสำหรับคิวรี่คำสั่ง sql
function query($sql)
{
	global $mysqli;
	if($mysqli->query($sql)) { return true; } 
	else { die("SQL Error: <br>".$sql."<br>".$mysqli->error); return false; }
}
//    ฟังก์ชัน select ข้อมูลในฐานข้อมูลมาแสดง
function select($sql)
{
	global $mysqli;	
	$result=array();
	$res = $mysqli->query($sql) or die("SQL Error: <br>".$sql."<br>".$mysqli->error);
	while($data= $res->fetch_assoc()) {
		$result[]=$data;
	}
	return $result;	
	
}
//    ฟังก์ชันสำหรับการ insert ข้อมูล
function insert($table,$data)
{
	global $mysqli;		
	$fields=""; $values="";
	$i=1;
	foreach($data as $key=>$val)
	{
		if($i!=1) { $fields.=", "; $values.=", "; }
		$fields.="$key";
		$values.="'$val'";
		$i++;
	}
	$sql = "INSERT INTO $table ($fields) VALUES ($values)";
	if($mysqli->query($sql)) { 
	return true; 
	
	} 
	else { die("SQL Error: <br>".$sql."<br>".$mysqli->error); return false; }
}
//    ฟังก์ชันสำหรับการ update ข้อมูล
function update($table,$data,$where)
{
	global $mysqli;			
	$modifs="";
	$i=1;
	foreach($data as $key=>$val)
	{
		if($i!=1){ $modifs.=", "; }
		$modifs.=$key.' = "'.$val.'"'; 
		$i++;
	}
	$sql = ("UPDATE $table SET $modifs WHERE $where");
	if($mysqli->query($sql)) {
	 return true; 
	
	} 
	else { die("SQL Error: <br>".$sql."<br>".$mysqli->error); return false; }
}
//    ฟังก์ชันสำหรับการ delete ข้อมูล
function delete($table, $where)
{
	global $mysqli;			
	$sql = "DELETE FROM $table WHERE $where";
	if($mysqli->query($sql)) { 
	return true; 
	} 
	else { die("SQL Error: <br>".$sql."<br>".$mysqli->error); return false; }
}
//    ฟังก์ชันสำหรับแสดงรายการฟิลด์ในตาราง
function listfield($table)
{
	global $mysqli;			
	$sql="SELECT * FROM $table LIMIT 1 ";
	$row_title="\$data=array(<br/>";
	$res = $mysqli->query($sql) or die("SQL Error: <br>".$sql."<br>".$mysqli->error);
	$i=1;
	while($data= $res->fetch_field()) {
		$var=$data->name;
		$row_title.="\"$var\"=>\"value$i\",<br/>";
		$i++;
	}	
	$row_title.=");<br/>";
	echo $row_title;
}
?>