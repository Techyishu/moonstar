<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <a href="<?= base_url('admin/pages') ?>" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-700">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to Pages
    </a>
</div>

<div class="bg-white rounded-lg shadow border border-slate-200 overflow-hidden">
    <div class="border-b border-slate-200 px-6 py-4">
        <h3 class="text-lg font-medium leading-6 text-slate-900"><?= isset($page) ? 'Edit Page' : 'Create Page' ?></h3>
    </div>
    
    <form action="<?= isset($page) ? base_url('admin/pages/update/' . $page['id']) : base_url('admin/pages/store') ?>" 
          method="post" class="p-6">
        <?= csrf_field() ?>
        
        <div class="grid grid-cols-1 gap-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-slate-700">Title <span class="text-red-500">*</span></label>
                    <div class="mt-1">
                        <input type="text" name="title" id="pageTitle" required
                               value="<?= old('title', $page['title'] ?? '') ?>"
                               class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                    </div>
                </div>

                <div>
                    <label for="slug" class="block text-sm font-medium text-slate-700">Slug <span class="text-red-500">*</span></label>
                    <div class="mt-1">
                        <input type="text" name="slug" id="pageSlug" required
                               value="<?= old('slug', $page['slug'] ?? '') ?>"
                               class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border bg-slate-50">
                        <p class="mt-1 text-xs text-slate-500">URL-friendly version of the title. Accessible at: /page/your-slug</p>
                    </div>
                </div>
            </div>

            <div>
                <label for="pageContent" class="block text-sm font-medium text-slate-700 mb-2">Content <span class="text-red-500">*</span></label>
                <textarea name="content" id="pageContent" rows="15"
                          class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border"><?= old('content', $page['content'] ?? '') ?></textarea>
            </div>

            <div class="bg-slate-50 p-4 rounded-md border border-slate-200">
                <h4 class="text-sm font-medium text-slate-900 mb-4">SEO Settings</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                     <div>
                        <label for="meta_title" class="block text-sm font-medium text-slate-700">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title"
                               value="<?= old('meta_title', $page['meta_title'] ?? '') ?>"
                               class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                    </div>
                    <div>
                        <label for="meta_description" class="block text-sm font-medium text-slate-700">Meta Description</label>
                        <input type="text" name="meta_description" id="meta_description"
                               value="<?= old('meta_description', $page['meta_description'] ?? '') ?>"
                               class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                    </div>
                </div>
            </div>

            <div class="flex items-start">
                <div class="flex h-5 items-center">
                    <input id="status" name="status" type="checkbox" value="1"
                           <?= (old('status', $page['status'] ?? 1) == 1) ? 'checked' : '' ?>
                           class="h-4 w-4 rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                </div>
                <div class="ml-3 text-sm">
                    <label for="status" class="font-medium text-slate-700">Published</label>
                    <p class="text-slate-500">Visible to the public.</p>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="<?= base_url('admin/pages') ?>" class="text-sm font-semibold leading-6 text-slate-900">Cancel</a>
            <button type="submit"
                    class="rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                Save Page
            </button>
        </div>
    </form>
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
