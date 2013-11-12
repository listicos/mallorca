<?php

include_once dirname(__FILE__) . '/../Lib/phpmailer/class.phpmailer.php';

class Core_Mailer {

    protected $_template = false;
    protected $_mailer = false;

    function __construct(Core_template $template = null) {
        $this->_template = $template;
    }

    public function send_email($to, $subject, $message = false, $config = array()) {
        if ($to && filter_var($to, FILTER_VALIDATE_EMAIL)) {
            $mail = $this->mailer($config);
            $mail->AddAddress($to);
            $mail->Subject = $subject;
            if ($message) {
                $mail->MsgHTML($message);
                
            } else if ($this->_template) {
                $mail->IsHTML(true);
                $mail->MsgHTML($this->_template->getContent());
                
            }
            if($mail->Send()) {
                return true;
            } else {
                echo $mail->ErrorInfo;
                return false;
            }
        } else {
            return false;
        }
    }

    protected function config_mailer($mailer) {
        $mailer->Host = trim('smtp.gmail.com');
        $mailer->Port = 465;
        $mailer->Username = trim('ruben.listico@gmail.com');
        $mailer->Password = trim('534%$DcdE23');

        $mailer->setFrom('ruben.listico@gmail.com', 'Mallorca Rent Haus');
        $mailer->FromName = trim('Mallorca Rent Haus');
    }
    
    protected function mailer($config = array()) {
        if (!$this->_mailer) {
            $mail = new PHPMailer();
            $mail->CharSet = "UTF-8";
            $mail->Mailer = "smtp";
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            
            if(!count($config))
                $this->config_mailer($mail);
            else {
                if(isset($config['servidor'])) $mailer->Host = trim($config['servidor']);
                else $mailer->Host = trim('smtp.gmail.com');
                
                if(isset($config['puerto'])) $mailer->Port = trim($config['puerto']);
                else $mailer->Port = 465;
                
                if(isset($config['email'])) $mailer->Username = trim($config['email']);
                else $mailer->Username = trim('ruben.listico@gmail.com');
                
                if(isset($config['password'])) $mailer->Password = trim($config['password']);
                else $mailer->Password = trim('534%$DcdE23');

                if(isset($config['username'])) {
                    $mailer->setFrom($mailer->Username, trim($config['username']));
                    $mailer->FromName = trim($config['username']);
                }
                else {
                    $mailer->setFrom($mailer->Username, 'Mallorca Rent Haus');
                    $mailer->FromName = trim('Mallorca Rent Haus');
                }
                
                
            }

            $this->_mailer = $mail;
        }
        return $this->_mailer;
    }
    

}

?>