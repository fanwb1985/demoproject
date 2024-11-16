<?php
function query_user($name) {
   define('SQL_HOST','localhost');
   define("SQL_USER","user1");
   define("SQL_PASSWORD","password1");
   define("SQL_DATABASE","test");
   define("SQL_PORT","3306");
   $mysql = mysqli_connect(SQL_HOST,SQL_USER,SQL_PASSWORD,SQL_DATABASE,SQL_PORT) or  die(mysqli_error());
   $sql = "select* from user where name="."'$name'";
   $results = $mysql -> query($sql);
   $m = array();
   while ($row = mysqli_fetch_array($results))
   {
       $res= array();
       $res['name']=$row['name'];
       $res['pid']=$row['pid'];
       $res['age']=$row['age'];
       array_push($m,$res);
   }
   //释放
   mysqli_free_result($results);
   //关闭连接
   mysqli_close($mysql);
   return json_encode($m);
}

$name = $_POST['name'];  
print_r(query_user($name));

?>
