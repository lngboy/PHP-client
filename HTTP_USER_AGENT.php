各大经典浏览器HTTP_USER_AGENT详细

IE 各个版本典型的userAgent如下：

  Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)

  Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.2)

  Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)

  Mozilla/4.0 (compatible; MSIE 5.0; Windows NT)

  其中，版本号是MSIE之后的数字。

 

  Firefox  几个版本的userAgent大致如下：

  Mozilla/5.0 (Windows; U; Windows NT 5.2) Gecko/2008070208 Firefox/3.0.1

  Mozilla/5.0 (Windows; U; Windows NT 5.1) Gecko/20070309 Firefox/2.0.0.3

  Mozilla/5.0 (Windows; U; Windows NT 5.1) Gecko/20070803 Firefox/1.5.0.12  其中，版本号是Firefox之后的数字。

 

  Opera 典型的userAgent如下：

  Opera/9.27 (Windows NT 5.2; U; zh-cn)

  Opera/8.0 (Macintosh; PPC Mac OS X; U; en)

  Mozilla/5.0 (Macintosh; PPC Mac OS X; U; en) Opera 8.0  

  其中，版本号是靠近Opera的数字。

 

  Safari 典型的userAgent如下：

  Mozilla/5.0 (Windows; U; Windows NT 5.2) AppleWebKit/525.13 (KHTML, like Gecko) Version/3.1 Safari/525.13

  Mozilla/5.0 (iPhone; U; CPU like Mac OS X) AppleWebKit/420.1 (KHTML, like Gecko) Version/3.0 Mobile/4A93 Safari/419.3

  其版本号是Version之后的数字。

 

Chrome 的userAgent是：

Mozilla/5.0 (Windows; U; Windows NT 5.2) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.2.149.27 Safari/525.13  

  其中，版本号在Chrome之后的数字。

 

 

Navigator 的userAgent是：

Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.12) Gecko/20080219 Firefox/2.0.0.12 Navigator/9.0.0.6

其中，版本号在Navigator之后的数字。

    /**
     * 获取客户端浏览器以及版本号
     * @param $agent    //$_SERVER['HTTP_USER_AGENT']
     * @return array[browser]       浏览器名称
     * @return array[browser_ver]   浏览器版本号
     */    
    function getClientBrowser($agent = '') {
        $browser = '';
        $browser_ver = '';
        if (preg_match('/OmniWeb\/(v*)([^\s|;]+)/i', $agent, $regs)) {
            $browser = 'OmniWeb';
            $browser_ver = $regs[2];
        }
        if (preg_match('/Netscape([\d]*)\/([^\s]+)/i', $agent, $regs)) {
            $browser = 'Netscape';
            $browser_ver = $regs[2];
        }
        if (preg_match('/safari\/([^\s]+)/i', $agent, $regs)) {
            $browser = 'Safari';
            $browser_ver = $regs[1];
        }
        if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
            $browser = 'Internet Explorer';
            $browser_ver = $regs[1];
        }
        if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
            $browser = 'Opera';
            $browser_ver = $regs[1];
        }
        if (preg_match('/NetCaptor\s([^\s|;]+)/i', $agent, $regs)) {
            $browser = '(Internet Explorer '.$browser_ver.') NetCaptor';
            $browser_ver = $regs[1];
        }
        if (preg_match('/Maxthon/i', $agent, $regs)) {
            $browser = '(Internet Explorer '.$browser_ver.') Maxthon';
            $browser_ver = '';
        }
        if (preg_match('/360SE/i', $agent, $regs)) {
            $browser = '(Internet Explorer '.$browser_ver.') 360SE';
            $browser_ver = '';
        }
        if (preg_match('/SE 2.x/i', $agent, $regs)) {
            $browser = '(Internet Explorer '.$browser_ver.') 搜狗';
            $browser_ver = '';
        }
        if (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
            $browser = 'FireFox';
            $browser_ver = $regs[1];
        }
        if (preg_match('/Lynx\/([^\s]+)/i', $agent, $regs)) {
            $browser = 'Lynx';
            $browser_ver = $regs[1];
        }
        if (preg_match('/Chrome\/([^\s]+)/i', $agent, $regs)) {
            $browser = 'Chrome';
            $browser_ver = $regs[1];
        }
        if (preg_match('/MicroMessenger\/([^\s]+)/i', $agent, $regs)) {
            $browser = '微信浏览器';
            $browser_ver = $regs[1];
        }
        if ($browser != '') {
            return ['browser'=>$browser, 'browser_ver'=>$browser_ver];
        } else {
            return ['browser'=>'未知','browser_ver'=> ''];
        }
    }
