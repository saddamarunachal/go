<?php require_once __DIR__.'/../layout/header.php'; ?>
<h2>Users</h2>
<a href="users.php?action=create" class="btn btn-success mb-3">Add User</a>
<table class="table table-bordered">
<tr><th>Name</th><th>Email</th><th>Role</th><th>Actions</th></tr>
<?php foreach ($users as $u): ?>
<tr>
 <td><?php echo htmlspecialchars($u['name']); ?></td>
 <td><?php echo htmlspecialchars($u['email']); ?></td>
 <td><?php echo htmlspecialchars($u['role']); ?></td>
 <td>
   <a href="users.php?action=edit&id=<?php echo $u['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
 </td>
</tr>
<?php endforeach; ?>
</table>
<?php require_once __DIR__.'/../layout/footer.php'; ?>
