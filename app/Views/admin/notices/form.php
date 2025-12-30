<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <a href="<?= base_url('admin/notices') ?>" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-700">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to Notices
    </a>
</div>

<div class="bg-white rounded-lg shadow border border-slate-200 overflow-hidden">
    <div class="border-b border-slate-200 px-6 py-4">
        <h3 class="text-lg font-medium leading-6 text-slate-900"><?= isset($notice) ? 'Edit Notice' : 'Create Notice' ?></h3>
    </div>
    
    <form action="<?= isset($notice) ? base_url('admin/notices/update/' . $notice['id']) : base_url('admin/notices/store') ?>" 
          method="post" enctype="multipart/form-data" class="p-6">
        <?= csrf_field() ?>
        
        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            
            <!-- Main Content Column -->
            <div class="sm:col-span-4 space-y-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-slate-700">Title <span class="text-red-500">*</span></label>
                    <div class="mt-1">
                        <input type="text" name="title" id="title" required
                               value="<?= old('title', $notice['title'] ?? '') ?>"
                               class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                    </div>
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-slate-700">Content <span class="text-red-500">*</span></label>
                    <div class="mt-1">
                        <textarea id="content" name="content" rows="8" required
                                  class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border"><?= old('content', $notice['content'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Sidebar Column -->
            <div class="sm:col-span-2 space-y-6">
                <div class="bg-slate-50 p-4 rounded-md border border-slate-200 space-y-4">
                    <div>
                        <label for="priority" class="block text-sm font-medium text-slate-700">Priority <span class="text-red-500">*</span></label>
                        <select id="priority" name="priority" required
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                            <option value="low" <?= (old('priority', $notice['priority'] ?? '') == 'low') ? 'selected' : '' ?>>Low</option>
                            <option value="medium" <?= (old('priority', $notice['priority'] ?? '') == 'medium') ? 'selected' : '' ?>>Medium</option>
                            <option value="high" <?= (old('priority', $notice['priority'] ?? '') == 'high') ? 'selected' : '' ?>>High</option>
                        </select>
                    </div>

                    <div>
                        <label for="target_audience" class="block text-sm font-medium text-slate-700">Target Audience <span class="text-red-500">*</span></label>
                        <select id="target_audience" name="target_audience" required
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                            <option value="all" <?= (old('target_audience', $notice['target_audience'] ?? '') == 'all') ? 'selected' : '' ?>>All</option>
                            <option value="students" <?= (old('target_audience', $notice['target_audience'] ?? '') == 'students') ? 'selected' : '' ?>>Students</option>
                            <option value="parents" <?= (old('target_audience', $notice['target_audience'] ?? '') == 'parents') ? 'selected' : '' ?>>Parents</option>
                            <option value="staff" <?= (old('target_audience', $notice['target_audience'] ?? '') == 'staff') ? 'selected' : '' ?>>Staff</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700">Attachment</label>
                        <input type="file" name="attachment" class="mt-1 block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-primary-50 file:text-primary-700
                            hover:file:bg-primary-100">
                        <?php if (isset($notice['attachment']) && $notice['attachment']): ?>
                            <p class="mt-2 text-xs text-slate-500 truncate">Current: <?= esc($notice['attachment']) ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="flex items-start">
                        <div class="flex h-5 items-center">
                            <input id="status" name="status" type="checkbox" value="1"
                                   <?= (old('status', $notice['status'] ?? 1) == 1) ? 'checked' : '' ?>
                                   class="h-4 w-4 rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="status" class="font-medium text-slate-700">Published</label>
                            <p class="text-slate-500">Visible to target audience.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="<?= base_url('admin/notices') ?>" type="button" class="text-sm font-semibold leading-6 text-slate-900">Cancel</a>
            <button type="submit"
                    class="rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                Save Notice
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
