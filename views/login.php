<?php
?>
<h1>Login to your account</h1>

<form method="post" action="/login">
    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control <?php echo isset($errors['email']) ? ' is-invalid' : '' ?>"
               name="email">
        <div class="invalid-feedback">
            <?php echo $errors['email'] ?? '' ?>
        </div>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control <?php echo isset($errors['password']) ? ' is-invalid' : '' ?>"
               name="password">
        <div class="invalid-feedback">
            <?php echo $errors['password'] ?? '' ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>