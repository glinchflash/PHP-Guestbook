<?php
declare(strict_types=1);

class Post
{
    private string $title;
    private DateTime $date;
    private string $content;
    private string $author;

    public function __construct()
    {
        $this->title = $_POST['title'];
        $this->date = new DateTime();
        $this->content = $_POST['content'];
        $this->author = $_POST['author'];
    }


}