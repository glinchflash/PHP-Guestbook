<?php
declare(strict_types=1);

class Post
{
    private string $title;
    private string $date;
    private string $message;
    private string $author;

    public function __construct($title, $message, $author)
    {
        $this->title = htmlspecialchars($title , ENT_QUOTES);
        $this->date =  date("d/m/Y");
        $this->message = htmlspecialchars($message , ENT_QUOTES);
        $this->author = htmlspecialchars($author , ENT_QUOTES);
    }

    public function getTitle():string{
        return $this->title;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function getContent():string{
        return $this->message;
    }

    public function getAuthor():string{
        return $this->author;
    }

}