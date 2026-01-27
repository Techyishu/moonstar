<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<section class="relative bg-primary-950 py-24 px-4 sm:px-6 lg:px-8 text-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute top-1/2 left-1/2 w-full h-full max-w-7xl -translate-x-1/2 -translate-y-1/2">
             <div class="absolute top-0 right-0 w-80 h-80 bg-accent-500/20 rounded-full blur-[100px]"></div>
             <div class="absolute bottom-0 left-0 w-80 h-80 bg-primary-500/30 rounded-full blur-[100px]"></div>
        </div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4xKSIvPjwvc3ZnPg==')] opacity-20"></div>
    </div>
    
    <div class="relative z-10 max-w-3xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-bold font-heading text-white mb-6">Moments at Moonstar</h1>
        <p class="text-lg text-primary-200">Exploring the vibrant life of our students through the lens.</p>
    </div>
</section>

<!-- Gallery Section with Alpine -->
<section class="py-20 bg-slate-50 min-h-screen" x-data="galleryApp()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filters -->
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            <template x-for="cat in categories" :key="cat.id">
                <button @click="filter = cat.id" 
                    :class="filter === cat.id ? 'bg-primary-600 text-white shadow-lg shadow-primary-500/30 ring-2 ring-primary-600 ring-offset-2' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200'"
                    class="px-6 py-2.5 rounded-full font-medium transition-all duration-200 text-sm md:text-base">
                    <span x-text="cat.label"></span>
                </button>
            </template>
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (!empty($gallery)): ?>
                <?php foreach ($gallery as $item): ?>
                <div x-show="filter === 'all' || filter === '<?= esc($item['category']) ?>'" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform scale-95"
                     x-transition:enter-end="opacity-100 transform scale-100"
                     class="group relative aspect-[4/3] rounded-2xl overflow-hidden cursor-pointer shadow-sm hover:shadow-xl transition-all"
                     @click="openLightbox('<?= base_url('uploads/gallery/' . $item['image_path']) ?>', '<?= esc($item['title']) ?>')">
                    
                    <img src="<?= base_url('uploads/gallery/' . $item['image_path']) ?>" alt="<?= esc($item['title']) ?>" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute bottom-0 left-0 w-full p-6 text-white translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            <p class="text-xs font-bold text-accent-400 uppercase tracking-wider mb-1"><?= esc($item['category']) ?></p>
                            <?php if (!empty($item['title'])): ?>
                            <h3 class="text-lg font-bold truncate"><?= esc($item['title']) ?></h3>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Fallback Static Images for Demo -->
                <div x-show="filter === 'all' || filter === 'events'" @click="openLightbox('https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80', 'Annual Day')" class="group relative aspect-[4/3] rounded-2xl overflow-hidden cursor-pointer shadow-sm hover:shadow-xl transition-all bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                         <div class="absolute bottom-0 left-0 w-full p-6 text-white translate-y-4 group-hover:translate-y-0 transition-transform duration-300"><h3 class="text-lg font-bold">Annual Day</h3></div>
                    </div>
                </div>
                 <div x-show="filter === 'all' || filter === 'academics'" @click="openLightbox('https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80', 'Study Time')" class="group relative aspect-[4/3] rounded-2xl overflow-hidden cursor-pointer shadow-sm hover:shadow-xl transition-all bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                     <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                         <div class="absolute bottom-0 left-0 w-full p-6 text-white translate-y-4 group-hover:translate-y-0 transition-transform duration-300"><h3 class="text-lg font-bold">Study Time</h3></div>
                    </div>
                </div>
                 <div x-show="filter === 'all' || filter === 'sports'" @click="openLightbox('https://images.unsplash.com/photo-1629904853716-f004b3bfc8c2?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80', 'Sports Day')" class="group relative aspect-[4/3] rounded-2xl overflow-hidden cursor-pointer shadow-sm hover:shadow-xl transition-all bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1629904853716-f004b3bfc8c2?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                     <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                         <div class="absolute bottom-0 left-0 w-full p-6 text-white translate-y-4 group-hover:translate-y-0 transition-transform duration-300"><h3 class="text-lg font-bold">Sports Day</h3></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div x-show="lightboxOpen" class="fixed inset-0 z-[100] flex items-center justify-center bg-black/95 backdrop-blur-sm" x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        
        <button @click="lightboxOpen = false" class="absolute top-6 right-6 text-white hover:text-accent-400 focus:outline-none p-2">
            <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>

        <div class="max-w-7xl max-h-[90vh] p-4 flex flex-col items-center">
            <img :src="currentImage" class="max-w-full max-h-[85vh] rounded shadow-2xl" alt="Gallery">
            <p x-show="currentTitle" x-text="currentTitle" class="text-white mt-4 text-lg font-medium"></p>
        </div>
    </div>
</section>

<script>
    function galleryApp() {
        return {
            filter: 'all',
            lightboxOpen: false,
            currentImage: '',
            currentTitle: '',
            categories: [
                { id: 'all', label: 'All Photos' },
                { id: 'events', label: 'Events' },
                { id: 'academics', label: 'Academics' },
                { id: 'sports', label: 'Sports' },
                { id: 'facilities', label: 'Facilities' }
            ],
            openLightbox(src, title) {
                this.currentImage = src;
                this.currentTitle = title;
                this.lightboxOpen = true;
            }
        }
    }
</script>

<?= $this->endSection() ?>