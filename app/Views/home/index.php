<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero Image Slider -->
<section class="relative h-[600px] lg:h-[700px] overflow-hidden bg-primary-950" x-data="{
    activeSlide: 0,
    slides: [
        {
            image: '<?= base_url('uploads/hero_bus.jpg') ?>',
            title: 'Welcome to Moon Star',
            subtitle: 'A Legacy of Educational Excellence',
            cta: 'Learn More',
            link: '<?= base_url('about') ?>'
        },
        {
            image: '<?= base_url('uploads/hero/students_bus.jpg') ?>',
            title: 'Completed Transport Facility',
            subtitle: 'Safe, Reliable & GPS-Tracked Fleet for Your Peace of Mind',
            cta: 'Bus Routes',
            link: '<?= base_url('bus-routes') ?>'
        },
        {
            image: '<?= base_url('uploads/hero/computer_lab.jpg') ?>',
            title: 'Modern Learning Spaces',
            subtitle: 'Empowering Students with State-of-the-Art Technology',
            cta: 'Academics',
            link: '<?= base_url('academics') ?>'
        }
    ],
    timer: null,
    startTimer() {
        this.timer = setInterval(() => {
            this.activeSlide = (this.activeSlide + 1) % this.slides.length;
        }, 5000);
    },
    stopTimer() {
        clearInterval(this.timer);
    }
}" x-init="startTimer()" @mouseenter="stopTimer()" @mouseleave="startTimer()">

    <!-- Slides -->
    <template x-for="(slide, index) in slides" :key="index">
        <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out" x-show="activeSlide === index"
            x-transition:enter="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="opacity-100"
            x-transition:leave-end="opacity-0">

            <!-- Image -->
            <img :src="slide.image" class="absolute inset-0 w-full h-full object-cover" alt="Hero Slide">

            <!-- Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-primary-950/90 via-primary-950/50 to-transparent"></div>

            <!-- Content -->
            <div class="absolute inset-0 flex items-center justify-center text-center px-4 sm:px-6 lg:px-8">
                <div class="max-w-4xl mx-auto px-4" x-show="activeSlide === index"
                    x-transition:enter="transition ease-out duration-700 delay-300"
                    x-transition:enter-start="opacity-0 translate-y-8"
                    x-transition:enter-end="opacity-100 translate-y-0">
                    <span
                        class="inline-block py-1 px-3 rounded-full bg-white border border-white backdrop-blur-md text-primary-950 text-xs md:text-sm font-bold mb-4 md:mb-6 uppercase tracking-wider shadow-lg">
                        Admissions Open 2026-27
                    </span>
                    <h1 class="text-3xl md:text-6xl lg:text-7xl font-bold font-heading text-white tracking-tight mb-4 md:mb-6 leading-tight drop-shadow-lg"
                        x-text="slide.title"></h1>
                    <p class="text-sm md:text-2xl text-slate-200 max-w-2xl mx-auto mb-6 md:mb-10 leading-relaxed font-light drop-shadow-md"
                        x-text="slide.subtitle"></p>

                    <div class="flex flex-col sm:flex-row gap-3 md:gap-4 justify-center items-center">
                        <a :href="slide.link"
                            class="w-auto px-6 py-3 md:px-8 md:py-4 bg-accent-500 hover:bg-accent-400 text-primary-950 font-bold rounded-full shadow-lg shadow-accent-500/20 transition-all hover:scale-105 hover:shadow-accent-500/40 text-sm md:text-lg">
                            <span x-text="slide.cta"></span>
                        </a>
                        <a href="<?= base_url('contact') ?>"
                            class="w-auto px-6 py-3 md:px-8 md:py-4 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-full backdrop-blur-md border border-white/20 transition-all hover:scale-105 text-sm md:text-lg flex items-center justify-center gap-2">
                            <span>Visit Campus</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <!-- Navigation Controls -->
    <div class="absolute bottom-8 left-0 w-full flex justify-center space-x-3 z-20">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="activeSlide = index"
                class="w-3 h-3 rounded-full transition-all duration-300 border border-white/50"
                :class="activeSlide === index ? 'bg-accent-500 w-8' : 'bg-white/30 hover:bg-white'">
            </button>
        </template>
    </div>

    <!-- Arrow Navigation (Desktop) -->
    <button @click="activeSlide = (activeSlide === 0) ? slides.length - 1 : activeSlide - 1"
        class="hidden md:flex absolute top-1/2 left-4 z-20 w-12 h-12 rounded-full bg-black/20 text-white items-center justify-center hover:bg-black/40 backdrop-blur-sm transition-colors -translate-y-1/2 group">
        <svg class="w-6 h-6 group-hover:-translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
    <button @click="activeSlide = (activeSlide + 1) % slides.length"
        class="hidden md:flex absolute top-1/2 right-4 z-20 w-12 h-12 rounded-full bg-black/20 text-white items-center justify-center hover:bg-black/40 backdrop-blur-sm transition-colors -translate-y-1/2 group">
        <svg class="w-6 h-6 group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>
</section>

<!-- Stats / Trust Indicators -->
<section
    class="py-8 md:py-12 bg-white -mt-8 relative z-20 mx-4 lg:mx-8 rounded-3xl shadow-xl border border-slate-100 max-w-6xl lg:mx-auto">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8 text-center divide-x divide-slate-100">
        <div class="p-2 md:p-4">
            <p class="text-2xl md:text-4xl font-bold font-heading text-primary-600 mb-1">15+</p>
            <p class="text-xs md:text-sm text-slate-500 uppercase tracking-wide font-medium">Years of Excellence</p>
        </div>
        <div class="p-2 md:p-4">
            <p class="text-2xl md:text-4xl font-bold font-heading text-primary-600 mb-1">1200+</p>
            <p class="text-xs md:text-sm text-slate-500 uppercase tracking-wide font-medium">Happy Students</p>
        </div>
        <div class="p-2 md:p-4">
            <p class="text-2xl md:text-4xl font-bold font-heading text-primary-600 mb-1">100%</p>
            <p class="text-xs md:text-sm text-slate-500 uppercase tracking-wide font-medium">University Placement</p>
        </div>
        <div class="p-2 md:p-4">
            <p class="text-2xl md:text-4xl font-bold font-heading text-primary-600 mb-1">50+</p>
            <p class="text-xs md:text-sm text-slate-500 uppercase tracking-wide font-medium">Expert Faculty</p>
        </div>
    </div>
</section>

<!-- Academics Preview -->
<section class="py-12 md:py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10 md:mb-16">
            <h2 class="text-2xl md:text-5xl font-bold font-heading text-primary-950 mb-4">Why Choose Moonstar?</h2>
            <div class="h-1 w-24 bg-accent-400 mx-auto rounded-full"></div>
            <p class="mt-4 text-slate-600 max-w-2xl mx-auto text-base md:text-lg">We provide a holistic learning
                environment where
                every child is encouraged to discover their unique potential.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            <!-- Computer Lab -->
            <div
                class="group bg-white rounded-2xl p-5 md:p-8 shadow-soft hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-slate-100">
                <div class="text-4xl mb-4">💻</div>
                <h3 class="text-xl font-bold text-slate-900 mb-3 font-heading">Computer Lab</h3>
                <p class="text-slate-600 leading-relaxed text-sm md:text-base">The Computer Lab is well-equipped with
                    modern computers and updated software to help students develop essential digital skills. It provides
                    hands-on learning in computer fundamentals, coding, internet usage, and educational applications,
                    preparing students for a technology-driven world.</p>
            </div>

            <!-- Physics Lab -->
            <div
                class="group bg-white rounded-2xl p-5 md:p-8 shadow-soft hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-slate-100">
                <div class="text-4xl mb-4">🔬</div>
                <h3 class="text-xl font-bold text-slate-900 mb-3 font-heading">Physics Lab</h3>
                <p class="text-slate-600 leading-relaxed text-sm md:text-base">The Physics Lab allows students to
                    explore and understand the laws of nature through practical experiments. It is equipped with
                    standard apparatus for mechanics, optics, electricity, and magnetism, helping students strengthen
                    concepts learned in the classroom through observation and experimentation.</p>
            </div>

            <!-- Chemistry Lab -->
            <div
                class="group bg-white rounded-2xl p-5 md:p-8 shadow-soft hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-slate-100">
                <div class="text-4xl mb-4">🧪</div>
                <h3 class="text-xl font-bold text-slate-900 mb-3 font-heading">Chemistry Lab</h3>
                <p class="text-slate-600 leading-relaxed text-sm md:text-base">The Chemistry Lab is a safe and
                    well-ventilated space designed for conducting chemical experiments. It contains all necessary
                    equipment, chemicals, and safety measures to help students learn about chemical reactions,
                    compounds, and laboratory techniques under proper supervision.</p>
            </div>

            <!-- Biology Lab -->
            <div
                class="group bg-white rounded-2xl p-5 md:p-8 shadow-soft hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-slate-100">
                <div class="text-4xl mb-4">🌱</div>
                <h3 class="text-xl font-bold text-slate-900 mb-3 font-heading">Biology Lab</h3>
                <p class="text-slate-600 leading-relaxed text-sm md:text-base">The Biology Lab provides students with
                    opportunities to study living organisms through experiments, models, charts, and microscopes. It
                    supports practical learning in botany, zoology, and human biology, encouraging curiosity and
                    scientific thinking.</p>
            </div>

            <!-- Maths Lab -->
            <div
                class="group bg-white rounded-2xl p-5 md:p-8 shadow-soft hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-slate-100">
                <div class="text-4xl mb-4">➗</div>
                <h3 class="text-xl font-bold text-slate-900 mb-3 font-heading">Maths Lab</h3>
                <p class="text-slate-600 leading-relaxed text-sm md:text-base">The Maths Lab makes learning mathematics
                    fun and interactive through models, puzzles, charts, and activities. It helps students understand
                    mathematical concepts practically, develop logical reasoning, and enhance problem-solving skills.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Events & Notices Grid -->
<section class="py-12 md:py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-16">

            <!-- Events Column -->
            <div>
                <div class="flex items-center justify-between mb-6 md:mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold font-heading text-primary-950">Upcoming Events</h2>
                    <a href="#"
                        class="text-primary-600 font-medium hover:text-primary-800 flex items-center group text-sm md:text-base">
                        View All <span class="group-hover:translate-x-1 transition-transform ml-1">&rarr;</span>
                    </a>
                </div>

                <div class="space-y-6">
                    <?php if (!empty($events)): ?>
                        <?php foreach ($events as $event): ?>
                            <div
                                class="flex gap-6 group hover:bg-slate-50 p-4 rounded-xl transition-colors border border-transparent hover:border-slate-100">
                                <!-- Date Badge -->
                                <div
                                    class="flex-shrink-0 text-center bg-primary-50 text-primary-700 rounded-xl p-3 w-16 h-16 flex flex-col justify-center border border-primary-100">
                                    <span
                                        class="block text-xs uppercase font-bold"><?= date('M', strtotime($event['event_date'])) ?></span>
                                    <span
                                        class="block text-xl font-bold font-heading"><?= date('d', strtotime($event['event_date'])) ?></span>
                                </div>
                                <div class="flex-grow">
                                    <h3
                                        class="text-lg font-bold text-slate-800 group-hover:text-primary-700 transition-colors mb-1">
                                        <?= esc($event['title']) ?>
                                    </h3>
                                    <div class="flex items-center text-sm text-slate-500 mb-2 gap-4">
                                        <?php if (!empty($event['event_time'])): ?>
                                            <span class="flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <?= date('g:i A', strtotime($event['event_time'])) ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <p class="text-slate-600 text-sm line-clamp-2">
                                        <?= character_limiter(strip_tags($event['description']), 100) ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="bg-slate-50 rounded-xl p-8 text-center border-2 border-dashed border-slate-200">
                            <p class="text-slate-500">No upcoming events scheduled.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Notices Column -->
            <div class="bg-primary-50 rounded-3xl p-5 md:p-8 lg:p-10 border border-primary-100">
                <div class="flex items-center justify-between mb-6 md:mb-8">
                    <h2 class="text-xl md:text-2xl font-bold font-heading text-primary-950">Notice Board</h2>
                    <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                </div>

                <div class="space-y-4 max-h-[500px] overflow-y-auto pr-2 custom-scrollbar">
                    <?php if (!empty($notices)): ?>
                        <?php foreach ($notices as $notice): ?>
                            <div
                                class="bg-white rounded-xl p-5 shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-bold text-slate-800 text-sm"><?= esc($notice['title']) ?></h3>
                                    <?php if ($notice['priority'] === 'high'): ?>
                                        <span
                                            class="bg-red-100 text-red-700 text-[10px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider">Urgent</span>
                                    <?php endif; ?>
                                </div>
                                <p class="text-xs text-slate-500 mb-3"><?= date('M d, Y', strtotime($notice['created_at'])) ?>
                                </p>
                                <p class="text-slate-600 text-sm leading-relaxed mb-3">
                                    <?= character_limiter(strip_tags($notice['content']), 120) ?>
                                </p>
                                <?php if (!empty($notice['attachment'])): ?>
                                    <a href="<?= base_url('uploads/notices/' . $notice['attachment']) ?>" target="_blank"
                                        class="inline-flex items-center text-xs font-semibold text-primary-600 hover:text-primary-800">
                                        <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                            </path>
                                        </svg>
                                        Download Attachment
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-center text-slate-500 py-4">No active notices.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Carousel -->
<section class="py-12 md:py-24 bg-primary-950 relative overflow-hidden text-white">
    <div
        class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4xKSIvPjwvc3ZnPg==')] opacity-20">
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-10 md:mb-16">
            <h2 class="text-2xl md:text-5xl font-bold font-heading mb-4">Parent Voices</h2>
            <div class="flex justify-center gap-1">
                <svg class="w-6 h-6 text-accent-400" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                </svg>
                <svg class="w-6 h-6 text-accent-400" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                </svg>
                <svg class="w-6 h-6 text-accent-400" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                </svg>
                <svg class="w-6 h-6 text-accent-400" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                </svg>
                <svg class="w-6 h-6 text-accent-400" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                </svg>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
            <div
                class="bg-white/10 backdrop-blur-sm rounded-2xl p-5 md:p-8 border border-white/10 hover:bg-white/15 transition-all">
                <p class="text-base md:text-lg italic text-slate-300 mb-4 md:mb-6">"Moonstar has exceeded our
                    expectations. The teachers are
                    dedicated, and my child has flourished both academically and personally."</p>
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 rounded-full bg-gradient-to-br from-accent-400 to-accent-600 flex items-center justify-center text-primary-950 font-bold text-xl">
                        S</div>
                    <div>
                        <h4 class="font-bold text-white">Mr. Surender</h4>
                        <p class="text-sm text-slate-400">Father of Grade 6 and Grade 1 student</p>
                    </div>
                </div>
            </div>
            <div
                class="bg-white/10 backdrop-blur-sm rounded-2xl p-5 md:p-8 border border-white/10 hover:bg-white/15 transition-all">
                <p class="text-base md:text-lg italic text-slate-300 mb-4 md:mb-6">"The facilities are world-class and
                    the emphasis on
                    character development alongside academics makes Moonstar stand out."</p>
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 rounded-full bg-gradient-to-br from-secondary-400 to-secondary-600 flex items-center justify-center text-white font-bold text-xl">
                        V</div>
                    <div>
                        <h4 class="font-bold text-white">Mr. Vijay Sharma</h4>
                        <p class="text-sm text-slate-400">Father of Grade 6 student</p>
                    </div>
                </div>
            </div>
            <div
                class="bg-white/10 backdrop-blur-sm rounded-2xl p-5 md:p-8 border border-white/10 hover:bg-white/15 transition-all">
                <p class="text-base md:text-lg italic text-slate-300 mb-4 md:mb-6">"We're grateful for the nurturing
                    environment and
                    individual attention our daughter receives. Highly recommended!"</p>
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 rounded-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center text-white font-bold text-xl">
                        R</div>
                    <div>
                        <h4 class="font-bold text-white">Mrs. Ruchi Singla</h4>
                        <p class="text-sm text-slate-400">Mother of Grade 3 student</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section
    class="py-12 md:py-20 bg-gradient-to-br from-accent-400 to-accent-500 text-primary-950 relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
        <h2 class="text-2xl md:text-5xl font-bold font-heading mb-4 md:mb-6">Ready to Join Our Community?</h2>
        <p class="text-base md:text-xl font-medium mb-6 md:mb-10 opacity-90">Admissions for the upcoming academic year
            are now open. Secure
            your child's future today.</p>
        <div class="flex flex-col sm:flex-row gap-3 md:gap-4 justify-center">
            <a href="<?= base_url('admissions') ?>"
                class="px-6 py-3 md:px-8 md:py-4 bg-primary-950 text-white font-bold rounded-full shadow-lg hover:shadow-2xl transition-all hover:-translate-y-1 text-sm md:text-base">
                Start Online Application
            </a>
            <a href="<?= base_url('contact') ?>"
                class="px-6 py-3 md:px-8 md:py-4 bg-white/20 hover:bg-white/30 backdrop-blur-sm border border-black/5 font-bold rounded-full transition-all text-sm md:text-base">
                Talk to a Counselor
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>