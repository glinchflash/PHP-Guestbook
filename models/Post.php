<?php
declare(strict_types=1);

class Post
{
    private string $title;
    private DateTime $date;
    private string $content;
    private string $author;

    public function __construct($title,$date, $content, $author)
    {
        $this->title = htmlspecialchars($title , ENT_QUOTES);
        $this->date =  $date;
        $this->content = htmlspecialchars($content , ENT_QUOTES);
        $this->author = htmlspecialchars($author , ENT_QUOTES);
    }

    public function getTitle():string{
        return $this->title;
    }

    public function getDate(){
        return $this->date;
    }

    public function getContent():string{
        return $this->content;
    }

    public function getAuthor():string{
        return $this->author;
    }

}