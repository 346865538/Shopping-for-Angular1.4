<?php
	$type = $_GET['type'];
	$name = $_GET['name'];
	$pass = $_GET['pass'];
	$mysql = mysql_connect("bdm260467157.my3w.com","bdm260467157","66832821");
	
	mysql_select_db("bdm260467157_db");
	mysql_query("set names utf8");
	
	if($type == "reg"){
		$sql = "SELECT * FROM users WHERE uname = '{$name}'";
		$result = mysql_query($sql);
		if($arr = mysql_fetch_row($result)){
			echo '用户名已被注册';
		}else{
			$sql = "INSERT INTO users(id,uname,upass)VALUES(null,'{$name}','{$pass}')";
			$result = mysql_query($sql);
			if(mysql_insert_id()>0){
				echo '注册成功';
			}else{
				echo '未知错误';
			}
		}
	}else if($type == "login"){
		$sql = "SELECT * FROM users WHERE uname = '{$name}'";
		$result = mysql_query($sql);
		if($arr = mysql_fetch_row($result)){
			if($arr[1] == $name && $arr[2] == $pass){
				echo "登录成功";
			}
		}else{
			echo "该用户名未注册";
		}
	}
	
	
	mysql_close();
?>