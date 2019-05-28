<?php

namespace app\lib\swoole;
use app\lib\push\Send;
/*
 * 代表 swoole 里面 后续所有的 task异步任务 都放在里面做
 * */
class Task{

    /*
     * 异步发送 邮件
     * @param $data 发送数据
     * */
    public function email($data)
    {
        try{
            $send = new Send();
            $status = $send -> send($data);
        }catch(\Exception $e){
            return false;
        }
        return true;
    }

}
