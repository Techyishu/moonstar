# Admin Views - Part 2 (Pages, Gallery, Users)

---

## 6. Pages Index (`app/Views/admin/pages/index.php`)

```php
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
```

---

## 7. Pages Form with TinyMCE (`app/Views/admin/pages/form.php`)

```php
<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-3">
    <a href="<?= base_url('admin/pages') ?>" class="btn btn-sm btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5><?= isset($page) ? 'Edit Page' : 'Create Page' ?></h5>
    </div>
    <div class="card-body">
        <form action="<?= isset($page) ? base_url('admin/pages/update/' . $page['id']) : base_url('admin/pages/store') ?>" 
              method="post">
            <?= csrf_field() ?>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Title *</label>
                    <input type="text" class="form-control" name="title" required
                           value="<?= old('title', $page['title'] ?? '') ?>" id="pageTitle">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Slug * <small class="text-muted">(URL-friendly)</small></label>
                    <input type="text" class="form-control" name="slug" required
                           value="<?= old('slug', $page['slug'] ?? '') ?>" id="pageSlug">
                    <small class="text-muted">Will be accessible at: /page/your-slug</small>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Content *</label>
                <textarea class="form-control" name="content" id="pageContent" rows="15"><?= old('content', $page['content'] ?? '') ?></textarea>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title"
                           value="<?= old('meta_title', $page['meta_title'] ?? '') ?>">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Meta Description</label>
                    <input type="text" class="form-control" name="meta_description"
                           value="<?= old('meta_description', $page['meta_description'] ?? '') ?>">
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="status" value="1"
                           <?= (old('status', $page['status'] ?? 1) == 1) ? 'checked' : '' ?>>
                    <label class="form-check-label">Published</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Save Page
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    // Auto-generate slug from title
    document.getElementById('pageTitle').addEventListener('input', function() {
        const slug = this.value.toLowerCase()
            .replace(/[^\w\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim();
        document.getElementById('pageSlug').value = slug;
    });
    
    // Initialize TinyMCE
    tinymce.init({
        selector: '#pageContent',
        height: 500,
        menubar: false,
        plugins: 'lists link image code table',
        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | link image | code',
        content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; font-size: 14px; }'
    });
</script>
<?= $this->endSection() ?>
```

---

## 8. Gallery Index (`app/Views/admin/gallery/index.php`)

```php
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
                    <option value="facilities" <?= ($category ?? '') == 'facilities' ? 'selected' : '' ?>>Facilities</option>
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
                    <img src="<?= base_url('uploads/gallery/' . $image['image_path']) ?>" 
                         class="card-img-top" alt="<?= esc($image['title']) ?>" 
                         style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h6 class="card-title"><?= esc($image['title']) ?></h6>
                        <p class="card-text small text-muted">
                            <span class="badge bg-info"><?= esc($image['category']) ?></span>
                        </p>
                        <div class="d-flex gap-2">
                            <a href="<?= base_url('admin/gallery/edit/' . $image['id']) ?>" 
                               class="btn btn-sm btn-warning flex-fill">Edit</a>
                            <a href="<?= base_url('admin/gallery/delete/' . $image['id']) ?>" 
                               class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12">
            <div class="alert alert-info text-center">No images found. <a href="<?= base_url('admin/gallery/upload') ?>">Upload some</a></div>
        </div>
    <?php endif; ?>
</div>

<?php if (isset($pager)): ?>
    <div class="mt-4"><?= $pager->links() ?></div>
<?php endif; ?>

<?= $this->endSection() ?>
```

---

## 9. Gallery Upload (`app/Views/admin/gallery/upload.php`)

```php
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
                        <label class="form-label">Image * <small class="text-muted">(Max 5MB, will be resized to 1600px)</small></label>
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
```

---

## 10. Gallery Edit (`app/Views/admin/gallery/edit.php`)

```php
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
```

---

## 11. Users Index (`app/Views/admin/users/index.php`)

```php
<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between mb-3">
    <h4>Manage Users</h4>
    <a href="<?= base_url('admin/users/create') ?>" class="btn btn-primary">
        <i class="bi bi-person-plus"></i> Create User
    </a>
</div>

<div class="card mb-3">
    <div class="card-body">
        <form method="get" class="row g-3">
            <div class="col-md-6">
                <input type="text" class="form-control" name="search" placeholder="Search users..." value="<?= esc($search ?? '') ?>">
            </div>
            <div class="col-md-4">
                <select class="form-select" name="role">
                    <option value="">All Roles</option>
                    <option value="superadmin" <?= ($role ?? '') == 'superadmin' ? 'selected' : '' ?>>Superadmin</option>
                    <option value="staff" <?= ($role ?? '') == 'staff' ? 'selected' : '' ?>>Staff</option>
                    <option value="admission_officer" <?= ($role ?? '') == 'admission_officer' ? 'selected' : '' ?>>Admission Officer</option>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><strong><?= esc($user['name']) ?></strong></td>
                            <td><?= esc($user['email']) ?></td>
                            <td><span class="badge bg-primary"><?= ucfirst(str_replace('_', ' ', $user['role'])) ?></span></td>
                            <td>
                                <span class="badge bg-<?= $user['status'] == 1 ? 'success' : 'secondary' ?>">
                                    <?= $user['status'] == 1 ? 'Active' : 'Inactive' ?>
                                </span>
                            </td>
                            <td class="small text-muted"><?= date('M d, Y', strtotime($user['created_at'])) ?></td>
                            <td class="table-actions">
                                <a href="<?= base_url('admin/users/edit/' . $user['id']) ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <?php if ($user['id'] != session()->get('user_id')): ?>
                                    <a href="<?= base_url('admin/users/delete/' . $user['id']) ?>" 
                                       class="btn btn-sm btn-danger" onclick="return confirm('Delete this user?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6" class="text-center text-muted py-4">No users found</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <?= $pager->links() ?? '' ?>
    </div>
</div>

<?= $this->endSection() ?>
```

---

## 12. Users Form (`app/Views/admin/users/form.php`)

```php
<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-3">
    <a href="<?= base_url('admin/users') ?>" class="btn btn-sm btn-secondary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5><?= isset($user) ? 'Edit User' : 'Create User' ?></h5>
    </div>
    <div class="card-body">
        <form action="<?= isset($user) ? base_url('admin/users/update/' . $user['id']) : base_url('admin/users/store') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name *</label>
                    <input type="text" class="form-control" name="name" required value="<?= old('name', $user['name'] ?? '') ?>">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email *</label>
                    <input type="email" class="form-control" name="email" required value="<?= old('email', $user['email'] ?? '') ?>">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Password <?= isset($user) ? '(leave blank to keep current)' : '*' ?></label>
                    <input type="password" class="form-control" name="password" <?= !isset($user) ? 'required' : '' ?>>
                    <?php if (!isset($user)): ?>
                        <small class="text-muted">Minimum 6 characters</small>
                    <?php endif; ?>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Role *</label>
                    <select class="form-select" name="role" required>
                        <option value="superadmin" <?= (old('role', $user['role'] ?? '') == 'superadmin') ? 'selected' : '' ?>>Superadmin</option>
                        <option value="staff" <?= (old('role', $user['role'] ?? '') == 'staff') ? 'selected' : '' ?>>Staff</option>
                        <option value="admission_officer" <?= (old('role', $user['role'] ?? '') == 'admission_officer') ? 'selected' : '' ?>>Admission Officer</option>
                    </select>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="status" value="1"
                           <?= (old('status', $user['status'] ?? 1) == 1) ? 'checked' : '' ?>>
                    <label class="form-check-label">Active</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Save User
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
```

---

**All critical admin views are now complete!**

**Next: Update routes and create upload directories.**
