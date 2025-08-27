<?php require_once __DIR__.'/../layout/header.php'; ?>
<h2>Leads</h2>
<form class="mb-3" method="get">
  <input type="text" name="q" placeholder="Search" value="<?php echo htmlspecialchars($_GET['q'] ?? '', ENT_QUOTES); ?>" class="form-control">
</form>
<a href="leads.php?action=create" class="btn btn-success mb-3">Add Lead</a>
<table class="table table-bordered">
<tr><th>Client</th><th>Status</th><th>Source</th><th>Actions</th></tr>
<?php foreach ($leads as $l): ?>
<tr>
 <td><?php echo htmlspecialchars($l['client_id']); ?></td>
 <td><?php echo htmlspecialchars($l['status']); ?></td>
 <td><?php echo htmlspecialchars($l['source']); ?></td>
 <td>
   <a href="leads.php?action=edit&id=<?php echo $l['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
   <a href="leads.php?action=delete&id=<?php echo $l['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
 </td>
</tr>
<?php endforeach; ?>
</table>
<?php require_once __DIR__.'/../layout/footer.php'; ?>
