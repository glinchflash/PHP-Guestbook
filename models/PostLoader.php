<?php
declare(strict_types=1);
class PostLoader
{
    private array $posts = [];
    private const database = 'database.txt';

    public function __construct()
    {
        $contents = file_get_contents(self::database);

        if (!empty($contents)){
            $this->posts = unserialize($contents);
        }
    }


    public function addPost($title, $content, $author):void
    {
        $newPost = new Post($title, $content, $author);
        $this->posts[] = $newPost;
    }

    public function savePost():void{
        // Encode the posts array to save it to the database.txt file
        $encodedPosts = serialize($this->posts); // Converts an array or object to a string representation of the object

        file_put_contents(self::database, $encodedPosts);
    }

    public function getPosts():array
    {
        return $this->posts;
    }
}

