<?php require_once __DIR__.'/../layout/header.php'; ?>
<h2><?php echo $action === 'edit' ? 'Edit' : 'New'; ?> User</h2>
<form method="post">
  <div class="mb-3"><label>Name</label><input type="text" name="name" value="<?php echo htmlspecialchars($user['name'] ?? ''); ?>" class="form-control" required></div>
  <div class="mb-3"><label>Email</label><input type="email" name="email" value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>" class="form-control" required></div>
  <?php if ($action !== 'edit'): ?>
  <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control" required></div>
  <?php endif; ?>
  <div class="mb-3"><label>Role</label>
    <select name="role" class="form-select">
      <option value="Staff" <?php if(($user['role'] ?? '')=='Staff') echo 'selected'; ?>>Staff</option>
      <option value="Manager" <?php if(($user['role'] ?? '')=='Manager') echo 'selected'; ?>>Manager</option>
      <option value="Admin" <?php if(($user['role'] ?? '')=='Admin') echo 'selected'; ?>>Admin</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
<?php require_once __DIR__.'/../layout/footer.php'; ?>
