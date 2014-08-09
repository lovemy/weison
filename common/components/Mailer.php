<?php
/**
 * SiteController.php
 * @author: hbma <mhb@cnwin.com>
 * Date: 7/22/14
 * Time: 1:41 PM
 */

class Mailer{
     /*封装发邮件的方法，可以在这里面修改配置*/
     public static  function Send($view,  $data,  $email,  $subject=null, $mode=null){                       
            //use 'contact' view from views/mail
            $mail = new YiiMailer($view, $data);            
            $mail -> IsSMTP();
            $mail -> SMTPAuth = true;                                
            //邮件服务配置
            $mail -> Host = "smtp.qq.com";  /* smtp.exmail.qq.com */            
            $mail -> Port = 25;
            $mail -> Username = "728168414@qq.com";        
            $mail -> Password = "loveping510112";
            //发件人信息
            $mail -> From = '728168414@qq.com';
            $mail -> FromName = '【Weison】';
            $mail -> AddReplyTo('728168414@qq.com');
            //收件人信息
            $mail -> AddAddress($email);                                
            // 设置邮件的字符编码
            $mail-> CharSet = 'UTF-8';            
             //邮件标题                             
            $mail->Subject = $subject ? $subject : 'weison mail';                
            //发送邮件
            if ($mail->send()) {                  
                    return true;             
            } else {     
                    if($mode == "console"){
                        return false;
                    }else{
                        Yii::app()->user->setFlash('error','Error while sending email: '.$mail->getError()); 
                        return false;
                    }                                                        
            }
     }
}
