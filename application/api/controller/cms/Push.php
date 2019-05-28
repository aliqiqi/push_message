<?php
/*
* Created by DevilKing
* Author:DevilKing
* Date: 2019- 05-23
*Time: 16:19:
*/
namespace app\api\controller\cms;
use think\Request;
use app\lib\swoole\Pclient;
use think\Controller;
/*
 * 发送邮件接口
 * */
class Push extends Controller
{
    /**
     * @auth('发送邮件功能','推送功能')
     * @param Request $request
     * @validate('SendForm')
     * @return json
     * @throws \think\exception
     */
    public function email(Request $request)
    {
        $data = $request -> post();
        $data = [
            'method'=>'email',
            'data'=>[
                'to'=>$data['to'],
                'title'=>$data['title'],
                'content'=>$data['content'],
            ]
        ];
        //进行发送数据
        Pclient::getInstance()->sSend($data);
        //发送成功
        return writeJson(201,'','ok',0);
    }
}