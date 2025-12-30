<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <a href="<?= base_url('admin/events') ?>" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-700">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to Events
    </a>
</div>

<div class="bg-white rounded-lg shadow border border-slate-200 overflow-hidden">
    <div class="border-b border-slate-200 px-6 py-4">
        <h3 class="text-lg font-medium leading-6 text-slate-900"><?= isset($event) ? 'Edit Event' : 'Create Event' ?></h3>
    </div>
    
    <form action="<?= isset($event) ? base_url('admin/events/update/' . $event['id']) : base_url('admin/events/store') ?>" 
          method="post" enctype="multipart/form-data" class="p-6">
        <?= csrf_field() ?>
        
        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            
            <!-- Main Content Column -->
            <div class="sm:col-span-4 space-y-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-slate-700">Title <span class="text-red-500">*</span></label>
                    <div class="mt-1">
                        <input type="text" name="title" id="title" required
                               value="<?= old('title', $event['title'] ?? '') ?>"
                               class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-slate-700">Description <span class="text-red-500">*</span></label>
                    <div class="mt-1">
                        <textarea id="description" name="description" rows="6" required
                                  class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border"><?= old('description', $event['description'] ?? '') ?></textarea>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="event_date" class="block text-sm font-medium text-slate-700">Date <span class="text-red-500">*</span></label>
                        <input type="date" name="event_date" id="event_date" required
                               value="<?= old('event_date', $event['event_date'] ?? '') ?>"
                               class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                    </div>
                    <div>
                        <label for="event_time" class="block text-sm font-medium text-slate-700">Time</label>
                        <input type="time" name="event_time" id="event_time"
                               value="<?= old('event_time', $event['event_time'] ?? '') ?>"
                               class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                    </div>
                </div>

                <div>
                    <label for="location" class="block text-sm font-medium text-slate-700">Location</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <input type="text" name="location" id="location"
                               value="<?= old('location', $event['location'] ?? '') ?>"
                               class="block w-full rounded-md border-slate-300 pl-10 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
                    </div>
                </div>
            </div>

            <!-- Sidebar Column -->
            <div class="sm:col-span-2 space-y-6">
                <div class="bg-slate-50 p-4 rounded-md border border-slate-200 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Event Image</label>
                        <input type="file" name="image" accept="image/*" class="mt-1 block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-primary-50 file:text-primary-700
                            hover:file:bg-primary-100">
                        <?php if (isset($event['image']) && $event['image']): ?>
                            <div class="mt-2">
                                <img src="<?= base_url('uploads/events/' . $event['image']) ?>" 
                                     class="h-32 w-full object-cover rounded-md border border-slate-200" alt="Current">
                                <p class="mt-1 text-xs text-slate-500">Current Image</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="flex items-start">
                        <div class="flex h-5 items-center">
                            <input id="status" name="status" type="checkbox" value="1"
                                   <?= (old('status', $event['status'] ?? 1) == 1) ? 'checked' : '' ?>
                                   class="h-4 w-4 rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="status" class="font-medium text-slate-700">Published</label>
                            <p class="text-slate-500">Visible on public events page.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="<?= base_url('admin/events') ?>" class="text-sm font-semibold leading-6 text-slate-900">Cancel</a>
            <button type="submit"
                    class="rounded-md bg-primary-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">
                Save Event
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
