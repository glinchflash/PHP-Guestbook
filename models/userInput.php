<?php
declare(strict_types=1);

function checkInput():array
{
    $errorArr = [];
    $keys=['title','author','message'];
    foreach($keys as $key){
        if($_POST[$key]==""){
            $errorArr[]= 'empty '. $key.' input';
        }
    }
    return $errorArr;
}