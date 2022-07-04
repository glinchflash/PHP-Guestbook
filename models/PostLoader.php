<?php
declare(strict_types=1);
require('database.txt');

class PostLoader
{

    public function savePost(POST $post): void
    {
        $file = 'database.txt';
        $currentFile = file_get_contents($file);
        $decodedFile = json_decode($currentFile);
        $tempArray = json_decode(json_encode($decodedFile), true);
        $postArray = array('message' => $post->getContent());
        $tempArray[] = $postArray;
        $encodedTempArray = json_encode($tempArray);
        file_put_contents($file, $encodedTempArray);
    }


    public function getPosts(): array
    {
        $stdPosts = json_decode(file_get_contents('database.txt'));
//        $posts = [];
//        foreach ($stdPosts as $stdPost) {
//            $posts[] = new Post($stdPost->title, $stdPost->message,  $stdPost->author);
        $posts = $stdPosts;
        return $posts;
    }
//        return $posts;


}


