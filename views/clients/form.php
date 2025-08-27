<?php require_once __DIR__.'/../layout/header.php'; ?>
<h2><?php echo $action === 'edit' ? 'Edit' : 'New'; ?> Client</h2>
<form method="post">
  <div class="mb-3"><label>Name</label><input type="text" name="name" value="<?php echo htmlspecialchars($client['name'] ?? ''); ?>" class="form-control" required></div>
  <div class="mb-3"><label>Email</label><input type="email" name="email" value="<?php echo htmlspecialchars($client['email'] ?? ''); ?>" class="form-control"></div>
  <div class="mb-3"><label>Phone</label><input type="text" name="phone" value="<?php echo htmlspecialchars($client['phone'] ?? ''); ?>" class="form-control"></div>
  <div class="mb-3"><label>Company</label><input type="text" name="company" value="<?php echo htmlspecialchars($client['company'] ?? ''); ?>" class="form-control"></div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
<?php require_once __DIR__.'/../layout/footer.php'; ?>
