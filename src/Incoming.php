<?php
/**
 * Created by PhpStorm.
 * User: liushaochen
 * Date: 16/9/1
 * Time: 22:58
 */

namespace src;

class Incoming
{

    protected $url = '';

    public function __construct($url){
        $this->url = $url;
    }

    public function pushMessage($text,array $attachments = array(),$user = '',$user_img = '',$channel = ''){
        $data = array();
        $data['text'] = $text;
        if(!empty($attachments)){
            $data['attachments'] = $attachments;
        }
        if($user){
            $data['displayUser'] = array( 'name'=>$user, 'avatarUrl'=>$user_img) ;
        }
        if($channel){
            $data['channel'] = $channel;
        }
        $this->post_url($this->url,json_encode($data));
    }

    /**
     * @param string $url
     * @param string $data_string
     * @return string
     */
    protected function post_url($url, $data_string){
        if (is_array($data_string)) {
            $data_string = json_encode($data_string);
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt ( $ch, CURLOPT_TIMEOUT, 10);
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data_string );
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );
        $out = curl_exec($ch);
        curl_close($ch);
        return $out;
    }

}