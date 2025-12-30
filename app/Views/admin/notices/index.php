<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h4 class="mb-0">Manage Notices</h4>
        <p class="text-muted mb-0">Create and manage school notices</p>
    </div>
    <a href="<?= base_url('admin/notices/create') ?>" class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>Create Notice
    </a>
</div>

<!-- Search & Filter -->
<div class="card mb-3">
    <div class="card-body">
        <form method="get" action="<?= base_url('admin/notices') ?>" class="row g-3">
            <div class="col-md-10">
                <input type="text" class="form-control" name="search" placeholder="Search notices..."
                    value="<?= esc($search ?? '') ?>">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-search me-1"></i>Search
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Notices Table -->
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Priority</th>
                        <th>Audience</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($notices)): ?>
                        <?php foreach ($notices as $notice): ?>
                            <tr>
                                <td>
                                    <strong><?= esc($notice['title']) ?></strong><br>
                                    <small class="text-muted">
                                        <?= character_limiter(strip_tags($notice['content']), 80) ?>
                                    </small>
                                </td>
                                <td>
                                    <?php
                                    $badgeClass = $notice['priority'] === 'high' ? 'danger' :
                                        ($notice['priority'] === 'medium' ? 'warning' : 'info');
                                    ?>
                                    <span class="badge bg-<?= $badgeClass ?>">
                                        <?= ucfirst($notice['priority']) ?>
                                    </span>
                                </td>
                                <td><?= esc($notice['target_audience']) ?></td>
                                <td>
                                    <?php if ($notice['status'] == 1): ?>
                                        <span class="badge bg-success">Published</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Draft</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-muted small">
                                    <?= date('M d, Y', strtotime($notice['created_at'])) ?>
                                </td>
                                <td class="table-actions">
                                    <a href="<?= base_url('admin/notices/edit/' . $notice['id']) ?>"
                                        class="btn btn-sm btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="<?= base_url('admin/notices/delete/' . $notice['id']) ?>"
                                        class="btn btn-sm btn-danger" onclick="return confirm('Delete this notice?')"
                                        title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                No notices found. <a href="<?= base_url('admin/notices/create') ?>">Create one</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if (isset($pager)): ?>
            <div class="mt-3">
                <?= $pager->links() ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>