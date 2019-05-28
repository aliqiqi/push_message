<?php
/*
* Created by DevilKing
* Author:DevilKing
* 微信公众号：devilking
* Date: 2019- 05-23
*Time: 16:09:
*/

//此处以 qq邮箱为例 其余类型邮箱请自行修改
return [
    //是否开启调试模式
    'debug'                 =>true,
    //email服务器地址
    'host'                  => 'smtp.qq.com',
    //smtp用户名
    'username'              => '745713611@qq.com',
    //smtp密码
    'password'              =>'olchznnzkhqibega',
    //允许的协议 TLS/ssl
    'smtp_secure'           =>'ssl',
    //服务器端口
    'port'                  =>465,
    //html格式发送
    'is_html'               =>true,
    //发件人名称
    'send_name'             =>'Phper',
    //是否有附件
    'add_attachment'        =>false,
    //服务器类型
    'smtp'                  =>'smtp',
    //不支持html时显示的内容
    'alt_body'               =>'如果邮件客户端不支持HTML则显示此内容',
    //字符集
    'char_set'               =>'UTF-8'


];

