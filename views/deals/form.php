<?php require_once __DIR__.'/../layout/header.php'; ?>
<h2><?php echo $action === 'edit' ? 'Edit' : 'New'; ?> Deal</h2>
<form method="post">
  <div class="mb-3"><label>Client ID</label><input type="number" name="client_id" value="<?php echo htmlspecialchars($deal['client_id'] ?? ''); ?>" class="form-control" required></div>
  <div class="mb-3"><label>Amount</label><input type="number" step="0.01" name="amount" value="<?php echo htmlspecialchars($deal['amount'] ?? ''); ?>" class="form-control"></div>
  <div class="mb-3"><label>Stage</label><input type="text" name="stage" value="<?php echo htmlspecialchars($deal['stage'] ?? ''); ?>" class="form-control"></div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
<?php require_once __DIR__.'/../layout/footer.php'; ?>
