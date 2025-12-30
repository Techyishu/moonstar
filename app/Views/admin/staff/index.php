<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Staff Management</h1>
            <p class="text-gray-500">Manage faculty and staff profiles</p>
        </div>
        <a href="<?= base_url('admin/staff/create') ?>" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Add Staff Member
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 font-semibold text-gray-600 text-sm">Order</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 text-sm">Name</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 text-sm">Designation</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 text-sm">Department</th>
                         <th class="px-6 py-4 font-semibold text-gray-600 text-sm">Qualification</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 text-sm">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <?php if (!empty($staff)): ?>
                        <?php foreach ($staff as $member): ?>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-gray-400 font-mono text-xs">#<?= esc($member['display_order']) ?></td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <?php if ($member['photo']): ?>
                                            <img src="<?= base_url('uploads/staff/' . $member['photo']) ?>" class="w-10 h-10 rounded-full object-cover">
                                        <?php else: ?>
                                            <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">
                                                <?= substr($member['name'], 0, 1) ?>
                                            </div>
                                        <?php endif; ?>
                                        <h3 class="font-medium text-gray-900"><?= esc($member['name']) ?></h3>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600"><?= esc($member['designation']) ?></td>
                                <td class="px-6 py-4 text-sm text-gray-600"><?= esc($member['department']) ?></td>
                                <td class="px-6 py-4 text-sm text-gray-500"><?= esc($member['qualification']) ?></td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <a href="<?= base_url('admin/staff/edit/' . $member['id']) ?>" class="text-gray-400 hover:text-indigo-600 transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                        </a>
                                        <a href="<?= base_url('admin/staff/delete/' . $member['id']) ?>" class="text-gray-400 hover:text-red-600 transition" onclick="return confirm('Are you sure?')">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6" class="px-6 py-8 text-center text-gray-500">No staff members found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
