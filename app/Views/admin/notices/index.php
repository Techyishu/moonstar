<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="sm:flex sm:items-center sm:justify-between mb-8">
    <div>
        <h1 class="text-xl font-semibold text-slate-900">Manage Notices</h1>
        <p class="mt-2 text-sm text-slate-700">A list of all notices including their title, priority, and status.</p>
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <a href="<?= base_url('admin/notices/create') ?>"
            class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 sm:w-auto">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Create Notice
        </a>
    </div>
</div>

<!-- Search & Filter -->
<div class="bg-white rounded-lg shadow border border-slate-200 mb-6 p-4">
    <form method="get" action="<?= base_url('admin/notices') ?>" class="flex gap-4">
        <div class="flex-1">
            <input type="text" name="search" placeholder="Search notices..." value="<?= esc($search ?? '') ?>"
                class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
        </div>
        <button type="submit"
            class="inline-flex items-center rounded-md border border-transparent bg-slate-800 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            Search
        </button>
    </form>
</div>

<!-- Notices Table -->
<div class="overflow-hidden bg-white shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
    <table class="min-w-full divide-y divide-slate-300">
        <thead class="bg-slate-50">
            <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-slate-900 sm:pl-6">Title
                </th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">Priority</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">Audience</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">Status</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">Created</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Actions</span>
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 bg-white">
            <?php if (!empty($notices)): ?>
                <?php foreach ($notices as $notice): ?>
                    <tr>
                        <td class="whitespace-normal py-4 pl-4 pr-3 text-sm sm:pl-6">
                            <div class="font-medium text-slate-900"><?= esc($notice['title']) ?></div>
                            <div class="text-slate-500 truncate max-w-xs">
                                <?= character_limiter(strip_tags($notice['content']), 50) ?></div>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-500">
                            <?php
                            $colors = [
                                'high' => 'bg-red-100 text-red-800',
                                'medium' => 'bg-yellow-100 text-yellow-800',
                                'low' => 'bg-blue-100 text-blue-800'
                            ];
                            $color = $colors[$notice['priority']] ?? 'bg-slate-100 text-slate-800';
                            ?>
                            <span class="inline-flex rounded-full px-2 text-xs font-semibold leading-5 <?= $color ?>">
                                <?= ucfirst($notice['priority']) ?>
                            </span>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-500">
                            <?= ucfirst($notice['target_audience']) ?></td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-500">
                            <?php if ($notice['status'] == 1): ?>
                                <span
                                    class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Published</span>
                            <?php else: ?>
                                <span
                                    class="inline-flex rounded-full bg-slate-100 px-2 text-xs font-semibold leading-5 text-slate-800">Draft</span>
                            <?php endif; ?>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-500">
                            <?= date('M d, Y', strtotime($notice['created_at'])) ?>
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <a href="<?= base_url('admin/notices/edit/' . $notice['id']) ?>"
                                class="text-primary-600 hover:text-primary-900 mr-4">Edit</a>
                            <a href="<?= base_url('admin/notices/delete/' . $notice['id']) ?>"
                                onclick="return confirm('Delete this notice?')"
                                class="text-red-600 hover:text-red-900">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="px-6 py-10 text-center text-sm text-slate-500">
                        No notices found. <a href="<?= base_url('admin/notices/create') ?>"
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