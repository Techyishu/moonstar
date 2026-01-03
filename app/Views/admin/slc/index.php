<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="sm:flex sm:items-center sm:justify-between mb-8">
    <div>
        <h1 class="text-xl font-semibold text-slate-900">School Leaving Certificates</h1>
        <p class="mt-2 text-sm text-slate-700">Manage issued School Leaving Certificates (SLC).</p>
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <a href="<?= base_url('admin/slc/create') ?>"
            class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 sm:w-auto">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Issue New Certificate
        </a>
    </div>
</div>

<!-- Search & Filter -->
<div class="bg-white rounded-lg shadow border border-slate-200 mb-6 p-4">
    <form method="get" action="<?= base_url('admin/slc') ?>" class="flex gap-4">
        <div class="flex-1">
            <input type="text" name="search" placeholder="Search by Student Name or Admission Number..."
                value="<?= esc($search ?? '') ?>"
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

<!-- SLC Table -->
<div class="overflow-hidden bg-white shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
    <table class="min-w-full divide-y divide-slate-300">
        <thead class="bg-slate-50">
            <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-slate-900 sm:pl-6">Student
                    Name</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">Admission No</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">Leaving Date</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">Certificate</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Actions</span>
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 bg-white">
            <?php if (!empty($certificates)): ?>
                <?php foreach ($certificates as $cert): ?>
                    <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-slate-900 sm:pl-6">
                            <?= esc($cert['student_name']) ?>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-500">
                            <?= esc($cert['admission_number']) ?>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-500">
                            <?= date('M d, Y', strtotime($cert['leaving_date'])) ?>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-500">
                            <?php if ($cert['certificate_file']): ?>
                                <a href="<?= base_url('uploads/slc/' . $cert['certificate_file']) ?>" target="_blank"
                                    class="text-primary-600 hover:underline">View PDF</a>
                            <?php else: ?>
                                <span class="text-slate-400">No File</span>
                            <?php endif; ?>
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <a href="<?= base_url('admin/slc/edit/' . $cert['id']) ?>"
                                class="text-primary-600 hover:text-primary-900 mr-4">Edit</a>
                            <a href="<?= base_url('admin/slc/delete/' . $cert['id']) ?>"
                                onclick="return confirm('Delete this certificate?')"
                                class="text-red-600 hover:text-red-900">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-sm text-slate-500">
                        No certificates found. <a href="<?= base_url('admin/slc/create') ?>"
                            class="text-primary-600 hover:text-primary-500">Issue one</a>
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