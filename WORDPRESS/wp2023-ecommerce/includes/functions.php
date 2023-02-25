<?php
if( !function_exists('dd') ){
    function dd($data){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die();
    }
}

if( !function_exists('pr') ){
    function pr($data){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}

if( !function_exists('wp2023_redirect') ){
    function wp2023_redirect($url){
        echo("<script>location.href = '".$url."'</script>");
    }
}