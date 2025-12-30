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
