<?php require_once __DIR__.'/../layout/header.php'; ?>
<h2>Deals</h2>
<a href="deals.php?action=create" class="btn btn-success mb-3">Add Deal</a>
<table class="table table-bordered">
<tr><th>Client</th><th>Amount</th><th>Stage</th><th>Actions</th></tr>
<?php foreach ($deals as $d): ?>
<tr>
 <td><?php echo htmlspecialchars($d['client_id']); ?></td>
 <td><?php echo htmlspecialchars($d['amount']); ?></td>
 <td><?php echo htmlspecialchars($d['stage']); ?></td>
 <td>
   <a href="deals.php?action=edit&id=<?php echo $d['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
   <a href="deals.php?action=delete&id=<?php echo $d['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
 </td>
</tr>
<?php endforeach; ?>
</table>
<?php require_once __DIR__.'/../layout/footer.php'; ?>
