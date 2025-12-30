<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="sm:flex sm:items-center sm:justify-between mb-8">
    <div>
        <h1 class="text-xl font-semibold text-slate-900">Manage Gallery</h1>
        <p class="mt-2 text-sm text-slate-700">Upload and manage images for the school gallery.</p>
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <a href="<?= base_url('admin/gallery/upload') ?>"
            class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 sm:w-auto">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
            </svg>
            Upload Images
        </a>
    </div>
</div>

<!-- Filter -->
<div class="bg-white rounded-lg shadow border border-slate-200 mb-6 p-4">
    <form method="get" class="flex gap-4">
        <div class="flex-1">
            <select name="category"
                class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                <option value="">All Categories</option>
                <option value="events" <?= ($category ?? '') == 'events' ? 'selected' : '' ?>>Events</option>
                <option value="academics" <?= ($category ?? '') == 'academics' ? 'selected' : '' ?>>Academics</option>
                <option value="sports" <?= ($category ?? '') == 'sports' ? 'selected' : '' ?>>Sports</option>
                <option value="facilities" <?= ($category ?? '') == 'facilities' ? 'selected' : '' ?>>Facilities</option>
            </select>
        </div>
        <button type="submit"
            class="inline-flex items-center rounded-md border border-transparent bg-slate-800 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
            </svg>
            Filter
        </button>
    </form>
</div>

<!-- Gallery Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <?php if (!empty($images)): ?>
        <?php foreach ($images as $image): ?>
            <div class="bg-white rounded-lg shadow border border-slate-200 overflow-hidden group">
                <div class="relative h-48 bg-slate-200 overflow-hidden">
                    <img src="<?= base_url('uploads/gallery/' . $image['image_path']) ?>"
                        class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-105"
                        alt="<?= esc($image['title']) ?>">
                    <div class="absolute top-2 right-2">
                        <span
                            class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-white/90 text-slate-800 shadow-sm backdrop-blur-sm">
                            <?= ucfirst($image['category']) ?>
                        </span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-sm font-medium text-slate-900 truncate"><?= esc($image['title']) ?></h3>
                    <div class="mt-4 flex items-center justify-between">
                        <a href="<?= base_url('admin/gallery/edit/' . $image['id']) ?>"
                            class="text-xs font-medium text-primary-600 hover:text-primary-500">Edit</a>
                        <a href="<?= base_url('admin/gallery/delete/' . $image['id']) ?>"
                            onclick="return confirm('Delete this image?')"
                            class="text-xs font-medium text-red-600 hover:text-red-500">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-span-full">
            <div class="text-center py-12 bg-white rounded-lg border-2 border-dashed border-slate-300">
                <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <p class="mt-2 text-sm text-slate-500">No images found.</p>
                <div class="mt-6">
                    <a href="<?= base_url('admin/gallery/upload') ?>"
                        class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        Upload Image
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php if (isset($pager)): ?>
    <div class="mt-8">
        <?= $pager->links() ?>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>