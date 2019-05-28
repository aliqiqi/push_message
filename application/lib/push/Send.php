<?php
/*
* Created by DevilKing
* Date: 2019- 05-23
*Time: 16:40:
*/
namespace app\lib\push;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use think\facade\Config;
use app\lib\exception\push\PushException;
/*
 * 封装phpmaiailer类
 * */
class Send
{
    public function __construct()
    {
        $this->config = Config::pull('email');
    }

    public function send($data=[])
    {
        if(empty($data))
        {
            //返回错误
           throw new PushException([
               'code'=>'400',
               'msg'=>'参数错误'
           ]);
        }
        try{
            $mail = new PHPMailer($this->config['debug']);
            $mail->isSMTP();
            $mail->CharSet=$this->config['char_set'];
            $mail->Host = $this->config['host'];
            $mail->SMTPAuth = true;
            $mail -> Username = $this->config['username'];
            $mail -> Password =$this->config['password'];
            $mail->SMTPSecure = $this->config['smtp_secure'];
            $mail -> Port = $this->config['port'];
            $mail -> setFrom($this->config['username'],$this->config['send_name']);
            $mail->addAddress($data['to'],'');
            $mail->addReplyTo($this->config['username'],'info');
            $mail -> isHTML($this->config['is_html']);
            $mail -> Subject = $data['title'];
            $mail -> Body = $data['content'];
            $mail -> AltBody = $this->config['alt_body'];
//            $mail->addAttachment('/data/wwwroot/PHP7.3.pdf');         // Add attachments 添加附件
//            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name 发送附件并重命名
            $mail -> send();
            echo '邮件发送成功';
        }catch(Exception $e)
        {
            throw new PushException([
                'code'=>'500',
                'msg'=>'邮件发送失败：',$mail->ErrorInfo
            ]);

        }
    }
}