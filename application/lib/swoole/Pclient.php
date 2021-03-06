<?php
/*
* Created by DevilKing
* Author:DevilKing
* Date: 2019- 05-23
*Time: 16:09:
*/
namespace app\lib\swoole;
use app\lib\exception\push\SwooleException;
use app\lib\exception\push\PushException;
use Swoole\Client;
use think\facade\Config;
/*
 *
 * */
class Pclient
{
    public $client = "";
    /*
     * 定义单例模式的变量
     * */
    private static $_instance = null;

    public static function getInstance()
    {
        if(empty(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;

    }
    private function __construct()
    {

        try{
            //重启
            $this->client = new Client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_SYNC);
            $result = $this ->client->connect(Config::get('swoole_server.host'),Config::get('swoole_server.port'));
        }catch(\Exception $e)
        {
            throw new SwooleException();
        }


    }

    /*
     *发送邮件
     * */
    public function sSend($data){
        
       if(empty($data) ||!is_array($data) || empty($data['method']))
        {
            throw new PushException([
                'code' => '401',
                'msg'=>'缺少参数或格式错误'
            ]);
        }
        $data['data'] = isset($data['data'])?$data['data']:[];
        $data = json_encode($data);
        
        $this->client->send($data);
        return true;
    }

    /*
     * 基础类库编写 魔术方法
     * */
    public function __call($name,$arguments){

        if(count($arguments) != 2){
            return '';
        }
        $this->client->$name($arguments[0],$arguments[1]);
    }
}