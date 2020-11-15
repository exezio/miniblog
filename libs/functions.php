<?php
if(!function_exists('debug')) {
    function debug($data)
    {
        echo '<pre>' . print_r($data, true) . '</pre>';

    }
}


    function redirect($http = false)
    {
        if($http)
        {
         $redirect = $http;
        }else
        {
         $redirect = isset($_SERVER['HTTP_REFERER']) ?
         $_SERVER['HTTP_REFERER'] : '/';
        }
        header("Location: $redirect");
        exit;
    }

if(!function_exists('htmlStr')) {
    function htmlStr($str)
    {
        return htmlspecialchars($str, ENT_QUOTES);
    }

    if(!function_exists('checkAuthorize'))
    {
        function checkAuthorize()
        {

            header("Location: /user/check");

        }
    }
}

