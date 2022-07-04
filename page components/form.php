<?php
declare(strict_types=1);
require ('models/Post.php');
require ('models/PostLoader.php');
require ('models/userInput.php');

$_DIR_ = 'C:\Users\glenn\Desktop\becode\mygithub\PHP-Guestbook\database\database.txt';
if (!empty(file_get_contents($_DIR_))) {
    $postloader = new PostLoader();
    $posts = $postloader->getPosts();
    var_dump($posts);
} else {
    $posts = json_decode('[{"title":"your","date":"show","message":"here","author":"posts"}]');
}

if (isset($_POST['submit'])) {
    try {
        $post = isEmpty();
        $postloader = new PostLoader();
        $postloader->savePost($post);
        $posts = $postloader->getPosts();
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
            <?php if (count($posts)< 20): ?>
                <?php for ($i=0; $i < count($posts);$i++): ?>
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 style="color:red;" class="card-title"><?= $posts[$i]->{'title'}; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $posts[$i]->{'author'}; ?></h6>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $posts[$i]->{'date'}; ?></h6>
                                <p class="card-text"><?= $posts[$i]->{'message'}; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endfor;?>
            <?php elseif (count($posts) > 20): ?>
                <?php for ($i=0; $i < 20 ;$i++): ?>
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
                <?php endfor;?>
            <?php endif;?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
