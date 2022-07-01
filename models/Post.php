<?php
declare(strict_types=1);

class Post
{
    private string $title;
    private DateTime $date;
    private string $content;
    private string $author;

    public function __construct($title, $content, $author)
    {
        $this->title = $title;
        $this->date =  new DateTime('utc');
        $this->content = $content;
        $this->author = $author;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getDate(){
        return $this->date;
    }

    public function getContent(){
        return $this->content;
    }

    public function getAuthor(){
        return $this->author;
    }

}