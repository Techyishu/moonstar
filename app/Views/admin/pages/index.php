<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between mb-3">
    <h4>Manage Pages</h4>
    <a href="<?= base_url('admin/pages/create') ?>" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Create Page
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Last Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pages)): ?>
                    <?php foreach ($pages as $page): ?>
                        <tr>
                            <td><strong><?= esc($page['title']) ?></strong></td>
                            <td><code><?= esc($page['slug']) ?></code></td>
                            <td>
                                <span class="badge bg-<?= $page['status'] == 1 ? 'success' : 'secondary' ?>">
                                    <?= $page['status'] == 1 ? 'Published' : 'Draft' ?>
                                </span>
                            </td>
                            <td class="small text-muted"><?= date('M d, Y', strtotime($page['updated_at'])) ?></td>
                            <td class="table-actions">
                                <a href="<?= base_url('page/' . $page['slug']) ?>" class="btn btn-sm btn-info" target="_blank">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="<?= base_url('admin/pages/edit/' . $page['id']) ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="<?= base_url('admin/pages/delete/' . $page['id']) ?>" class="btn btn-sm btn-danger"
                                   onclick="return confirm('Delete this page?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5" class="text-center text-muted py-4">No pages found</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <?= $pager->links() ?? '' ?>
    </div>
</div>

<?= $this->endSection() ?>
