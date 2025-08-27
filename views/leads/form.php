<?php require_once __DIR__.'/../layout/header.php'; ?>
<h2><?php echo $action === 'edit' ? 'Edit' : 'New'; ?> Lead</h2>
<form method="post">
  <div class="mb-3"><label>Client ID</label><input type="number" name="client_id" value="<?php echo htmlspecialchars($lead['client_id'] ?? ''); ?>" class="form-control" required></div>
  <div class="mb-3"><label>Status</label><input type="text" name="status" value="<?php echo htmlspecialchars($lead['status'] ?? ''); ?>" class="form-control"></div>
  <div class="mb-3"><label>Source</label><input type="text" name="source" value="<?php echo htmlspecialchars($lead['source'] ?? ''); ?>" class="form-control"></div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
<?php require_once __DIR__.'/../layout/footer.php'; ?>
