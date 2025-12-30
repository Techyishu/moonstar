<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="sm:flex sm:items-center sm:justify-between mb-8">
    <div>
        <h1 class="text-xl font-semibold text-slate-900">Manage Pages</h1>
        <p class="mt-2 text-sm text-slate-700">Create and edit static pages for your website.</p>
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <a href="<?= base_url('admin/pages/create') ?>"
            class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 sm:w-auto">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Create Page
        </a>
    </div>
</div>

<!-- Pages Table -->
<div class="overflow-hidden bg-white shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
    <table class="min-w-full divide-y divide-slate-300">
        <thead class="bg-slate-50">
            <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-slate-900 sm:pl-6">Title
                </th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">Slug</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">Status</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">Last Updated</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Actions</span>
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 bg-white">
            <?php if (!empty($pages)): ?>
                <?php foreach ($pages as $page): ?>
                    <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-slate-900 sm:pl-6">
                            <?= esc($page['title']) ?>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm font-mono text-slate-500">
                            <?= esc($page['slug']) ?>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-500">
                            <?php if ($page['status'] == 1): ?>
                                <span
                                    class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Published</span>
                            <?php else: ?>
                                <span
                                    class="inline-flex rounded-full bg-slate-100 px-2 text-xs font-semibold leading-5 text-slate-800">Draft</span>
                            <?php endif; ?>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-500">
                            <?= date('M d, Y', strtotime($page['updated_at'])) ?>
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <a href="<?= base_url('page/' . $page['slug']) ?>" target="_blank"
                                class="text-slate-400 hover:text-slate-600 mr-4" title="View">
                                <span class="sr-only">View</span>
                                <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                            <a href="<?= base_url('admin/pages/edit/' . $page['id']) ?>"
                                class="text-primary-600 hover:text-primary-900 mr-4">Edit</a>
                            <a href="<?= base_url('admin/pages/delete/' . $page['id']) ?>"
                                onclick="return confirm('Delete this page?')" class="text-red-600 hover:text-red-900">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-sm text-slate-500">
                        No pages found. <a href="<?= base_url('admin/pages/create') ?>"
                            class="text-primary-600 hover:text-primary-500">Create one</a>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php if (isset($pager)): ?>
    <div class="mt-4">
        <?= $pager->links() ?>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>