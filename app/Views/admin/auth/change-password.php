<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="max-w-xl mx-auto">
    <div class="mb-6">
        <a href="<?= base_url('admin/dashboard') ?>"
            class="inline-flex items-center text-sm text-slate-500 hover:text-primary-600 transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Dashboard
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <!-- Header -->
        <div class="px-6 py-5 border-b border-slate-100 bg-slate-50">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-primary-100 flex items-center justify-center">
                    <svg class="w-5 h-5 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-slate-900">Change Password</h2>
                    <p class="text-sm text-slate-500">Update your account password for security</p>
                </div>
            </div>
        </div>

        <!-- Form -->
        <form action="<?= base_url('admin/change-password') ?>" method="post" class="p-6 space-y-5">
            <?= csrf_field() ?>

            <!-- Current Password -->
            <div>
                <label for="current_password" class="block text-sm font-semibold text-slate-700 mb-1.5">Current
                    Password <span class="text-red-500">*</span></label>
                <div class="relative" x-data="{ show: false }">
                    <input :type="show ? 'text' : 'password'" name="current_password" id="current_password" required
                        class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-3 border pr-10"
                        placeholder="Enter your current password">
                    <button type="button" @click="show = !show"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-slate-600">
                        <svg x-show="!show" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="show" x-cloak class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- New Password -->
            <div>
                <label for="new_password" class="block text-sm font-semibold text-slate-700 mb-1.5">New Password <span
                        class="text-red-500">*</span></label>
                <div class="relative" x-data="{ show: false }">
                    <input :type="show ? 'text' : 'password'" name="new_password" id="new_password" required
                        minlength="6"
                        class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-3 border pr-10"
                        placeholder="Enter new password (min 6 characters)">
                    <button type="button" @click="show = !show"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-slate-600">
                        <svg x-show="!show" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="show" x-cloak class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Confirm New Password -->
            <div>
                <label for="confirm_password" class="block text-sm font-semibold text-slate-700 mb-1.5">Confirm New
                    Password <span class="text-red-500">*</span></label>
                <div class="relative" x-data="{ show: false }">
                    <input :type="show ? 'text' : 'password'" name="confirm_password" id="confirm_password" required
                        minlength="6"
                        class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-3 border pr-10"
                        placeholder="Re-enter new password">
                    <button type="button" @click="show = !show"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-slate-600">
                        <svg x-show="!show" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="show" x-cloak class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Security Note -->
            <div class="bg-amber-50 border border-amber-200 rounded-lg p-4">
                <div class="flex gap-3">
                    <svg class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <div class="text-sm text-amber-800">
                        <p class="font-semibold mb-1">Security Tips</p>
                        <ul class="list-disc list-inside space-y-0.5 text-amber-700">
                            <li>Use at least 6 characters</li>
                            <li>Include a mix of letters, numbers, and symbols</li>
                            <li>Don't reuse passwords from other accounts</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="flex items-center justify-end gap-3 pt-2">
                <a href="<?= base_url('admin/dashboard') ?>"
                    class="px-5 py-2.5 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 transition-colors">
                    Cancel
                </a>
                <button type="submit"
                    class="px-5 py-2.5 text-sm font-bold text-white bg-primary-600 rounded-lg hover:bg-primary-700 shadow-sm transition-all hover:shadow-md">
                    Update Password
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>