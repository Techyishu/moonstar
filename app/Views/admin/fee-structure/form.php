<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <a href="<?= base_url('admin/fee-structure') ?>"
        class="inline-flex items-center text-sm text-slate-600 hover:text-slate-900">
        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Fee Structure
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
    <h2 class="text-2xl font-bold text-slate-800 mb-6">
        <?= isset($fee) ? 'Edit' : 'Add' ?> Fee Structure
    </h2>

    <form
        action="<?= isset($fee) ? base_url('admin/fee-structure/update/' . $fee['id']) : base_url('admin/fee-structure/store') ?>"
        method="post">
        <?= csrf_field() ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Class Name *</label>
                <input type="text" name="class_name" value="<?= old('class_name', $fee['class_name'] ?? '') ?>"
                    placeholder="e.g., Nursery - KG" required
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Class Category</label>
                <input type="text" name="class_category"
                    value="<?= old('class_category', $fee['class_category'] ?? '') ?>" placeholder="e.g., Pre-Primary"
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Admission Fee (₹) *</label>
                <input type="number" step="0.01" name="admission_fee"
                    value="<?= old('admission_fee', $fee['admission_fee'] ?? '') ?>" required
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Tuition Fee per Quarter (₹) *</label>
                <input type="number" step="0.01" name="tuition_fee_quarterly"
                    value="<?= old('tuition_fee_quarterly', $fee['tuition_fee_quarterly'] ?? '') ?>" required
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Annual Charges (₹) *</label>
                <input type="number" step="0.01" name="annual_charges"
                    value="<?= old('annual_charges', $fee['annual_charges'] ?? '') ?>" required
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Display Order</label>
                <input type="number" name="display_order"
                    value="<?= old('display_order', $fee['display_order'] ?? 0) ?>"
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary-500">
            </div>

            <div class="md:col-span-2">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" name="status" value="1" <?= old('status', $fee['status'] ?? 1) == 1 ? 'checked' : '' ?> class="w-4 h-4 text-primary-600 border-slate-300 rounded focus:ring-primary-500">
                    <span class="ml-2 text-sm font-medium text-slate-700">Active</span>
                </label>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-slate-200">
            <a href="<?= base_url('admin/fee-structure') ?>"
                class="px-6 py-2 border border-slate-300 text-slate-700 font-medium rounded-lg hover:bg-slate-50">Cancel</a>
            <button type="submit"
                class="px-6 py-2 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700">
                <?= isset($fee) ? 'Update' : 'Create' ?> Fee
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>