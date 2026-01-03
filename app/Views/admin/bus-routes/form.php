<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <a href="<?= base_url('admin/bus-routes') ?>"
        class="inline-flex items-center text-sm text-slate-600 hover:text-slate-900">
        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Routes
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
    <h2 class="text-2xl font-bold text-slate-800 mb-6">
        <?= isset($route) ? 'Edit' : 'Add New' ?> Bus Route
    </h2>

    <form
        action="<?= isset($route) ? base_url('admin/bus-routes/update/' . $route['id']) : base_url('admin/bus-routes/store') ?>"
        method="post">
        <?= csrf_field() ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Route Number *</label>
                <input type="text" name="route_number" value="<?= old('route_number', $route['route_number'] ?? '') ?>"
                    required
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Route Name *</label>
                <input type="text" name="route_name" value="<?= old('route_name', $route['route_name'] ?? '') ?>"
                    required
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary-500">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-slate-700 mb-2">Areas Covered *</label>
                <textarea name="areas_covered" rows="2" required
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary-500"><?= old('areas_covered', $route['areas_covered'] ?? '') ?></textarea>
                <p class="text-xs text-slate-500 mt-1">e.g., City Centre → Mall Road → School</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Pickup Time *</label>
                <input type="text" name="pickup_time" value="<?= old('pickup_time', $route['pickup_time'] ?? '') ?>"
                    placeholder="7:30 AM" required
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Drop Time *</label>
                <input type="text" name="drop_time" value="<?= old('drop_time', $route['drop_time'] ?? '') ?>"
                    placeholder="3:30 PM" required
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Monthly Fee (₹) *</label>
                <input type="number" step="0.01" name="monthly_fee"
                    value="<?= old('monthly_fee', $route['monthly_fee'] ?? '') ?>" required
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary-500">
            </div>

            <div>
                <label class="flex items-center cursor-pointer mt-8">
                    <input type="checkbox" name="status" value="1" <?= old('status', $route['status'] ?? 1) == 1 ? 'checked' : '' ?> class="w-4 h-4 text-primary-600 border-slate-300 rounded
                    focus:ring-primary-500">
                    <span class="ml-2 text-sm font-medium text-slate-700">Active</span>
                </label>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-slate-200">
            <a href="<?= base_url('admin/bus-routes') ?>"
                class="px-6 py-2 border border-slate-300 text-slate-700 font-medium rounded-lg hover:bg-slate-50">Cancel</a>
            <button type="submit"
                class="px-6 py-2 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700">
                <?= isset($route) ? 'Update' : 'Create' ?> Route
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>