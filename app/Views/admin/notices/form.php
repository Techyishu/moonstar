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
