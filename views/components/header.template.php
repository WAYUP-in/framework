<?php
use App\System\Config;
use App\Services\Users\User;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= Config::app('name') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/"><?= Config::app('name') ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                    foreach (Config::app('nav') as $item) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $item['link'] ?>"><?= $item['label'] ?></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <div class="d-flex" style="align-items: center;">
                    <?php
                    if (User::loggedIn()) {
                        ?>
                            <a href="/account" style="color: #fff;margin-bottom: 0;margin-right: 10px;"><?= User::data()['name'] ?></a>
                            <form method="post" action="/logout">
                                <button type="submit" class="btn btn-outline-danger" style="margin-right: 5px;">Logout</button>
                            </form>
                        <?php
                    } else {
                        ?>
                            <a href="/login" class="btn btn-outline-success" style="margin-right: 5px;">Login</a>
                            <a href="/register" class="btn btn-outline-primary">Register</a>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </nav>
</header>