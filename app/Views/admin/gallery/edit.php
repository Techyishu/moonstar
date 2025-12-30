<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <a href="<?= base_url('admin/gallery') ?>" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-700">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to Gallery
    </a>
</div>

<div class="bg-white rounded-lg shadow border border-slate-200 overflow-hidden">
    <div class="border-b border-slate-200 px-6 py-4">
        <h3 class="text-lg font-medium leading-6 text-slate-900">Edit Image</h3>
    </div>
    
    <form action="<?= base_url('admin/gallery/update/' . $image['id']) ?>" method="post" enctype="multipart/form-data" class="p-6">
        <?= csrf_field() ?>
        
        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <!-- Main Content -->
            <div class="sm:col-span-4 space-y-6">
                <div>
                     <label class="block text-sm font-medium text-slate-700 mb-2">Current Image</label>
                     <div class="relative h-64 w-full bg-slate-100 rounded-lg overflow-hidden border border-slate-200">
                         <img src="<?= base_url('uploads/gallery/' . $image['image_path']) ?>" 
                              alt="Current" class="h-full w-full object-contain">
                     </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700">Replace Image (Optional)</label>
                    <input type="file" name="image" accept="image/*" class="mt-1 block w-full text-sm text-slate-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-primary-50 file:text-primary-700
                        hover:file:bg-primary-100">
                </div>

                <div>
                    <label for="title" class="block text-sm font-medium text-slate-700">Title <span class="text-red-500">*</span></label>
                    <div class="mt-1">
                        <input type="text" name="title" id="title" required value="<?= esc($image['title']) ?>"
                               class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-slate-700">Description</label>
                    <div class="mt-1">
                        <textarea id="description" name="description" rows="3"
                                  class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border"><?= esc($image['description'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="sm:col-span-2 space-y-6">
                <div class="bg-slate-50 p-4 rounded-md border border-slate-200 space-y-4">
                    <div>
                        <label for="category" class="block text-sm font-medium text-slate-700">Category <span class="text-red-500">*</span></label>
                        <select id="category" name="category" required
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                            <option value="events" <?= $image['category'] == 'events' ? 'selected' : '' ?>>Events</option>
                            <option value="academics" <?= $image['category'] == 'academics' ? 'selected' : '' ?>>Academics</option>
                            <option value="sports" <?= $image['category'] == 'sports' ? 'selected' : '' ?>>Sports</option>
                            <option value="facilities" <?= $image['category'] == 'facilities' ? 'selected' : '' ?>>Facilities</option>
                            <option value="general" <?= $image['category'] == 'general' ? 'selected' : '' ?>>General</option>
                        </select>
                    </div>

                    <div>
                        <label for="display_order" class="block text-sm font-medium text-slate-700">Display Order</label>
                        <input type="number" name="display_order" id="display_order" value="<?= esc($image['display_order']) ?>"
                               class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                    </div>

                    <div class="flex items-start">
                        <div class="flex h-5 items-center">
                            <input id="status" name="status" type="checkbox" value="1" 
                                   <?= $image['status'] == 1 ? 'checked' : '' ?>
                                   class="h-4 w-4 rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="status" class="font-medium text-slate-700">Published</label>
                            <p class="text-slate-500">Visible on the website.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="<?= base_url('admin/gallery') ?>" class="text-sm font-semibold leading-6 text-slate-900">Cancel</a>
            <button type="submit"
                    class="rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                Update Image
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
