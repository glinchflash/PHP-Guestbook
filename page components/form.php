<?php
declare(strict_types=1);

if (isset($_POST['submit'])) {
    //to handle site defacement attacks
    $title = trim(htmlspecialchars($_POST['title']));
    $content = trim(htmlspecialchars($_POST['content']));
    $author = trim(htmlspecialchars($_POST['author']));

    $loader = new PostLoader();
    $loader->addPost($title, $content, $author);
    $loader->savePost();

    $posts = $loader->getPosts();
    //sort array top to bottom instead of bottom to top
    $posts = array_reverse($posts);

    //only show the first 20 elements of array (after reverse so the 20 newest)
    $posts = array_slice($posts, 0, 20);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Guestbook PHP</title>
</head>
<body>
<div class="container align-items center">
    <div class="col-2  m-auto justify-content center">
        <form method="post">
            <div>
                <label for="author">Name:</label>
                <input type="text" name="author" id="author"/>

                <label for="title">Title:</label>
                <input type="text" name="title" id="title"/>

                <label for="content">Message:</label>
                <textarea name="content" id="content" cols="30" rows="10"></textarea>

                <button type="submit" class="btn btn-dark ">Submit</button>
            </div>
        </form>
    </div>
    <div class="guestbook text-center">
        <h3>Guestbook posts</h3>
        <div class="posts">
            <?php

            if (!empty($posts)) {

                foreach ($posts as $post) {
                    ?>
                    <div class="single-post">

                        <p><?php echo $post->getTitle() ?></p>;
                        <p><?php echo $post->getAuthor() ?></p>;
                        <p><?php echo $post->getDate() ?></p>;
                        <p><?php echo $post->getContent() ?></p>;

                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
