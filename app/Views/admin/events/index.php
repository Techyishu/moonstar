<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Manage Events</h4>
    <a href="<?= base_url('admin/events/create') ?>" class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>Create Event
    </a>
</div>

<div class="card mb-3">
    <div class="card-body">
        <form method="get" class="row g-3">
            <div class="col-md-10">
                <input type="text" class="form-control" name="search" placeholder="Search events..."
                    value="<?= esc($search ?? '') ?>">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-search"></i> Search
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date & Time</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($events)): ?>
                    <?php foreach ($events as $event): ?>
                        <tr>
                            <td><strong><?= esc($event['title']) ?></strong></td>
                            <td><?= date('M d, Y', strtotime($event['event_date'])) ?><br>
                                <small
                                    class="text-muted"><?= $event['event_time'] ? date('g:i A', strtotime($event['event_time'])) : 'All Day' ?></small>
                            </td>
                            <td><?= esc($event['location'] ?? '-') ?></td>
                            <td>
                                <span class="badge bg-<?= $event['status'] == 1 ? 'success' : 'secondary' ?>">
                                    <?= $event['status'] == 1 ? 'Published' : 'Draft' ?>
                                </span>
                            </td>
                            <td class="table-actions">
                                <a href="<?= base_url('admin/events/edit/' . $event['id']) ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="<?= base_url('admin/events/delete/' . $event['id']) ?>" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this event?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">No events found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <?= $pager->links() ?? '' ?>
    </div>
</div>

<?= $this->endSection() ?>