<?php
include_once __DIR__ . '/../components/header.template.php';
use App\Services\Users\User;
?>
<main class="main mt-4">
    <div class="container">
        <h1>Hello, <?= User::data()['name'] ?>!</h1>
    </div>
</main>
<?php include_once __DIR__ . '/../components/footer.template.php' ?>