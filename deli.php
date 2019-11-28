<?php
// phpinfo();



$ch = curl_init();

$headerArray = array("X-Service-Id:userauth", "client_id:eplus_app", "Content-Type:application/json;charset=UTF-8");
$url = "https://v2-app.delicloud.com/api/v2.0/auth/loginMobile";
$data = '{"password":"e10adc3949ba59abbe56e057f20f883e","mobile":'.$phone.'}';


curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArray);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); //设置请求方式
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); //设置提交的字符串
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //设为TRUE把curl_exec()结果转化为字串，而不是直接输出 
$output = curl_exec($ch);
curl_close($ch);


$data = json_decode($output);
echo $data->data->token;
