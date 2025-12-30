<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="max-w-2xl mx-auto">
    <div class="flex items-center gap-4 mb-6">
        <a href="<?= base_url('admin/toppers') ?>" class="text-gray-500 hover:text-indigo-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-gray-800"><?= isset($topper) ? 'Edit Topper' : 'Add New Topper' ?></h1>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <form
            action="<?= isset($topper) ? base_url('admin/toppers/update/' . $topper['id']) : base_url('admin/toppers/store') ?>"
            method="post" enctype="multipart/form-data" class="space-y-6">

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Student Name</label>
                <input type="text" name="student_name" value="<?= old('student_name', $topper['student_name'] ?? '') ?>"
                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition"
                    required>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <!-- Standard -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Class/Standard</label>
                    <input type="text" name="standard" value="<?= old('standard', $topper['standard'] ?? '') ?>"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition"
                        placeholder="e.g. Grade 12" required>
                </div>

                <!-- Batch Year -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Batch Year</label>
                    <input type="text" name="batch_year" value="<?= old('batch_year', $topper['batch_year'] ?? '') ?>"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition"
                        placeholder="e.g. 2024-2025" required>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <!-- Percentage -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Percentage/Score</label>
                    <input type="text" name="percentage" value="<?= old('percentage', $topper['percentage'] ?? '') ?>"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition"
                        placeholder="e.g. 98.5" required>
                </div>

                <!-- Rank -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Rank/Title (Optional)</label>
                    <input type="text" name="rank" value="<?= old('rank', $topper['rank'] ?? '') ?>"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition"
                        placeholder="e.g. District Topper">
                </div>
            </div>

            <!-- Testimonial -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Quote/Testimonial</label>
                <textarea name="testimonial" rows="3"
                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition"><?= old('testimonial', $topper['testimonial'] ?? '') ?></textarea>
            </div>

            <!-- Image -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Student Photo</label>
                <div class="flex items-center gap-4">
                    <?php if (isset($topper['student_image']) && $topper['student_image']): ?>
                        <img src="<?= base_url('uploads/toppers/' . $topper['student_image']) ?>"
                            class="w-16 h-16 rounded-lg object-cover">
                    <?php endif; ?>
                    <input type="file" name="student_image"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                </div>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="w-full py-3 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 transition shadow-lg shadow-indigo-500/30">
                    <?= isset($topper) ? 'Update Topper Details' : 'Save Topper' ?>
                </button>
            </div>

        </form>
    </div>
</div>
<?= $this->endSection() ?>