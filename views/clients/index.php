<?php require_once __DIR__.'/../layout/header.php'; ?>
<h2>Clients</h2>
<form class="mb-3" method="get">
  <input type="text" name="q" placeholder="Search" value="<?php echo htmlspecialchars($_GET['q'] ?? '', ENT_QUOTES); ?>" class="form-control">
</form>
<a href="clients.php?action=create" class="btn btn-success mb-3">Add Client</a>
<table class="table table-bordered">
<tr><th>Name</th><th>Email</th><th>Phone</th><th>Company</th><th>Actions</th></tr>
<?php foreach ($clients as $c): ?>
<tr>
 <td><?php echo htmlspecialchars($c['name']); ?></td>
 <td><?php echo htmlspecialchars($c['email']); ?></td>
 <td><?php echo htmlspecialchars($c['phone']); ?></td>
 <td><?php echo htmlspecialchars($c['company']); ?></td>
 <td>
   <a href="clients.php?action=edit&id=<?php echo $c['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
   <a href="clients.php?action=delete&id=<?php echo $c['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
 </td>
</tr>
<?php endforeach; ?>
</table>
<?php require_once __DIR__.'/../layout/footer.php'; ?>
