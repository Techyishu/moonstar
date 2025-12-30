<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="sm:flex sm:items-center sm:justify-between mb-8">
    <div>
        <h1 class="text-xl font-semibold text-slate-900">Manage Admissions</h1>
        <p class="mt-2 text-sm text-slate-700">Review and manage student admission applications.</p>
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <a href="<?= base_url('admin/admissions/export') ?>"
            class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 shadow-sm hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 sm:w-auto">
            <svg class="w-4 h-4 mr-2 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            Export CSV
        </a>
    </div>
</div>

<!-- Search & Filter -->
<div class="bg-white rounded-lg shadow border border-slate-200 mb-6 p-4">
    <form method="get" class="grid grid-cols-1 md:grid-cols-12 gap-4">
        <div class="md:col-span-6">
            <input type="text" name="search" placeholder="Search by name, email, or application #..."
                value="<?= esc($search ?? '') ?>"
                class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
        </div>
        <div class="md:col-span-4">
            <select name="status"
                class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                <option value="">All Status</option>
                <option value="pending" <?= ($status ?? '') == 'pending' ? 'selected' : '' ?>>Pending</option>
                <option value="accepted" <?= ($status ?? '') == 'accepted' ? 'selected' : '' ?>>Accepted</option>
                <option value="rejected" <?= ($status ?? '') == 'rejected' ? 'selected' : '' ?>>Rejected</option>
            </select>
        </div>
        <div class="md:col-span-2">
            <button type="submit"
                class="w-full inline-flex items-center justify-center rounded-md border border-transparent bg-slate-800 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2">
                Search
            </button>
        </div>
    </form>
</div>

<!-- Admissions Table -->
<div class="overflow-hidden bg-white shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
    <table class="min-w-full divide-y divide-slate-300">
        <thead class="bg-slate-50">
            <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-slate-900 sm:pl-6">App #
                </th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">Student Name</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">Class</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">Parent Email</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">Status</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">Applied On</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Actions</span>
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 bg-white">
            <?php if (!empty($admissions)): ?>
                <?php foreach ($admissions as $app): ?>
                    <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-mono text-slate-500 sm:pl-6">
                            <?= esc($app['application_number']) ?>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-slate-900">
                            <?= esc($app['student_name']) ?>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-500">
                            <?= esc($app['class_applied']) ?>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-500">
                            <?= esc($app['parent_email']) ?>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm">
                            <?php
                            $colors = [
                                'accepted' => 'bg-green-100 text-green-800',
                                'rejected' => 'bg-red-100 text-red-800',
                                'pending' => 'bg-yellow-100 text-yellow-800'
                            ];
                            $color = $colors[$app['application_status']] ?? 'bg-slate-100 text-slate-800';
                            ?>
                            <span class="inline-flex rounded-full px-2 text-xs font-semibold leading-5 <?= $color ?>">
                                <?= ucfirst($app['application_status']) ?>
                            </span>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-500">
                            <?= date('M d, Y', strtotime($app['created_at'])) ?>
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <a href="<?= base_url('admin/admissions/view/' . $app['id']) ?>"
                                class="text-primary-600 hover:text-primary-900 mr-4">View</a>
                            <a href="<?= base_url('admin/admissions/delete/' . $app['id']) ?>"
                                onclick="return confirm('Delete this application?')"
                                class="text-red-600 hover:text-red-900">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="px-6 py-10 text-center text-sm text-slate-500">
                        No applications found.
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