<?php

/**
 * Description of General
 *
 * @author listico
 */
class Core_Util_Click {

    public static function getUsersVars() {
        $users_vars = array('fechaInicio' => '','fechaFinal'=>'','huespedes'=> 2,'provincia' => 1,'ciudad' => 1);

        foreach ($users_vars as $k => $v) {
            if(isset($_REQUEST[$k])){
                $users_vars[$k] = $_REQUEST[$k];
                $_SESSION[$k] = $_REQUEST[$k];
            }else if($_SESSION[$k]){
                $users_vars[$k] = $_SESSION[$k];
            }
        }

        return $users_vars;
    }
}

?>