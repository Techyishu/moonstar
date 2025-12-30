<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Manage Admissions</h4>
    <a href="<?= base_url('admin/admissions/export') ?>" class="btn btn-success">
        <i class="bi bi-download me-1"></i>Export CSV
    </a>
</div>

<div class="card mb-3">
    <div class="card-body">
        <form method="get" class="row g-3">
            <div class="col-md-6">
                <input type="text" class="form-control" name="search"
                    placeholder="Search by name, email, or application #..." value="<?= esc($search ?? '') ?>">
            </div>
            <div class="col-md-4">
                <select class="form-select" name="status">
                    <option value="">All Status</option>
                    <option value="pending" <?= ($status ?? '') == 'pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="accepted" <?= ($status ?? '') == 'accepted' ? 'selected' : '' ?>>Accepted</option>
                    <option value="rejected" <?= ($status ?? '') == 'rejected' ? 'selected' : '' ?>>Rejected</option>
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
                    <th>App #</th>
                    <th>Student Name</th>
                    <th>Class Applied</th>
                    <th>Parent Email</th>
                    <th>Status</th>
                    <th>Applied On</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($admissions)): ?>
                    <?php foreach ($admissions as $app): ?>
                        <tr>
                            <td><code><?= esc($app['application_number']) ?></code></td>
                            <td><strong><?= esc($app['student_name']) ?></strong></td>
                            <td><?= esc($app['class_applied']) ?></td>
                            <td><?= esc($app['parent_email']) ?></td>
                            <td>
                                <?php
                                $badgeClass = $app['application_status'] == 'accepted' ? 'success' :
                                    ($app['application_status'] == 'rejected' ? 'danger' : 'warning');
                                ?>
                                <span class="badge bg-<?= $badgeClass ?>">
                                    <?= ucfirst($app['application_status']) ?>
                                </span>
                            </td>
                            <td class="small text-muted"><?= date('M d, Y', strtotime($app['created_at'])) ?></td>
                            <td class="table-actions">
                                <a href="<?= base_url('admin/admissions/view/' . $app['id']) ?>" class="btn btn-sm btn-info"><i
                                        class="bi bi-eye"></i></a>
                                <a href="<?= base_url('admin/admissions/delete/' . $app['id']) ?>" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No applications found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <?= $pager->links() ?? '' ?>
    </div>
</div>

<?= $this->endSection() ?>