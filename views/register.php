<?php
?>
<h1>Register</h1>
<form method="post" action="/register">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control <?php echo isset($errors['full_name']) ? ' is-invalid' : '' ?>"
               name="full_name">
        <div class="invalid-feedback">
            <?php echo $errors['full_name'] ?? '' ?>
        </div>
    </div>
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
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>