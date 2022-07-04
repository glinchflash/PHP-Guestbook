<?php
declare(strict_types=1);
require('database/database.txt');
class PostLoader
{

    public function savePost(POST $post):void{

        $data=[];
        $data['title']=$post->getTitle();
        $data['date']=$post->getDate();
        $data['content']=$post->getContent();
        $data['author']=$post->getAuthor();
        $currentFile = json_decode(file_get_contents('C:\Users\glenn\Desktop\becode\mygithub\PHP-Guestbook\database\database.txt'),true);
        $currentFile[]= $data;
        $dataJSON = json_encode($currentFile);

        file_put_contents('C:\Users\glenn\Desktop\becode\mygithub\PHP-Guestbook\database\database.txt',$dataJSON);
    }


    public function getPosts():array
    {
        $storedPosts = json_decode(file_get_contents('C:\Users\glenn\Desktop\becode\mygithub\PHP-Guestbook\database\database.txt'));
        return $storedPosts;
    }
}

