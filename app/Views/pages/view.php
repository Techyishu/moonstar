<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
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
        <h1 class="text-4xl md:text-5xl font-bold font-heading text-white mb-4"><?= esc($page['title']) ?></h1>
        <nav class="flex justify-center text-sm text-primary-200">
            <ol class="flex items-center space-x-2">
                <li><a href="<?= base_url() ?>" class="hover:text-white transition-colors">Home</a></li>
                <li><span class="opacity-50">/</span></li>
                <li class="text-white font-medium"><?= esc($page['title']) ?></li>
            </ol>
        </nav>
    </div>
</section>

<!-- Page Content -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <article class="prose prose-lg prose-slate max-w-none">
            <?= $page['content'] ?>
        </article>

        <?php if (isset($page['updated_at']) && !empty($page['updated_at'])): ?>
            <div class="mt-12 pt-6 border-t border-slate-200">
                <p class="text-sm text-slate-500 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Last updated: <?= date('F d, Y', strtotime($page['updated_at'])) ?>
                </p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<!-- If Tailwind Typography plugin is not available, these styles provide fallback formatting for CMS content -->
<style>
    .prose h2 {
        font-size: 1.875rem;
        line-height: 2.25rem;
        font-weight: 700;
        color: #0f172a;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    .prose h3 {
        font-size: 1.5rem;
        line-height: 2rem;
        font-weight: 600;
        color: #0f172a;
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
    }

    .prose p {
        margin-bottom: 1.25rem;
        line-height: 1.75;
        color: #334155;
    }

    .prose ul {
        list-style-type: disc;
        padding-left: 1.625rem;
        margin-bottom: 1.25rem;
    }

    .prose ol {
        list-style-type: decimal;
        padding-left: 1.625rem;
        margin-bottom: 1.25rem;
    }

    .prose li {
        margin-bottom: 0.5rem;
    }

    .prose a {
        color: #4f46e5;
        text-decoration: underline;
        font-weight: 500;
    }

    .prose table {
        width: 100%;
        margin-top: 2em;
        margin-bottom: 2em;
        border-collapse: collapse;
    }

    .prose th,
    .prose td {
        padding: 0.75rem;
        border: 1px solid #e2e8f0;
    }

    .prose th {
        background-color: #f8fafc;
        font-weight: 600;
        text-align: left;
    }
</style>
<?= $this->endSection() ?>