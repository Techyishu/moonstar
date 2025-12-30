<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="max-w-2xl mx-auto">
    <div class="flex items-center gap-4 mb-6">
        <a href="<?= base_url('admin/staff') ?>" class="text-gray-500 hover:text-indigo-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-gray-800"><?= isset($member) ? 'Edit Staff Member' : 'Add Staff Member' ?>
        </h1>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <form
            action="<?= isset($member) ? base_url('admin/staff/update/' . $member['id']) : base_url('admin/staff/store') ?>"
            method="post" enctype="multipart/form-data" class="space-y-6">

            <div class="grid grid-cols-3 gap-6">
                <!-- Name -->
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" name="name" value="<?= old('name', $member['name'] ?? '') ?>"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition"
                        required>
                </div>

                <!-- Display Order -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Display Order</label>
                    <input type="number" name="display_order"
                        value="<?= old('display_order', $member['display_order'] ?? 0) ?>"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition">
                </div>
            </div>

            <!-- Designation -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Designation/Role</label>
                <input type="text" name="designation" value="<?= old('designation', $member['designation'] ?? '') ?>"
                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition"
                    placeholder="e.g. Senior Teacher" required>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <!-- Qualification -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Qualification</label>
                    <input type="text" name="qualification"
                        value="<?= old('qualification', $member['qualification'] ?? '') ?>"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition"
                        placeholder="e.g. M.Sc, B.Ed">
                </div>

                <!-- Department -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Department</label>
                    <input type="text" name="department" value="<?= old('department', $member['department'] ?? '') ?>"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition"
                        placeholder="e.g. Science">
                </div>
            </div>

            <!-- Bio -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Short Bio</label>
                <textarea name="bio" rows="3"
                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition"><?= old('bio', $member['bio'] ?? '') ?></textarea>
            </div>

            <!-- Photo -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Profile Photo</label>
                <div class="flex items-center gap-4">
                    <?php if (isset($member['photo']) && $member['photo']): ?>
                        <img src="<?= base_url('uploads/staff/' . $member['photo']) ?>"
                            class="w-16 h-16 rounded-lg object-cover">
                    <?php endif; ?>
                    <input type="file" name="photo"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                </div>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="w-full py-3 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 transition shadow-lg shadow-indigo-500/30">
                    <?= isset($member) ? 'Update Staff Member' : 'Save Staff Member' ?>
                </button>
            </div>

        </form>
    </div>
</div>
<?= $this->endSection() ?>