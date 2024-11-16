<?php
function ping_time($ip) {
  $ping_cmd = "ping -c 1 -w 5 " . $ip;
  exec($ping_cmd, $info);
  if($info == null)
  {
    return json_encode(['code'=>404,'msg'=>"Ping请求找不到主机".$ip.";请检查该名称,然后重试"]);die;
  }
  //判断是否丢包
  $str1 = $info['4'];
  $str2 = "1 packets transmitted, 1 received, 0% packet loss";
  if( strpos( $str1 , $str2 ) === false)
  {
     return json_encode(['code'=>403,'msg'=>"当前网络堵塞,请求无法成功,请稍后重试"]);die;
  }
 
 
    
  $result = array();
  $result['info'] = $info;
    
  return json_encode(['code'=>200,'msg'=>"请求成功",'data'=>$result]);
}
  
$ip = $_POST['ip'];  
print_r(ping_time($ip));

?>
