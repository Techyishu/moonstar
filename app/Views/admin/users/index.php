<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between mb-3">
    <h4>Manage Users</h4>
    <a href="<?= base_url('admin/users/create') ?>" class="btn btn-primary">
        <i class="bi bi-person-plus"></i> Create User
    </a>
</div>

<div class="card mb-3">
    <div class="card-body">
        <form method="get" class="row g-3">
            <div class="col-md-6">
                <input type="text" class="form-control" name="search" placeholder="Search users..." value="<?= esc($search ?? '') ?>">
            </div>
            <div class="col-md-4">
                <select class="form-select" name="role">
                    <option value="">All Roles</option>
                    <option value="superadmin" <?= ($role ?? '') == 'superadmin' ? 'selected' : '' ?>>Superadmin</option>
                    <option value="staff" <?= ($role ?? '') == 'staff' ? 'selected' : '' ?>>Staff</option>
                    <option value="admission_officer" <?= ($role ?? '') == 'admission_officer' ? 'selected' : '' ?>>Admission Officer</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100"><i class="bi bi-search"></i> Search</button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><strong><?= esc($user['name']) ?></strong></td>
                            <td><?= esc($user['email']) ?></td>
                            <td><span class="badge bg-primary"><?= ucfirst(str_replace('_', ' ', $user['role'])) ?></span></td>
                            <td>
                                <span class="badge bg-<?= $user['status'] == 1 ? 'success' : 'secondary' ?>">
                                    <?= $user['status'] == 1 ? 'Active' : 'Inactive' ?>
                                </span>
                            </td>
                            <td class="small text-muted"><?= date('M d, Y', strtotime($user['created_at'])) ?></td>
                            <td class="table-actions">
                                <a href="<?= base_url('admin/users/edit/' . $user['id']) ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <?php if ($user['id'] != session()->get('user_id')): ?>
                                    <a href="<?= base_url('admin/users/delete/' . $user['id']) ?>" 
                                       class="btn btn-sm btn-danger" onclick="return confirm('Delete this user?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6" class="text-center text-muted py-4">No users found</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <?= $pager->links() ?? '' ?>
    </div>
</div>

<?= $this->endSection() ?>
