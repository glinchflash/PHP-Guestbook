<?php
declare(strict_types=1);

/**
 * @throws Exception
 */
function isEmpty(): Post
{
    $keys=['title','name','content'];
    foreach($keys as $key){
        if($_POST[$key] == ''){
            throw new Exception('empty '. $key.' input');
        }
    }
    $post = new Post($_POST['title'], date("d-m-Y") ,$_POST['content'],$_POST['name']);
    return $post;
}