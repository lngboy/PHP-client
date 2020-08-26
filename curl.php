//从CURL中获取响应头
$oCurl = curl_init();
// 设置请求头, 有时候需要,有时候不用,看请求网址是否有对应的要求
$header[] = "Content-type: application/json";
$header[] = "Accept: application/json";
$user_agent = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.146 Safari/537.36";
curl_setopt($oCurl, CURLOPT_URL, $sUrl);
curl_setopt($oCurl, CURLOPT_HTTPHEADER,$header);
// 返回 response_header, 该选项非常重要,如果不为 true, 只会获得响应的正文
curl_setopt($oCurl, CURLOPT_HEADER, true);
// 是否不需要响应的正文,为了节省带宽及时间,在只需要响应头的情况下可以不要正文
//curl_setopt($oCurl, CURLOPT_NOBODY, true);
// 使用上面定义的 ua
curl_setopt($oCurl, CURLOPT_USERAGENT,$user_agent);
curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );

// 不用 POST 方式请求, 意思就是通过 GET 请求
curl_setopt($oCurl, CURLOPT_POST, false);

$sContent = curl_exec($oCurl);
// 获得响应结果里的：头大小
$headerSize = curl_getinfo($oCurl, CURLINFO_HEADER_SIZE);
// 根据头大小去获取头信息内容
$header = substr($sContent, 0, $headerSize);
    
curl_close($oCurl);


//从curl中获取请求头
 $oCurl = curl_init();
 curl_setopt($oCurl, CURLOPT_URL, "https://117.28.240.235:8002/ipcc/agent/login");
 curl_setopt($oCurl, CURLOPT_HTTPHEADER, $header);
//关闭https验证
 curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);
//至关重要，CURLINFO_HEADER_OUT选项可以拿到请求头信息
curl_setopt($oCurl, CURLINFO_HEADER_OUT, TRUE);
curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($oCurl, CURLOPT_POST, 1);
curl_setopt($oCurl, CURLOPT_POSTFIELDS, $bodystr);
$sContent = curl_exec($oCurl);
//通过curl_getinfo()可以得到请求头的信息
$a=curl_getinfo($oCurl);

//判断浏览器类型主要是靠分析_SERVER["HTTP_USER_AGENT"]的内容，而分析浏览器语言则是分析_SERVER["HTTP_ACCEPT_LANGUAGE"]。
