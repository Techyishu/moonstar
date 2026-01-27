<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <a href="<?= base_url('admin/gallery') ?>"
        class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-700">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to Gallery
    </a>
</div>

<div class="bg-white rounded-lg shadow border border-slate-200 overflow-hidden" x-data="{ activeTab: 'single' }">
    <!-- Tab Headers -->
    <div class="border-b border-slate-200">
        <nav class="flex -mb-px">
            <button @click="activeTab = 'single'"
                :class="activeTab === 'single' ? 'border-primary-500 text-primary-600 bg-primary-50' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300'"
                class="px-6 py-4 text-sm font-medium border-b-2 transition-colors flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Single Upload
            </button>
            <button @click="activeTab = 'bulk'"
                :class="activeTab === 'bulk' ? 'border-primary-500 text-primary-600 bg-primary-50' : 'border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300'"
                class="px-6 py-4 text-sm font-medium border-b-2 transition-colors flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                Bulk Upload
            </button>
        </nav>
    </div>

    <!-- Single Upload Tab -->
    <div x-show="activeTab === 'single'" x-transition>
        <form action="<?= base_url('admin/gallery/store') ?>" method="post" enctype="multipart/form-data" class="p-6">
            <?= csrf_field() ?>

            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <!-- Main Content -->
                <div class="sm:col-span-4 space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Image <span
                                class="text-red-500">*</span></label>
                        <div
                            class="mt-2 flex justify-center rounded-md border-2 border-dashed border-slate-300 px-6 pt-5 pb-6">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-slate-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-slate-600">
                                    <label for="image-upload"
                                        class="relative cursor-pointer rounded-md bg-white font-medium text-primary-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-primary-500 focus-within:ring-offset-2 hover:text-primary-500">
                                        <span>Upload a file</span>
                                        <input id="image-upload" name="image" type="file" class="sr-only" required
                                            accept="image/*">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-slate-500">PNG, JPG, GIF up to 5MB</p>
                                <p class="text-xs text-slate-400">Will be resized to 1600px width</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="title" class="block text-sm font-medium text-slate-700">Title <span
                                class="text-red-500">*</span></label>
                        <div class="mt-1">
                            <input type="text" name="title" id="title" required
                                class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-slate-700">Description</label>
                        <div class="mt-1">
                            <textarea id="description" name="description" rows="3"
                                class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="sm:col-span-2 space-y-6">
                    <div class="bg-slate-50 p-4 rounded-md border border-slate-200 space-y-4">
                        <div>
                            <label for="category" class="block text-sm font-medium text-slate-700">Category <span
                                    class="text-red-500">*</span></label>
                            <select id="category" name="category" required
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                                <option value="events">Events</option>
                                <option value="academics">Academics</option>
                                <option value="sports">Sports</option>
                                <option value="facilities">Facilities</option>
                                <option value="general">General</option>
                            </select>
                        </div>

                        <div>
                            <label for="display_order" class="block text-sm font-medium text-slate-700">Display
                                Order</label>
                            <input type="number" name="display_order" id="display_order" value="0"
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                            <p class="mt-1 text-xs text-slate-500">Lower numbers appear first.</p>
                        </div>

                        <div class="flex items-start">
                            <div class="flex h-5 items-center">
                                <input id="status" name="status" type="checkbox" value="1" checked
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
                <a href="<?= base_url('admin/gallery') ?>"
                    class="text-sm font-semibold leading-6 text-slate-900">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                    Upload Image
                </button>
            </div>
        </form>
    </div>

    <!-- Bulk Upload Tab -->
    <div x-show="activeTab === 'bulk'" x-transition x-cloak>
        <form action="<?= base_url('admin/gallery/bulk-store') ?>" method="post" enctype="multipart/form-data"
            class="p-6">
            <?= csrf_field() ?>

            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                <div class="flex">
                    <svg class="h-5 w-5 text-blue-400 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <h4 class="text-sm font-medium text-blue-800">Bulk Upload Mode</h4>
                        <p class="text-sm text-blue-700 mt-1">Quickly upload multiple images at once. All images go to
                            "General" category without titles. You can edit individual images later.</p>
                        <div class="mt-2 text-xs text-blue-600 font-mono bg-blue-100/50 p-2 rounded">
                            Server Limits:
                            Max File Size: <strong><?= ini_get('upload_max_filesize') ?></strong> |
                            Max Post Size: <strong><?= ini_get('post_max_size') ?></strong>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <!-- Main Content -->
                <div class="sm:col-span-4 space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Select Images <span
                                class="text-red-500">*</span></label>
                        <div class="mt-2 flex justify-center rounded-md border-2 border-dashed border-slate-300 px-6 pt-5 pb-6 hover:border-primary-400 transition-colors"
                            id="bulk-drop-zone">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-slate-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-slate-600 justify-center">
                                    <label for="bulk-images"
                                        class="relative cursor-pointer rounded-md bg-white font-medium text-primary-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-primary-500 focus-within:ring-offset-2 hover:text-primary-500">
                                        <span>Select multiple files</span>
                                        <input id="bulk-images" name="images[]" type="file" class="sr-only" required
                                            accept="image/*" multiple>
                                    </label>
                                </div>
                                <p class="text-xs text-slate-500">PNG, JPG, GIF up to 5MB each</p>
                                <p class="text-xs text-slate-400">Hold Ctrl/Cmd to select multiple files</p>
                            </div>
                        </div>
                        <div id="selected-files" class="mt-4 hidden">
                            <p class="text-sm font-medium text-slate-700 mb-2">Selected files:</p>
                            <ul id="file-list" class="text-sm text-slate-600 space-y-1 max-h-48 overflow-y-auto"></ul>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="sm:col-span-2 space-y-6">
                    <div class="bg-slate-50 p-4 rounded-md border border-slate-200 space-y-4">
                        <div class="flex items-center gap-3 pb-3 border-b border-slate-200">
                            <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary-600" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-900">Category</p>
                                <p class="text-sm text-primary-600 font-semibold">General</p>
                            </div>
                        </div>

                        <div class="bg-blue-50 border border-blue-200 rounded p-3">
                            <p class="text-xs text-blue-700">
                                <strong>Quick Upload:</strong> All images will be added to the "General" category
                                without titles. Perfect for quickly adding photos.
                            </p>
                        </div>

                        <div class="bg-amber-50 border border-amber-200 rounded p-3">
                            <p class="text-xs text-amber-700">
                                <strong>Note:</strong> Images are published immediately. You can edit category and add
                                titles later from the gallery.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="<?= base_url('admin/gallery') ?>"
                    class="text-sm font-semibold leading-6 text-slate-900">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-primary-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    Upload All Images
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('bulk-images').addEventListener('change', function (e) {
        const files = e.target.files;
        const selectedDiv = document.getElementById('selected-files');
        const fileList = document.getElementById('file-list');

        if (files.length > 0) {
            selectedDiv.classList.remove('hidden');
            fileList.innerHTML = '';

            for (let i = 0; i < files.length; i++) {
                const li = document.createElement('li');
                li.className = 'flex items-center gap-2 py-1 px-2 bg-white rounded border border-slate-200';
                li.innerHTML = `
                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="truncate">${files[i].name}</span>
                    <span class="text-slate-400 text-xs">(${(files[i].size / 1024).toFixed(1)} KB)</span>
                `;
                fileList.appendChild(li);
            }
        } else {
            selectedDiv.classList.add('hidden');
        }
    });

    // Console logs for debugging
    <?php if (session()->has('api_errors')): ?>
        console.group('Bulk Upload Errors');
        <?php foreach (session('api_errors') as $error): ?>
            console.error('<?= esc($error) ?>');
        <?php endforeach; ?>
        console.groupEnd();
    <?php endif; ?>

    <?php if (session()->has('error')): ?>
        console.error('Upload Error:', '<?= esc(session('error')) ?>');
    <?php endif; ?>
</script>

<?= $this->endSection() ?>