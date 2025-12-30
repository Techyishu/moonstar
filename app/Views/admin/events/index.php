<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="sm:flex sm:items-center sm:justify-between mb-8">
    <div>
        <h1 class="text-xl font-semibold text-slate-900">Manage Events</h1>
        <p class="mt-2 text-sm text-slate-700">Schedule and manage upcoming school events.</p>
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <a href="<?= base_url('admin/events/create') ?>"
            class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 sm:w-auto">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Create Event
        </a>
    </div>
</div>

<!-- Search -->
<div class="bg-white rounded-lg shadow border border-slate-200 mb-6 p-4">
    <form method="get" class="flex gap-4">
        <div class="flex-1">
            <input type="text" name="search" placeholder="Search events..." value="<?= esc($search ?? '') ?>"
                class="block w-full rounded-md border-slate-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-2 border">
        </div>
        <button type="submit"
            class="inline-flex items-center rounded-md border border-transparent bg-slate-800 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2">
            Search
        </button>
    </form>
</div>

<!-- Events Table -->
<div class="overflow-hidden bg-white shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
    <table class="min-w-full divide-y divide-slate-300">
        <thead class="bg-slate-50">
            <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-slate-900 sm:pl-6">Title
                </th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">Date & Time</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">Location</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-slate-900">Status</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Actions</span>
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 bg-white">
            <?php if (!empty($events)): ?>
                <?php foreach ($events as $event): ?>
                    <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-slate-900 sm:pl-6">
                            <?= esc($event['title']) ?>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-500">
                            <div class="font-medium text-slate-900"><?= date('M d, Y', strtotime($event['event_date'])) ?></div>
                            <div class="text-xs text-slate-500">
                                <?= $event['event_time'] ? date('g:i A', strtotime($event['event_time'])) : 'All Day' ?></div>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-500">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-slate-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <?= esc($event['location'] ?? '-') ?>
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-500">
                            <?php if ($event['status'] == 1): ?>
                                <span
                                    class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Published</span>
                            <?php else: ?>
                                <span
                                    class="inline-flex rounded-full bg-slate-100 px-2 text-xs font-semibold leading-5 text-slate-800">Draft</span>
                            <?php endif; ?>
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <a href="<?= base_url('admin/events/edit/' . $event['id']) ?>"
                                class="text-primary-600 hover:text-primary-900 mr-4">Edit</a>
                            <a href="<?= base_url('admin/events/delete/' . $event['id']) ?>"
                                onclick="return confirm('Delete this event?')"
                                class="text-red-600 hover:text-red-900">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-sm text-slate-500">
                        No events found.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $pager->links() ?? '' ?>

<?= $this->endSection() ?>