<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<!-- Stats Overview -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <!-- Students Card -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex items-start justify-between">
        <div>
            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Students</p>
            <h3 class="text-2xl font-bold text-slate-800 mt-1"><?= number_format($students_count) ?></h3>
            <p class="text-xs text-green-600 font-medium mt-1 flex items-center">
                <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                Active
            </p>
        </div>
        <div class="w-10 h-10 rounded-lg bg-primary-50 flex items-center justify-center text-primary-600">
            <svg class="w-6 h-6" fill="none" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
        </div>
    </div>

    <!-- Teachers Card -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex items-start justify-between">
        <div>
            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Teachers</p>
            <h3 class="text-2xl font-bold text-slate-800 mt-1"><?= number_format($teachers_count) ?></h3>
            <p class="text-xs text-slate-400 font-medium mt-1">Total Staff</p>
        </div>
        <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600">
            <svg class="w-6 h-6" fill="none" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/></svg>
        </div>
    </div>

    <!-- Admissions Card -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex items-start justify-between">
        <div>
            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Pending Apps</p>
            <h3 class="text-2xl font-bold text-slate-800 mt-1"><?= number_format($admissions_pending) ?></h3>
            <?php if ($admissions_pending > 0): ?>
                <p class="text-xs text-amber-600 font-bold mt-1">Action Required</p>
            <?php else: ?>
                 <p class="text-xs text-slate-400 font-medium mt-1">All caught up</p>
            <?php endif; ?>
        </div>
        <div class="w-10 h-10 rounded-lg bg-amber-50 flex items-center justify-center text-amber-600">
            <svg class="w-6 h-6" fill="none" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        </div>
    </div>

    <!-- Events Card -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex items-start justify-between">
        <div>
            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Upcoming Events</p>
            <h3 class="text-2xl font-bold text-slate-800 mt-1"><?= number_format($events_upcoming) ?></h3>
             <p class="text-xs text-slate-400 font-medium mt-1">Next 30 days</p>
        </div>
        <div class="w-10 h-10 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-600">
            <svg class="w-6 h-6" fill="none" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-8">
    <h2 class="text-sm font-bold text-slate-900 uppercase tracking-wide mb-4">Quick Actions</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="<?= base_url('admin/notices/create') ?>" class="group flex flex-col items-center justify-center p-4 rounded-xl border border-dashed border-slate-300 hover:border-primary-500 hover:bg-primary-50 transition-all">
            <div class="w-10 h-10 rounded-full bg-slate-100 group-hover:bg-white text-slate-500 group-hover:text-primary-600 flex items-center justify-center mb-2 transition-colors shadow-sm">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </div>
            <span class="text-sm font-medium text-slate-600 group-hover:text-primary-800">Post Notice</span>
        </a>

        <a href="<?= base_url('admin/events/create') ?>" class="group flex flex-col items-center justify-center p-4 rounded-xl border border-dashed border-slate-300 hover:border-emerald-500 hover:bg-emerald-50 transition-all">
            <div class="w-10 h-10 rounded-full bg-slate-100 group-hover:bg-white text-slate-500 group-hover:text-emerald-600 flex items-center justify-center mb-2 transition-colors shadow-sm">
                 <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <span class="text-sm font-medium text-slate-600 group-hover:text-emerald-800">Add Event</span>
        </a>

        <a href="<?= base_url('admin/gallery/upload') ?>" class="group flex flex-col items-center justify-center p-4 rounded-xl border border-dashed border-slate-300 hover:border-amber-500 hover:bg-amber-50 transition-all">
            <div class="w-10 h-10 rounded-full bg-slate-100 group-hover:bg-white text-slate-500 group-hover:text-amber-600 flex items-center justify-center mb-2 transition-colors shadow-sm">
                 <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <span class="text-sm font-medium text-slate-600 group-hover:text-amber-800">Upload Photo</span>
        </a>

         <a href="<?= base_url('admin/users/create') ?>" class="group flex flex-col items-center justify-center p-4 rounded-xl border border-dashed border-slate-300 hover:border-indigo-500 hover:bg-indigo-50 transition-all">
            <div class="w-10 h-10 rounded-full bg-slate-100 group-hover:bg-white text-slate-500 group-hover:text-indigo-600 flex items-center justify-center mb-2 transition-colors shadow-sm">
                  <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
            </div>
            <span class="text-sm font-medium text-slate-600 group-hover:text-indigo-800">Add User</span>
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Recent Activity -->
    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
            <h2 class="text-sm font-bold text-slate-900 uppercase tracking-wide">Recent Activity</h2>
            <a href="#" class="text-xs text-primary-600 hover:text-primary-700 font-medium">View All</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-xs text-slate-500 uppercase font-semibold">
                    <tr>
                        <th class="px-6 py-3">User</th>
                        <th class="px-6 py-3">Action</th>
                        <th class="px-6 py-3">Module</th>
                        <th class="px-6 py-3 text-right">Time</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php if (!empty($recent_activities)): ?>
                        <?php foreach ($recent_activities as $activity): ?>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-3 font-medium text-slate-900">
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center text-xs font-bold">
                                            <?= strtoupper(substr($activity['user_name'] ?? 'S', 0, 1)) ?>
                                        </div>
                                        <?= esc($activity['user_name'] ?? 'System') ?>
                                    </div>
                                </td>
                                <td class="px-6 py-3"><?= esc($activity['action']) ?></td>
                                <td class="px-6 py-3">
                                    <?php if ($activity['table_name']): ?>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-slate-100 text-slate-800">
                                            <?= esc($activity['table_name']) ?>
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-3 text-right text-slate-400 text-xs">
                                    <?= date('M d, g:i A', strtotime($activity['created_at'])) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="4" class="px-6 py-8 text-center text-slate-400">No activity recorded yet.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- System Info -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100">
            <h2 class="text-sm font-bold text-slate-900 uppercase tracking-wide">System Status</h2>
        </div>
        <div class="p-6 space-y-4">
             <div class="flex justify-between items-center pb-4 border-b border-slate-50">
                <span class="text-sm text-slate-600">Active Notices</span>
                <span class="px-2.5 py-0.5 rounded-full bg-blue-50 text-blue-700 text-xs font-bold"><?= number_format($notices_active) ?></span>
             </div>
             <div class="flex justify-between items-center pb-4 border-b border-slate-50">
                <span class="text-sm text-slate-600">Published Pages</span>
                <span class="px-2.5 py-0.5 rounded-full bg-purple-50 text-purple-700 text-xs font-bold"><?= number_format($pages_count) ?></span>
             </div>
             <div class="flex justify-between items-center pb-4 border-b border-slate-50">
                <span class="text-sm text-slate-600">Registered Users</span>
                <span class="px-2.5 py-0.5 rounded-full bg-slate-50 text-slate-700 text-xs font-bold"><?= number_format($users_count) ?></span>
             </div>
             
             <div class="pt-4">
                  <a href="<?= base_url('admin/admissions/export') ?>" class="w-full flex items-center justify-center px-4 py-2 border border-slate-300 shadow-sm text-sm font-medium rounded-lg text-slate-700 bg-white hover:bg-slate-50">
                    <svg class="mr-2 h-4 w-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Export Admissions CSV
                  </a>
             </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>