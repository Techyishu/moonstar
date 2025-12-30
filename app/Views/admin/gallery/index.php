<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between mb-3">
    <h4>Manage Gallery</h4>
    <a href="<?= base_url('admin/gallery/upload') ?>" class="btn btn-primary">
        <i class="bi bi-cloud-upload"></i> Upload Images
    </a>
</div>

<div class="card mb-3">
    <div class="card-body">
        <form method="get" class="row g-3">
            <div class="col-md-10">
                <select class="form-select" name="category">
                    <option value="">All Categories</option>
                    <option value="events" <?= ($category ?? '') == 'events' ? 'selected' : '' ?>>Events</option>
                    <option value="academics" <?= ($category ?? '') == 'academics' ? 'selected' : '' ?>>Academics</option>
                    <option value="sports" <?= ($category ?? '') == 'sports' ? 'selected' : '' ?>>Sports</option>
                    <option value="facilities" <?= ($category ?? '') == 'facilities' ? 'selected' : '' ?>>Facilities
                    </option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100"><i class="bi bi-filter"></i> Filter</button>
            </div>
        </form>
    </div>
</div>

<div class="row g-3">
    <?php if (!empty($images)): ?>
        <?php foreach ($images as $image): ?>
            <div class="col-md-3">
                <div class="card">
                    <img src="<?= base_url('uploads/gallery/' . $image['image_path']) ?>" class="card-img-top"
                        alt="<?= esc($image['title']) ?>" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h6 class="card-title"><?= esc($image['title']) ?></h6>
                        <p class="card-text small text-muted">
                            <span class="badge bg-info"><?= esc($image['category']) ?></span>
                        </p>
                        <div class="d-flex gap-2">
                            <a href="<?= base_url('admin/gallery/edit/' . $image['id']) ?>"
                                class="btn btn-sm btn-warning flex-fill">Edit</a>
                            <a href="<?= base_url('admin/gallery/delete/' . $image['id']) ?>" class="btn btn-sm btn-danger"
                                onclick="return confirm('Delete?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12">
            <div class="alert alert-info text-center">No images found. <a
                    href="<?= base_url('admin/gallery/upload') ?>">Upload some</a></div>
        </div>
    <?php endif; ?>
</div>

<?php if (isset($pager)): ?>
    <div class="mt-4"><?= $pager->links() ?></div>
<?php endif; ?>

<?= $this->endSection() ?>