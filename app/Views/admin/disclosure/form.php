<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <a href="<?= base_url('admin/disclosure') ?>"
        class="inline-flex items-center text-sm text-slate-600 hover:text-slate-900">
        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Documents
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
    <h2 class="text-2xl font-bold text-slate-800 mb-6">
        <?= isset($document) ? 'Edit' : 'Add New' ?> Document
    </h2>

    <form
        action="<?= isset($document) ? base_url('admin/disclosure/update/' . $document['id']) : base_url('admin/disclosure/store') ?>"
        method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-medium text-slate-700 mb-2">Document Title *</label>
                <input type="text" id="title" name="title" value="<?= old('title', $document['title'] ?? '') ?>"
                    required
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
            </div>

            <!-- Category -->
            <div>
                <label for="category" class="block text-sm font-medium text-slate-700 mb-2">Category *</label>
                <select id="category" name="category" required
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                    <option value="">Select Category</option>
                    <option value="Affiliation" <?= old('category', $document['category'] ?? '') == 'Affiliation' ? 'selected' : '' ?>>Affiliation</option>
                    <option value="Building Safety" <?= old('category', $document['category'] ?? '') == 'Building Safety' ? 'selected' : '' ?>>Building Safety</option>
                    <option value="Fire Safety" <?= old('category', $document['category'] ?? '') == 'Fire Safety' ? 'selected' : '' ?>>Fire Safety</option>
                    <option value="Recognition" <?= old('category', $document['category'] ?? '') == 'Recognition' ? 'selected' : '' ?>>Recognition</option>
                    <option value="Health & Sanitation" <?= old('category', $document['category'] ?? '') == 'Health & Sanitation' ? 'selected' : '' ?>>Health & Sanitation</option>
                    <option value="Society Registration" <?= old('category', $document['category'] ?? '') == 'Society Registration' ? 'selected' : '' ?>>Society Registration</option>
                    <option value="General" <?= old('category', $document['category'] ?? '') == 'General' ? 'selected' : '' ?>>General</option>
                </select>
            </div>

            <!-- Display Order -->
            <div>
                <label for="display_order" class="block text-sm font-medium text-slate-700 mb-2">Display Order</label>
                <input type="number" id="display_order" name="display_order"
                    value="<?= old('display_order', $document['display_order'] ?? 0) ?>"
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
            </div>

            <!-- Description -->
            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                <textarea id="description" name="description" rows="3"
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"><?= old('description', $document['description'] ?? '') ?></textarea>
            </div>

            <!-- Document File -->
            <div class="md:col-span-2">
                <label for="document_file" class="block text-sm font-medium text-slate-700 mb-2">
                    Document File (PDF/DOC)
                    <?= !isset($document) ? '*' : '(Leave blank to keep current)' ?>
                </label>
                <input type="file" id="document_file" name="document_file" accept=".pdf,.doc,.docx" <?= !isset($document) ? 'required' : '' ?>
                class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary-500
                focus:border-primary-500">
                <?php if (isset($document) && $document['document_file']): ?>
                    <p class="mt-2 text-sm text-slate-600">
                        Current file: <a href="<?= base_url('uploads/disclosure/' . $document['document_file']) ?>"
                            target="_blank" class="text-primary-600 hover:underline">
                            <?= $document['document_file'] ?>
                        </a>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Status -->
            <div class="md:col-span-2">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" name="status" value="1" <?= old('status', $document['status'] ?? 1) == 1 ? 'checked' : '' ?>
                    class="w-4 h-4 text-primary-600 border-slate-300 rounded focus:ring-primary-500">
                    <span class="ml-2 text-sm font-medium text-slate-700">Active</span>
                </label>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-slate-200">
            <a href="<?= base_url('admin/disclosure') ?>"
                class="px-6 py-2 border border-slate-300 text-slate-700 font-medium rounded-lg hover:bg-slate-50 transition-colors">Cancel</a>
            <button type="submit"
                class="px-6 py-2 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors">
                <?= isset($document) ? 'Update' : 'Create' ?> Document
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>