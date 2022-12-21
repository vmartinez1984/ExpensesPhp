<?php
const url_base = 'http://127.0.0.1:8080/expenses';

function url_base($url){
    echo url_base.$url;
}

function url_base_($url){
    return url_base.$url;
}