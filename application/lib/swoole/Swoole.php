<?php
namespace app\lib\swoole;

use think\swoole\Server;
use app\lib\swoole\Task;
class Swoole extends Server
{
    protected $host = '127.0.0.1';
    protected $port = 9501;
    protected $serverType = 'server';
    protected $option = [
        'worker_num'=> 4,
        //'daemonize'	=> true,//测试环境请注释此选项
        'backlog'	=> 128,
        'task_worker_num' => 1,
    ];

    public function __construct()
    {
        parent::__construct();


    }

    public function initialize()
    {
        $config = Config::pull('swoole_server');
        $this->serverType = $config['type'];
        $this->host = $config['host'];
        $this->port = $config['port'];
        $this->option = $config['option'];
    }

    //接收发送的消息
    public function onReceive($server, $fd, $from_id, $data)
    {
        $server->task($data);
    }
    public function onTask($server, $task_id, $reactor_id, $data)
    {
        //处理
        $obj = new Task();
        $data = json_decode($data,true);
        //日志记录
        $method = $data['method'];
        $flag = $obj->$method($data['data']);
        return $flag;
    }
    public function onFinish($server, $task_id, $data)
    {
        //处理完成返回值
        print_r($data);
    }
    public function onRequest($request, $response)
    {

    }
}
