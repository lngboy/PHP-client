有时候我们需要限制一个API访问的频率，例如单用户一分钟之内只能访问多少次。   
类似于这样的需求很容易用Redis来实现。  

<?php   

$redis = new Predis\Client(array(  
    'scheme' => 'tcp',  
    'host'   => '127.0.0.1',  
    'port'   => '6379'  
));  

$redis->auth('123456');  

//这个key记录该用户1的访问次数   
$key = 'user:1:api_count';  

//限制次数为10   
$limit = 10;  

$check = $redis->exists($key);  
if($check){  
    $redis->incr($key);  //键值递增
    $count = $redis->get($key);  
    if($count > 10){  
        exit('your have too many request');  
    }  
}else{  
    $redis->incr($key);  
    //限制时间为60秒   
    $redis->expire($key,60);  
}  

$count = $redis->get($key);  
echo 'You have '.$count.' request'; 
