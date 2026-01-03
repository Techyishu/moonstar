<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">Disclosure Documents</h2>
        <p class="text-sm text-slate-600 mt-1">Manage mandatory disclosure PDFs and documents</p>
    </div>
    <a href="<?= base_url('admin/disclosure/create') ?>"
        class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors">
        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
        Add Document
    </a>
</div>

<!-- Search -->
<div class="bg-white rounded-lg shadow-sm border border-slate-200 p-4 mb-6">
    <form action="<?= base_url('admin/disclosure') ?>" method="get" class="flex gap-4">
        <div class="flex-1">
            <input type="text" name="search" value="<?= esc($search ?? '') ?>" placeholder="Search documents..."
                class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
        </div>
        <button type="submit"
            class="px-6 py-2 bg-slate-700 text-white font-medium rounded-lg hover:bg-slate-800 transition-colors">Search</button>
        <?php if ($search): ?>
            <a href="<?= base_url('admin/disclosure') ?>"
                class="px-6 py-2 bg-slate-100 text-slate-700 font-medium rounded-lg hover:bg-slate-200 transition-colors">Clear</a>
        <?php endif; ?>
    </form>
</div>

<!-- Table -->
<div class="bg-white rounded-lg shadow-sm border border-slate-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">Title
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">
                        Category</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">
                        Document</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">Order
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-700 uppercase tracking-wider">Status
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-semibold text-slate-700 uppercase tracking-wider">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php if (empty($documents)): ?>
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-slate-500">
                            No documents found. Add your first document.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($documents as $doc): ?>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-medium text-slate-900">
                                    <?= esc($doc['title']) ?>
                                </div>
                                <?php if ($doc['description']): ?>
                                    <div class="text-sm text-slate-500 mt-1">
                                        <?= esc(substr($doc['description'], 0, 60)) ?>...
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-700">
                                <?= esc($doc['category']) ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php if ($doc['document_file']): ?>
                                    <a href="<?= base_url('uploads/disclosure/' . $doc['document_file']) ?>" target="_blank"
                                        class="inline-flex items-center text-sm text-primary-600 hover:text-primary-700">
                                        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        View
                                    </a>
                                <?php else: ?>
                                    <span class="text-xs text-slate-400">No file</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-700">
                                <?= esc($doc['display_order']) ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php if ($doc['status'] == 1): ?>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Active</span>
                                <?php else: ?>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 text-right text-sm font-medium whitespace-nowrap">
                                <a href="<?= base_url('admin/disclosure/edit/' . $doc['id']) ?>"
                                    class="text-primary-600 hover:text-primary-900 mr-3">Edit</a>
                                <a href="<?= base_url('admin/disclosure/delete/' . $doc['id']) ?>"
                                    class="text-red-600 hover:text-red-900"
                                    onclick="return confirm('Are you sure you want to delete this document?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <?php if ($pager): ?>
        <div class="px-6 py-4 border-t border-slate-200">
            <?= $pager->links() ?>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>