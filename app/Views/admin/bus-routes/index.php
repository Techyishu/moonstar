<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">Bus Routes</h2>
        <p class="text-sm text-slate-600 mt-1">Manage school bus routes and fees</p>
    </div>
    <a href="<?= base_url('admin/bus-routes/create') ?>"
        class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors">
        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
        Add Route
    </a>
</div>

<!-- Table -->
<div class="bg-white rounded-lg shadow-sm border border-slate-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-700 uppercase">Route #</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-700 uppercase">Route Name</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-700 uppercase">Areas</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-700 uppercase">Timing</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-700 uppercase">Fee</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-slate-700 uppercase">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold text-slate-700 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php if (empty($routes)): ?>
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-slate-500">
                            No routes found. Add your first bus route.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($routes as $route): ?>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-100 text-blue-800">
                                    <?= esc($route['route_number']) ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 font-medium text-slate-900">
                                <?= esc($route['route_name']) ?>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">
                                <?= esc(substr($route['areas_covered'], 0, 40)) ?>...
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-700">
                                <?= esc($route['pickup_time']) ?> -
                                <?= esc($route['drop_time']) ?>
                            </td>
                            <td class="px-6 py-4 font-bold text-green-600">₹
                                <?= number_format($route['monthly_fee'], 0) ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php if ($route['status'] == 1): ?>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Active</span>
                                <?php else: ?>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 text-right text-sm font-medium whitespace-nowrap">
                                <a href="<?= base_url('admin/bus-routes/edit/' . $route['id']) ?>"
                                    class="text-primary-600 hover:text-primary-900 mr-3">Edit</a>
                                <a href="<?= base_url('admin/bus-routes/delete/' . $route['id']) ?>"
                                    class="text-red-600 hover:text-red-900"
                                    onclick="return confirm('Delete this route?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>