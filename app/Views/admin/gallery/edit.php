<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-3">
    <a href="<?= base_url('admin/gallery') ?>" class="btn btn-sm btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5>Edit Image</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/gallery/update/' . $image['id']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Current Image</label><br>
                        <img src="<?= base_url('uploads/gallery/' . $image['image_path']) ?>" 
                             class="img-thumbnail" alt="Current" style="max-width: 300px;">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Replace Image (Optional)</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Title *</label>
                        <input type="text" class="form-control" name="title" required value="<?= esc($image['title']) ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="3"><?= esc($image['description'] ?? '') ?></textarea>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Category *</label>
                        <select class="form-select" name="category" required>
                            <option value="events" <?= $image['category'] == 'events' ? 'selected' : '' ?>>Events</option>
                            <option value="academics" <?= $image['category'] == 'academics' ? 'selected' : '' ?>>Academics</option>
                            <option value="sports" <?= $image['category'] == 'sports' ? 'selected' : '' ?>>Sports</option>
                            <option value="facilities" <?= $image['category'] == 'facilities' ? 'selected' : '' ?>>Facilities</option>
                            <option value="general" <?= $image['category'] == 'general' ? 'selected' : '' ?>>General</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Display Order</label>
                        <input type="number" class="form-control" name="display_order" value="<?= esc($image['display_order']) ?>">
                    </div>
                    
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" value="1" 
                               <?= $image['status'] == 1 ? 'checked' : '' ?>>
                        <label class="form-check-label">Published</label>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Update Image
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
