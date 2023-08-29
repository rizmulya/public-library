<?php

    class Utils {

        public static function validate($isAdmin) {
            $sessionKey = $isAdmin ? SESSION_ADMIN : SESSION_USER;

            if (!isset($_SESSION[$sessionKey])) {
                header('Location: '.BASEURL.'/validate');
                exit();
            }
            return $sessionKey;
        }

        public static function justValidate() {
            if (!isset($_SESSION[SESSION_ADMIN]) && !isset($_SESSION[SESSION_USER])) {
                header('Location: '.BASEURL.'/validate');
                exit();
            }
            if(isset($_SESSION[SESSION_ADMIN])) {
                return SESSION_ADMIN;
            }
            return SESSION_USER;
        }

        public static function isPost($goTo) {
            if (!$_POST) {
                header('Location: '.BASEURL.$goTo);
                exit();
            }
        }

        // public static function silentError(){
        // error_reporting(0);
        // ini_set('display_errors', 0);
        // }
        // public static function idr($nominal) {
        //     return "Rp " . number_format($nominal, 0, ',', '.');
        // }
        // public static function alert($message, $goto = false){
        //     echo"
        //     <script>
        //     alert('$message');
        //     document.location = '$goto';
        //     </script>";
        // }

    }

?>