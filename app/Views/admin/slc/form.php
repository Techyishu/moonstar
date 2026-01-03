<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <a href="<?= base_url('admin/slc') ?>"
        class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-700">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to Certificates
    </a>
</div>

<div class="bg-white rounded-lg shadow border border-slate-200 overflow-hidden">
    <div class="border-b border-slate-200 px-6 py-4">
        <h3 class="text-lg font-medium leading-6 text-slate-900">
            <?= isset($slc) ? 'Edit Certificate' : 'Issue New Certificate' ?>
        </h3>
    </div>

    <form action="<?= isset($slc) ? base_url('admin/slc/update/' . $slc['id']) : base_url('admin/slc/store') ?>"
        method="post" enctype="multipart/form-data" class="p-6">
        <?= csrf_field() ?>

        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">

            <div class="col-span-2 sm:col-span-1">
                <label for="student_name" class="block text-sm font-medium text-slate-700">Student Name <span
                        class="text-red-500">*</span></label>
                <div class="mt-1">
                    <input type="text" name="student_name" id="student_name" required
                        value="<?= old('student_name', $slc['student_name'] ?? '') ?>"
                        class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                </div>
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="admission_number" class="block text-sm font-medium text-slate-700">Admission Number <span
                        class="text-red-500">*</span></label>
                <div class="mt-1">
                    <input type="text" name="admission_number" id="admission_number" required
                        value="<?= old('admission_number', $slc['admission_number'] ?? '') ?>"
                        class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                </div>
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="date_of_birth" class="block text-sm font-medium text-slate-700">Date of Birth</label>
                <div class="mt-1">
                    <input type="date" name="date_of_birth" id="date_of_birth"
                        value="<?= old('date_of_birth', $slc['date_of_birth'] ?? '') ?>"
                        class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                </div>
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="leaving_date" class="block text-sm font-medium text-slate-700">Date of Leaving <span
                        class="text-red-500">*</span></label>
                <div class="mt-1">
                    <input type="date" name="leaving_date" id="leaving_date" required
                        value="<?= old('leaving_date', $slc['leaving_date'] ?? '') ?>"
                        class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                </div>
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="father_name" class="block text-sm font-medium text-slate-700">Father's Name</label>
                <div class="mt-1">
                    <input type="text" name="father_name" id="father_name"
                        value="<?= old('father_name', $slc['father_name'] ?? '') ?>"
                        class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                </div>
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="mother_name" class="block text-sm font-medium text-slate-700">Mother's Name</label>
                <div class="mt-1">
                    <input type="text" name="mother_name" id="mother_name"
                        value="<?= old('mother_name', $slc['mother_name'] ?? '') ?>"
                        class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                </div>
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="class_leaving" class="block text-sm font-medium text-slate-700">Class when leaving</label>
                <div class="mt-1">
                    <input type="text" name="class_leaving" id="class_leaving"
                        value="<?= old('class_leaving', $slc['class_leaving'] ?? '') ?>"
                        class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                </div>
            </div>

            <div class="col-span-2">
                <label for="reason" class="block text-sm font-medium text-slate-700">Reason for Leaving</label>
                <div class="mt-1">
                    <textarea id="reason" name="reason" rows="3"
                        class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border"><?= old('reason', $slc['reason'] ?? '') ?></textarea>
                </div>
            </div>

            <div class="col-span-2">
                <label class="block text-sm font-medium text-slate-700">Certificate File (PDF/Image)</label>
                <input type="file" name="certificate_file" class="mt-1 block w-full text-sm text-slate-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-primary-50 file:text-primary-700
                    hover:file:bg-primary-100">
                <?php if (isset($slc['certificate_file']) && $slc['certificate_file']): ?>
                    <div class="mt-2">
                        <a href="<?= base_url('uploads/slc/' . $slc['certificate_file']) ?>" target="_blank"
                            class="text-sm text-primary-600 hover:underline">View Current File (
                            <?= esc($slc['certificate_file']) ?>)
                        </a>
                    </div>
                <?php endif; ?>
            </div>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="<?= base_url('admin/slc') ?>" type="button"
                class="text-sm font-semibold leading-6 text-slate-900">Cancel</a>
            <button type="submit"
                class="rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                Save Certificate
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>