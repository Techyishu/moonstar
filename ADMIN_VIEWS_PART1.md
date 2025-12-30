# Admin Views - Complete Templates

This document contains all admin view templates. Create each file in the specified location.

---

## 1. Notices Form (`app/Views/admin/notices/form.php`)

```php
<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-3">
    <a href="<?= base_url('admin/notices') ?>" class="btn btn-sm btn-secondary">
        <i class="bi bi-arrow-left me-1"></i>Back to Notices
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><?= isset($notice) ? 'Edit Notice' : 'Create Notice' ?></h5>
    </div>
    <div class="card-body">
        <form action="<?= isset($notice) ? base_url('admin/notices/update/' . $notice['id']) : base_url('admin/notices/store') ?>" 
              method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" required
                               value="<?= old('title', $notice['title'] ?? '') ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Content <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="content" rows="8" required><?= old('content', $notice['content'] ?? '') ?></textarea>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Priority <span class="text-danger">*</span></label>
                        <select class="form-select" name="priority" required>
                            <option value="low" <?= (old('priority', $notice['priority'] ?? '') == 'low') ? 'selected' : '' ?>>Low</option>
                            <option value="medium" <?= (old('priority', $notice['priority'] ?? '') == 'medium') ? 'selected' : '' ?>>Medium</option>
                            <option value="high" <?= (old('priority', $notice['priority'] ?? '') == 'high') ? 'selected' : '' ?>>High</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Target Audience <span class="text-danger">*</span></label>
                        <select class="form-select" name="target_audience" required>
                            <option value="all" <?= (old('target_audience', $notice['target_audience'] ?? '') == 'all') ? 'selected' : '' ?>>All</option>
                            <option value="students" <?= (old('target_audience', $notice['target_audience'] ?? '') == 'students') ? 'selected' : '' ?>>Students</option>
                            <option value="parents" <?= (old('target_audience', $notice['target_audience'] ?? '') == 'parents') ? 'selected' : '' ?>>Parents</option>
                            <option value="staff" <?= (old('target_audience', $notice['target_audience'] ?? '') == 'staff') ? 'selected' : '' ?>>Staff</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Attachment (Optional)</label>
                        <input type="file" class="form-control" name="attachment">
                        <?php if (isset($notice['attachment']) && $notice['attachment']): ?>
                            <small class="text-muted">Current: <?= esc($notice['attachment']) ?></small>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" value="1" 
                                   <?= (old('status', $notice['status'] ?? 1) == 1) ? 'checked' : '' ?>>
                            <label class="form-check-label">Published</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i>Save Notice
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
```

---

## 2. Events Index (`app/Views/admin/events/index.php`)

```php
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
                <input type="text" class="form-control" name="search" 
                       placeholder="Search events..." value="<?= esc($search ?? '') ?>">
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
                                <small class="text-muted"><?= $event['event_time'] ? date('g:i A', strtotime($event['event_time'])) : 'All Day' ?></small>
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
                                <a href="<?= base_url('admin/events/delete/' . $event['id']) ?>" 
                                   class="btn btn-sm btn-danger" onclick="return confirm('Delete this event?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5" class="text-center text-muted py-4">No events found</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <?= $pager->links() ?? '' ?>
    </div>
</div>

<?= $this->endSection() ?>
```

---

## 3. Events Form (`app/Views/admin/events/form.php`)

```php
<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-3">
    <a href="<?= base_url('admin/events') ?>" class="btn btn-sm btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5><?= isset($event) ? 'Edit Event' : 'Create Event' ?></h5>
    </div>
    <div class="card-body">
        <form action="<?= isset($event) ? base_url('admin/events/update/' . $event['id']) : base_url('admin/events/store') ?>" 
              method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Title *</label>
                        <input type="text" class="form-control" name="title" required
                               value="<?= old('title', $event['title'] ?? '') ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Description *</label>
                        <textarea class="form-control" name="description" rows="6" required><?= old('description', $event['description'] ?? '') ?></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Event Date *</label>
                            <input type="date" class="form-control" name="event_date" required
                                   value="<?= old('event_date', $event['event_date'] ?? '') ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Event Time</label>
                            <input type="time" class="form-control" name="event_time"
                                   value="<?= old('event_time', $event['event_time'] ?? '') ?>">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" class="form-control" name="location"
                               value="<?= old('location', $event['location'] ?? '') ?>">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Event Image</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                        <?php if (isset($event['image']) && $event['image']): ?>
                            <img src="<?= base_url('uploads/events/' . $event['image']) ?>" 
                                 class="img-thumbnail mt-2" alt="Current">
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" value="1"
                               <?= (old('status', $event['status'] ?? 1) == 1) ? 'checked' : '' ?>>
                        <label class="form-check-label">Published</label>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Save Event
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
```

---

## 4. Admissions Index (`app/Views/admin/admissions/index.php`)

```php
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
                                <a href="<?= base_url('admin/admissions/view/' . $app['id']) ?>" 
                                   class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                                <a href="<?= base_url('admin/admissions/delete/' . $app['id']) ?>" 
                                   class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="7" class="text-center text-muted py-4">No applications found</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <?= $pager->links() ?? '' ?>
    </div>
</div>

<?= $this->endSection() ?>
```

---

## 5. Admissions View (`app/Views/admin/admissions/view.php`)

```php
<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-3">
    <a href="<?= base_url('admin/admissions') ?>" class="btn btn-sm btn-secondary">
        <i class="bi bi-arrow-left"></i> Back to Admissions
    </a>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Application Details</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="200">Application Number:</th>
                        <td><code><?= esc($admission['application_number']) ?></code></td>
                    </tr>
                    <tr>
                        <th>Student Name:</th>
                        <td><?= esc($admission['student_name']) ?></td>
                    </tr>
                    <tr>
                        <th>Date of Birth:</th>
                        <td><?= date('F d, Y', strtotime($admission['date_of_birth'])) ?></td>
                    </tr>
                    <tr>
                        <th>Gender:</th>
                        <td><?= ucfirst($admission['gender']) ?></td>
                    </tr>
                    <tr>
                        <th>Class Applied For:</th>
                        <td><?= esc($admission['class_applied']) ?></td>
                    </tr>
                    <tr>
                        <th>Previous School:</th>
                        <td><?= esc($admission['previous_school'] ?? 'N/A') ?></td>
                    </tr>
                    <tr>
                        <th>Parent/Guardian Name:</th>
                        <td><?= esc($admission['parent_name']) ?></td>
                    </tr>
                    <tr>
                        <th>Parent Email:</th>
                        <td><?= esc($admission['parent_email']) ?></td>
                    </tr>
                    <tr>
                        <th>Parent Phone:</th>
                        <td><?= esc($admission['parent_phone']) ?></td>
                    </tr>
                    <tr>
                        <th>Address:</th>
                        <td><?= nl2br(esc($admission['address'])) ?></td>
                    </tr>
                    <tr>
                        <th>Applied On:</th>
                        <td><?= date('F d, Y g:i A', strtotime($admission['created_at'])) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6>Update Status</h6>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/admissions/update-status/' . $admission['id']) ?>" method="post">
                    <?= csrf_field() ?>
                    
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status" required>
                            <option value="pending" <?= $admission['application_status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="accepted" <?= $admission['application_status'] == 'accepted' ? 'selected' : '' ?>>Accepted</option>
                            <option value="rejected" <?= $admission['application_status'] == 'rejected' ? 'selected' : '' ?>>Rejected</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Remarks</label>
                        <textarea class="form-control" name="remarks" rows="4"><?= esc($admission['remarks'] ?? '') ?></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-check-circle"></i> Update Status
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
```

---

**Continue in next file...**
