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
        <h1 class="text-4xl md:text-5xl font-bold font-heading text-white mb-6">Hall of Fame</h1>
        <p class="text-lg text-primary-200 mb-8 max-w-2xl mx-auto">Celebrating the academic excellence and outstanding
            achievements of our students.</p>
    </div>
</section>

<!-- Toppers Grid -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-16">
            <span class="text-accent-500 font-bold tracking-wider uppercase text-sm">Class of 2024</span>
            <h2 class="text-3xl md:text-4xl font-bold font-heading text-primary-950 mt-2">Our Top Achievers</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Topper 1 -->
            <div
                class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 group">
                <div class="relative h-64 bg-primary-100 overflow-hidden">
                    <!-- Placeholder for student image -->
                    <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Student Name"
                        class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-105">
                    <div
                        class="absolute top-4 right-4 bg-accent-500 text-white font-bold px-3 py-1 rounded-full text-sm shadow-md">
                        98.5%</div>
                </div>
                <div class="p-8 text-center relative">
                    <div
                        class="absolute -top-10 left-1/2 transform -translate-x-1/2 w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-lg border-4 border-white text-accent-500">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mt-4 mb-1">Sarah Johnson</h3>
                    <p class="text-primary-600 font-medium text-sm uppercase tracking-wide mb-4">Grade 12 Science</p>
                    <p class="text-slate-500 text-sm italic">"Hard work and persistence are the keys to unlocking your
                        potential."</p>
                </div>
            </div>

            <!-- Topper 2 -->
            <div
                class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 group">
                <div class="relative h-64 bg-primary-100 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Student Name"
                        class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-105">
                    <div
                        class="absolute top-4 right-4 bg-accent-500 text-white font-bold px-3 py-1 rounded-full text-sm shadow-md">
                        97.2%</div>
                </div>
                <div class="p-8 text-center relative">
                    <div
                        class="absolute -top-10 left-1/2 transform -translate-x-1/2 w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-lg border-4 border-white text-primary-300">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mt-4 mb-1">Michael Chen</h3>
                    <p class="text-primary-600 font-medium text-sm uppercase tracking-wide mb-4">Grade 12 Commerce</p>
                    <p class="text-slate-500 text-sm italic">"Curiosity is the wick in the candle of learning."</p>
                </div>
            </div>

            <!-- Topper 3 -->
            <div
                class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 group">
                <div class="relative h-64 bg-primary-100 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Student Name"
                        class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-105">
                    <div
                        class="absolute top-4 right-4 bg-accent-500 text-white font-bold px-3 py-1 rounded-full text-sm shadow-md">
                        96.8%</div>
                </div>
                <div class="p-8 text-center relative">
                    <div
                        class="absolute -top-10 left-1/2 transform -translate-x-1/2 w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-lg border-4 border-white text-amber-700">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mt-4 mb-1">Emily Davis</h3>
                    <p class="text-primary-600 font-medium text-sm uppercase tracking-wide mb-4">Grade 10</p>
                    <p class="text-slate-500 text-sm italic">"Education is the most powerful weapon which you can use to
                        change the world."</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20 bg-primary-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="p-6">
                <div class="text-4xl md:text-5xl font-bold font-heading text-accent-400 mb-2">50+</div>
                <div class="text-sm text-primary-200 uppercase tracking-wider">State Rankers</div>
            </div>
            <div class="p-6">
                <div class="text-4xl md:text-5xl font-bold font-heading text-accent-400 mb-2">100%</div>
                <div class="text-sm text-primary-200 uppercase tracking-wider">Pass Rate</div>
            </div>
            <div class="p-6">
                <div class="text-4xl md:text-5xl font-bold font-heading text-accent-400 mb-2">25+</div>
                <div class="text-sm text-primary-200 uppercase tracking-wider">Universities</div>
            </div>
            <div class="p-6">
                <div class="text-4xl md:text-5xl font-bold font-heading text-accent-400 mb-2">₹5Cr</div>
                <div class="text-sm text-primary-200 uppercase tracking-wider">Scholarships</div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>