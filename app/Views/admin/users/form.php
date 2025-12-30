<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-3">
    <a href="<?= base_url('admin/users') ?>" class="btn btn-sm btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5><?= isset($user) ? 'Edit User' : 'Create User' ?></h5>
    </div>
    <div class="card-body">
        <form action="<?= isset($user) ? base_url('admin/users/update/' . $user['id']) : base_url('admin/users/store') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name *</label>
                    <input type="text" class="form-control" name="name" required value="<?= old('name', $user['name'] ?? '') ?>">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email *</label>
                    <input type="email" class="form-control" name="email" required value="<?= old('email', $user['email'] ?? '') ?>">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Password <?= isset($user) ? '(leave blank to keep current)' : '*' ?></label>
                    <input type="password" class="form-control" name="password" <?= !isset($user) ? 'required' : '' ?>>
                    <?php if (!isset($user)): ?>
                        <small class="text-muted">Minimum 6 characters</small>
                    <?php endif; ?>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Role *</label>
                    <select class="form-select" name="role" required>
                        <option value="admin" <?= (old('role', $user['role'] ?? '') == 'admin') ? 'selected' : '' ?>>Admin</option>
                        <option value="teacher" <?= (old('role', $user['role'] ?? '') == 'teacher') ? 'selected' : '' ?>>Teacher</option>
                        <option value="staff" <?= (old('role', $user['role'] ?? '') == 'staff') ? 'selected' : '' ?>>Staff</option>
                    </select>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="status" value="1"
                           <?= (old('status', $user['status'] ?? 1) == 1) ? 'checked' : '' ?>>
                    <label class="form-check-label">Active</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Save User
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
