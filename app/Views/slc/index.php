<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero Header -->
<section class="relative bg-primary-950 py-24 px-4 sm:px-6 lg:px-8 text-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div
            class="absolute top-0 right-0 w-96 h-96 bg-accent-500 rounded-full blur-[128px] opacity-20 transform translate-x-1/2 -translate-y-1/2">
        </div>
        <div
            class="absolute bottom-0 left-0 w-96 h-96 bg-primary-600 rounded-full blur-[128px] opacity-20 transform -translate-x-1/2 translate-y-1/2">
        </div>
    </div>
    <div class="relative z-10 max-w-3xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-bold font-heading text-white mb-6">School Leaving Certificates</h1>
        <p class="text-lg text-primary-200">View and verify issued School Leaving Certificates.</p>
    </div>
</section>

<!-- Search and List Section -->
<section class="py-20 bg-slate-50 min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Search Form -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-10 w-full max-w-2xl mx-auto">
            <form action="<?= base_url('slc') ?>" method="get" class="flex gap-4">
                <input type="text" name="search" placeholder="Search by Student Name or Admission Number..."
                    value="<?= esc($search ?? '') ?>"
                    class="flex-1 px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all">
                <button type="submit"
                    class="px-8 py-3 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl transition-colors">
                    Search
                </button>
            </form>
        </div>

        <!-- SLC Table -->
        <div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900">Admission No</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900">Student Name</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900">Leaving Date</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900">Status</th>
                            <th class="px-6 py-4 text-right text-sm font-semibold text-slate-900">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php if (!empty($certificates)): ?>
                            <?php foreach ($certificates as $cert): ?>
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        <?= esc($cert['admission_number']) ?>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-slate-900">
                                        <?= esc($cert['student_name']) ?>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600">
                                        <?= date('M d, Y', strtotime($cert['leaving_date'])) ?>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Issued
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right text-sm">
                                        <?php if ($cert['certificate_file']): ?>
                                            <a href="<?= base_url('uploads/slc/' . $cert['certificate_file']) ?>" target="_blank"
                                                class="text-primary-600 hover:text-primary-700 font-semibold hover:underline">
                                                Download/View
                                            </a>
                                        <?php else: ?>
                                            <span class="text-slate-400">Unavailable</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                                    <?php if ($search): ?>
                                        No certificates found matching "
                                        <?= esc($search) ?>".
                                    <?php else: ?>
                                        No certificates found.
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if (isset($pager)): ?>
                <div class="px-6 py-4 border-t border-slate-100">
                    <?= $pager->links() ?>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>

<?= $this->endSection() ?>