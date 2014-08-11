<?php
/**
 * SendMailCommand.php
 * @author: xiaoma <xiaoma21@126.com>
 * Date: 7/22/14
 * Time: 1:41 PM
 */

class SendMailCommand extends CConsoleCommand{
    

    public $defaultAction = 'send'; //默认方法  

        
    /**
     * 脚本主方法
     */
    public function actionSend()
    {                                    
         
         $res = Mailer::send('test',  '',  'xiaoma21@126.com', '命令行测试邮件','console');    
         if($res){               
              echo "发送邮件给xiaoma21@126.com成功".chr(10);
         }else{
              echo "发送邮件给xiaoma21@126.com失败".chr(10);
         }
                                            	               
    } 
}