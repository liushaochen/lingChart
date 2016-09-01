<?php
/**
 * Created by PhpStorm.
 * User: liushaochen
 * Date: 16/9/1
 * Time: 22:59
 */

/**
 * @param string $channel 发送目标 #栏目名称 or @用户名
 * @param string $content 消息主体
 * @param array $attachments 附件或复杂信息载体数组array(array('title'=>'标题','description'=>'主体','url'=>'链接地址','color'=>'warning|info|primary|error|muted|success'))
 */
function pushMessage($channel, $content, $attachments = array()){
    $url = 'https://hooks.pubu.im/services/pweqzmgdqr7z0ge';
    $message = new \src\Incoming($url);
    $user_name = '芥末网';
    $user_img = 'http://localhost/jiemo/static/Common/images/logo1.png';
    $message->pushMessage($content, $attachments,$user_name,$user_img,$channel);
}