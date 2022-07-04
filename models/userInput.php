<?php
declare(strict_types=1);

/**
 * @throws Exception
 */
function checkInput(): Post
{
    $keys=['title','author','message'];
    foreach($keys as $key){
        if($_POST[$key]==""){
            throw new Exception('empty '. $key.' input');
        }
    }
    return new Post($_POST['title'], date("d-m-Y") ,$_POST['message'],$_POST['author']);
}