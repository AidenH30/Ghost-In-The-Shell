<?php

function alert($mensagem){
    echo "<script>window.alert('". $mensagem ."')</script>";
}

function redirect($url){
    header("Location: $url");
    exit;
}

function redirect_time($url, $time) {
    echo "<script>
        setTimeout(() => {
            window.location.href = '$url';
        }, $time);
    </script>";
}



?>