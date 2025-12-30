<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <a href="<?= base_url('admin/admissions') ?>"
        class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-700">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to Admissions
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Application Details -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-lg shadow border border-slate-200 overflow-hidden">
            <div class="border-b border-slate-200 px-6 py-4">
                <h3 class="text-lg font-medium leading-6 text-slate-900">Application Details</h3>
            </div>
            <div class="px-6 py-4">
                <dl class="divide-y divide-slate-200">
                    <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-slate-500">Application Number</dt>
                        <dd class="mt-1 text-sm text-slate-900 sm:col-span-2 sm:mt-0 font-mono">
                            <?= esc($admission['application_number']) ?></dd>
                    </div>
                    <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-slate-500">Student Name</dt>
                        <dd class="mt-1 text-sm text-slate-900 sm:col-span-2 sm:mt-0">
                            <?= esc($admission['student_name']) ?></dd>
                    </div>
                    <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-slate-500">Date of Birth</dt>
                        <dd class="mt-1 text-sm text-slate-900 sm:col-span-2 sm:mt-0">
                            <?= date('F d, Y', strtotime($admission['date_of_birth'])) ?></dd>
                    </div>
                    <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-slate-500">Gender</dt>
                        <dd class="mt-1 text-sm text-slate-900 sm:col-span-2 sm:mt-0">
                            <?= ucfirst($admission['gender']) ?></dd>
                    </div>
                    <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-slate-500">Class Applied For</dt>
                        <dd class="mt-1 text-sm text-slate-900 sm:col-span-2 sm:mt-0">
                            <?= esc($admission['class_applied']) ?></dd>
                    </div>
                    <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-slate-500">Previous School</dt>
                        <dd class="mt-1 text-sm text-slate-900 sm:col-span-2 sm:mt-0">
                            <?= esc($admission['previous_school'] ?? 'N/A') ?></dd>
                    </div>
                    <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-slate-500">Parent/Guardian Name</dt>
                        <dd class="mt-1 text-sm text-slate-900 sm:col-span-2 sm:mt-0">
                            <?= esc($admission['parent_name']) ?></dd>
                    </div>
                    <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-slate-500">Parent Email</dt>
                        <dd class="mt-1 text-sm text-slate-900 sm:col-span-2 sm:mt-0">
                            <?= esc($admission['parent_email']) ?></dd>
                    </div>
                    <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-slate-500">Parent Phone</dt>
                        <dd class="mt-1 text-sm text-slate-900 sm:col-span-2 sm:mt-0">
                            <?= esc($admission['parent_phone']) ?></dd>
                    </div>
                    <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-slate-500">Address</dt>
                        <dd class="mt-1 text-sm text-slate-900 sm:col-span-2 sm:mt-0">
                            <?= nl2br(esc($admission['address'])) ?></dd>
                    </div>
                    <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-slate-500">Applied On</dt>
                        <dd class="mt-1 text-sm text-slate-900 sm:col-span-2 sm:mt-0">
                            <?= date('F d, Y g:i A', strtotime($admission['created_at'])) ?></dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <!-- Status Update -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-lg shadow border border-slate-200 overflow-hidden sticky top-24">
            <div class="border-b border-slate-200 px-6 py-4">
                <h3 class="text-lg font-medium leading-6 text-slate-900">Update Status</h3>
            </div>
            <div class="p-6">
                <form action="<?= base_url('admin/admissions/update-status/' . $admission['id']) ?>" method="post"
                    class="space-y-6">
                    <?= csrf_field() ?>

                    <div>
                        <label for="status" class="block text-sm font-medium text-slate-700">Status</label>
                        <select id="status" name="status" required
                            class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                            <option value="pending" <?= $admission['application_status'] == 'pending' ? 'selected' : '' ?>>
                                Pending</option>
                            <option value="accepted" <?= $admission['application_status'] == 'accepted' ? 'selected' : '' ?>>Accepted</option>
                            <option value="rejected" <?= $admission['application_status'] == 'rejected' ? 'selected' : '' ?>>Rejected</option>
                        </select>
                    </div>

                    <div>
                        <label for="remarks" class="block text-sm font-medium text-slate-700">Remarks</label>
                        <textarea id="remarks" name="remarks" rows="4"
                            class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border"><?= esc($admission['remarks'] ?? '') ?></textarea>
                    </div>

                    <button type="submit"
                        class="w-full rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                        Update Status
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>