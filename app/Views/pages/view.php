<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<section class="page-header bg-primary text-white text-center py-5">
    <div class="container">
        <h1 class="display-4 fw-bold text-white"><?= esc($page['title']) ?></h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-white">Home</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page"><?= esc($page['title']) ?></li>
            </ol>
        </nav>
    </div>
</section>

<!-- Page Content -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <article class="page-content" data-aos="fade-up">
                    <?= $page['content'] ?>
                </article>

                <?php if (isset($page['updated_at']) && !empty($page['updated_at'])): ?>
                    <hr class="my-4">
                    <p class="text-muted small">
                        <i class="bi bi-clock-history me-1"></i>
                        Last updated: <?= date('F d, Y', strtotime($page['updated_at'])) ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
    .page-content {
        font-size: 1.1rem;
        line-height: 1.8;
    }

    .page-content h2 {
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    .page-content h3 {
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
    }

    .page-content p {
        margin-bottom: 1.25rem;
    }

    .page-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 1.5rem 0;
    }

    .page-content ul,
    .page-content ol {
        margin-bottom: 1.25rem;
        padding-left: 2rem;
    }

    .page-content li {
        margin-bottom: 0.5rem;
    }

    .page-content a {
        color: var(--primary-color);
        text-decoration: underline;
    }

    .page-content a:hover {
        color: var(--secondary-color);
    }
</style>
<?= $this->endSection() ?>