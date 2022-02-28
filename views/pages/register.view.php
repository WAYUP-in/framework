<?php
include_once __DIR__ . '/../components/header.template.php';
use App\System\Cookies\Message;
?>
<main class="main mt-4">
    <div class="container">
        <h1>Create account</h1>
        <?php Message::danger(); ?>
        <?php Message::success(); ?>
        <form method="post" action="/register">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" value="" name="name" class="form-control" id="name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" value="" name="email" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" value="" name="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Password Confirmation</label>
                <input type="password" value="" name="password_confirmation" class="form-control" id="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
<?php include_once __DIR__ . '/../components/footer.template.php' ?>