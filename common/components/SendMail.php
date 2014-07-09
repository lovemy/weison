<?php

class SendMail {
     /*封装发邮件的方法，可以在这里面修改配置*/
     public  function Sender($content,$email, $subject=null){                       
        $message =$content;  
        $mailer = Yii::createComponent('common.extensions.mailer.EMailer');             
        $mailer -> Host = 'smtp.exmail.qq.com';
        $mailer -> IsSMTP();
        $mailer -> SMTPAuth = true;                    
        $mailer -> Port = 25;
        $mailer -> Host = "smtp.exmail.qq.com";
        // 您的企业邮局域名 　
        $mailer -> Username = "webmaster@cnwin.com";
        // 邮局用户名(请填写完整的email地址) 　
        $mailer -> Password = "cnwin2014$";
        $mailer -> From = 'webmaster@cnwin.com';
        $mailer -> AddReplyTo('webmaster@cnwin.com');
        $mailer -> AddAddress($email);
        $mailer -> FromName = '【中云赢商】';
        // 设置邮件的字符编码
        $mailer -> CharSet = 'UTF-8';
        $mailer -> IsHtml(TRUE);
        if (!isset($subject)) $subject = '';
        $mailer -> Subject = $subject;
        $mailer -> Body = $message; 
        if($mailer -> Send()){
            return true;
        } else{
            return false;
        }                     
     }
}
