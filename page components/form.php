<?php
declare(strict_types=1);
require('database.txt');
require('models/Post.php');
require('models/PostLoader.php');
require('models/userInput.php');

var_dump($_POST);
if (!empty(file_get_contents('database.txt'))) {
    $postLoaderInit = new PostLoader();
    $posts = $postLoaderInit->getPosts();
} else {
    $posts = json_decode('[{"title":"your","date":"show","message":"here","author":"posts"}]');
}

if (isset($_POST['submit'])) {
    try {
        $post = checkInput();
        $postLoader = new PostLoader();
        $postLoader->savePost($post);
        $posts = $postLoader->getPosts();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
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
<header class="text-center">
    <h1>Welcome to our guestbook!</h1>
    <p>Feel free to leave a message!</p>
</header>
<div class="container align-items center">
    <div class="col-2  m-auto justify-content center">
        <form method="post">
            <div>
                <label for="author">Name:</label>
                <input type="text" name="author" id="author"/>

                <label for="title">Title:</label>
                <input type="text" name="title" id="title"/>

                <label for="message">Message:</label>
                <textarea name="message" id="message" cols="30" rows="10"></textarea>

                <button type="submit" class="btn btn-dark ">Submit</button>
            </div>
        </form>
    </div>
    <div class="guestbook text-center">
        <h3>Guestbook posts</h3>
        <div class="posts">
            <?php if (count($posts) < 20): ?>
                <?php for ($i = 0; $i < count($posts); $i++): ?>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 style="color:red;" class="card-title"><?= $posts[$i]->{'title'}; ?></h5>
                                <p class="card-subtitle mb-2 text-muted"><?= $posts[$i]->{'author'}; ?></p>
                                <p class="card-subtitle mb-2 text-muted"><?= $posts[$i]->{'date'}; ?></p>
                                <p class="card-text"><?= $posts[$i]->{'message'}; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            <?php elseif (count($posts) > 20): ?>
                <?php for ($i = 0; $i < 20; $i++): ?>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 style="color:red;" class="card-title"><?= $posts[$i]->{'title'}; ?></h5>
                                <p class="card-subtitle mb-2 text-muted"><?= $posts[$i]->{'author'}; ?></p>
                                <p class="card-subtitle mb-2 text-muted"><?= $posts[$i]->{'date'}; ?></p>
                                <p class="card-text"><?= $posts[$i]->{'message'}; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
