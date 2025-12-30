<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-3">
    <a href="<?= base_url('admin/gallery') ?>" class="btn btn-sm btn-secondary">
        <i class="bi bi-arrow-left"></i> Back to Gallery
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5>Upload Image</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/gallery/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Image * <small class="text-muted">(Max 5MB, will be resized to
                                1600px)</small></label>
                        <input type="file" class="form-control" name="image" required accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Title *</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Category *</label>
                        <select class="form-select" name="category" required>
                            <option value="events">Events</option>
                            <option value="academics">Academics</option>
                            <option value="sports">Sports</option>
                            <option value="facilities">Facilities</option>
                            <option value="general">General</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Display Order</label>
                        <input type="number" class="form-control" name="display_order" value="0">
                        <small class="text-muted">Lower numbers appear first</small>
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" value="1" checked>
                        <label class="form-check-label">Published</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-cloud-upload"></i> Upload Image
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>