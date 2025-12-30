<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <a href="<?= base_url('admin/users') ?>"
        class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-700">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to Users
    </a>
</div>

<div class="bg-white rounded-lg shadow border border-slate-200 overflow-hidden">
    <div class="border-b border-slate-200 px-6 py-4">
        <h3 class="text-lg font-medium leading-6 text-slate-900"><?= isset($user) ? 'Edit User' : 'Create User' ?></h3>
    </div>

    <form action="<?= isset($user) ? base_url('admin/users/update/' . $user['id']) : base_url('admin/users/store') ?>"
        method="post" class="p-6">
        <?= csrf_field() ?>

        <div class="grid grid-cols-1 gap-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700">Name <span
                            class="text-red-500">*</span></label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name" required
                            value="<?= old('name', $user['name'] ?? '') ?>"
                            class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700">Email <span
                            class="text-red-500">*</span></label>
                    <div class="mt-1">
                        <input type="email" name="email" id="email" required
                            value="<?= old('email', $user['email'] ?? '') ?>"
                            class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700">Password
                        <?= isset($user) ? '(Leave blank to keep current)' : '<span class="text-red-500">*</span>' ?></label>
                    <div class="mt-1">
                        <input type="password" name="password" id="password" <?= !isset($user) ? 'required' : '' ?>
                            class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                        <?php if (!isset($user)): ?>
                            <p class="mt-1 text-xs text-slate-500">Minimum 6 characters</p>
                        <?php endif; ?>
                    </div>
                </div>

                <div>
                    <label for="role" class="block text-sm font-medium text-slate-700">Role <span
                            class="text-red-500">*</span></label>
                    <div class="mt-1">
                        <select id="role" name="role" required
                            class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                            <option value="superadmin" <?= (old('role', $user['role'] ?? '') == 'superadmin') ? 'selected' : '' ?>>Superadmin</option>
                            <option value="staff" <?= (old('role', $user['role'] ?? '') == 'staff') ? 'selected' : '' ?>>
                                Staff</option>
                            <option value="admission_officer" <?= (old('role', $user['role'] ?? '') == 'admission_officer') ? 'selected' : '' ?>>Admission Officer</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="flex items-start">
                <div class="flex h-5 items-center">
                    <input id="status" name="status" type="checkbox" value="1" <?= (old('status', $user['status'] ?? 1) == 1) ? 'checked' : '' ?>
                        class="h-4 w-4 rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                </div>
                <div class="ml-3 text-sm">
                    <label for="status" class="font-medium text-slate-700">Active Account</label>
                    <p class="text-slate-500">Allow user to log in.</p>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="<?= base_url('admin/users') ?>" class="text-sm font-semibold leading-6 text-slate-900">Cancel</a>
            <button type="submit"
                class="rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                Save User
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>