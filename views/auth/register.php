<?php require_once __DIR__.'/../layout/header.php'; ?>
<h2>Register</h2>
<form method="post">
  <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control" required></div>
  <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" required></div>
  <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control" required></div>
  <div class="mb-3">
    <label>Role</label>
    <select name="role" class="form-select">
      <option value="Staff">Staff</option>
      <option value="Manager">Manager</option>
      <option value="Admin">Admin</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>
<p class="mt-3">Have an account? <a href="login.php">Login</a></p>
<?php require_once __DIR__.'/../layout/footer.php'; ?>
