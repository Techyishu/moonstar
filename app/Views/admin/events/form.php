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
