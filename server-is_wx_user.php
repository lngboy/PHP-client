function is_wx_pro() {
      $user_agent = $_SERVER['HTTP_USER_AGENT'];
      if (strpos($user_agent, 'MicroMessenger') === false) {
         // 非微信浏览器禁止浏览
         return false;
      } else {
         // 微信浏览器，允许访问
         preg_match('/.*?(MicroMessenger\/([0-9.]+))\s*/', $user_agent, $matches);//echo "MicroMessenger";
         echo '<br>Version:'.$matches[2];// 获取版本号
         return true;
      }
}
