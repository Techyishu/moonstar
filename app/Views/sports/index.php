<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero Header -->
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
        <h1 class="text-4xl md:text-5xl font-bold font-heading text-white mb-6">Sports & Facilities</h1>
        <p class="text-lg text-primary-200">World-class sports infrastructure for holistic development</p>
    </div>
</section>

<!-- Content Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Introduction -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <p class="text-lg text-slate-600 leading-relaxed">At Moonstar School, we believe that physical education is
                vital for holistic development. Our state-of-the-art sports facilities help students excel in athletics
                while building character, teamwork, and leadership skills.</p>
        </div>

        <!-- Outdoor Sports -->
        <div class="mb-20">
            <div class="flex items-center justify-center mb-10">
                <div class="h-px bg-slate-200 flex-grow"></div>
                <h2 class="text-3xl font-bold text-slate-900 px-6">Outdoor Sports</h2>
                <div class="h-px bg-slate-200 flex-grow"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Cricket -->
                <div
                    class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 border border-green-100 hover:shadow-xl transition-shadow group">
                    <div
                        class="w-16 h-16 bg-green-500 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Cricket Ground</h3>
                    <p class="text-slate-600 text-sm mb-3">Full-size turf wicket with professional coaching</p>
                    <ul class="space-y-1 text-sm text-slate-500">
                        <li class="flex items-center"><span
                                class="w-1.5 h-1.5 bg-green-500 rounded-full mr-2"></span>Practice nets</li>
                        <li class="flex items-center"><span
                                class="w-1.5 h-1.5 bg-green-500 rounded-full mr-2"></span>Floodlights</li>
                    </ul>
                </div>

                <!-- Football -->
                <div
                    class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-100 hover:shadow-xl transition-shadow group">
                    <div
                        class="w-16 h-16 bg-blue-500 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Football Field</h3>
                    <p class="text-slate-600 text-sm mb-3">FIFA standard artificial turf field</p>
                    <ul class="space-y-1 text-sm text-slate-500">
                        <li class="flex items-center"><span
                                class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-2"></span>Astroturf surface</li>
                        <li class="flex items-center"><span
                                class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-2"></span>Goal posts</li>
                    </ul>
                </div>

                <!-- Basketball -->
                <div
                    class="bg-gradient-to-br from-orange-50 to-red-50 rounded-2xl p-6 border border-orange-100 hover:shadow-xl transition-shadow group">
                    <div
                        class="w-16 h-16 bg-orange-500 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Basketball Court</h3>
                    <p class="text-slate-600 text-sm mb-3">Indoor & outdoor courts available</p>
                    <ul class="space-y-1 text-sm text-slate-500">
                        <li class="flex items-center"><span
                                class="w-1.5 h-1.5 bg-orange-500 rounded-full mr-2"></span>Acrylic flooring</li>
                        <li class="flex items-center"><span
                                class="w-1.5 h-1.5 bg-orange-500 rounded-full mr-2"></span>Height-adjustable hoops</li>
                    </ul>
                </div>

                <!-- Lawn Tennis -->
                <div
                    class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-6 border border-purple-100 hover:shadow-xl transition-shadow group">
                    <div
                        class="w-16 h-16 bg-purple-500 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Lawn Tennis</h3>
                    <p class="text-slate-600 text-sm mb-3">Professional clay and synthetic courts</p>
                    <ul class="space-y-1 text-sm text-slate-500">
                        <li class="flex items-center"><span class="w-1.5 h-1.5 bg-purple-500 rounded-full mr-2"></span>2
                            Professional courts</li>
                        <li class="flex items-center"><span
                                class="w-1.5 h-1.5 bg-purple-500 rounded-full mr-2"></span>Certified coaches</li>
                    </ul>
                </div>

                <!-- Athletics Track -->
                <div
                    class="bg-gradient-to-br from-yellow-50 to-amber-50 rounded-2xl p-6 border border-yellow-100 hover:shadow-xl transition-shadow group">
                    <div
                        class="w-16 h-16 bg-yellow-500 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Athletics Track</h3>
                    <p class="text-slate-600 text-sm mb-3">400m synthetic running track</p>
                    <ul class="space-y-1 text-sm text-slate-500">
                        <li class="flex items-center"><span
                                class="w-1.5 h-1.5 bg-yellow-500 rounded-full mr-2"></span>8-lane track</li>
                        <li class="flex items-center"><span
                                class="w-1.5 h-1.5 bg-yellow-500 rounded-full mr-2"></span>Long jump pit</li>
                    </ul>
                </div>

                <!-- Volleyball -->
                <div
                    class="bg-gradient-to-br from-teal-50 to-cyan-50 rounded-2xl p-6 border border-teal-100 hover:shadow-xl transition-shadow group">
                    <div
                        class="w-16 h-16 bg-teal-500 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Volleyball Court</h3>
                    <p class="text-slate-600 text-sm mb-3">Sand and hard court options</p>
                    <ul class="space-y-1 text-sm text-slate-500">
                        <li class="flex items-center"><span
                                class="w-1.5 h-1.5 bg-teal-500 rounded-full mr-2"></span>Beach volleyball</li>
                        <li class="flex items-center"><span
                                class="w-1.5 h-1.5 bg-teal-500 rounded-full mr-2"></span>Indoor court</li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- Indoor Games -->
        <div>
            <div class="flex items-center justify-center mb-10">
                <div class="h-px bg-slate-200 flex-grow"></div>
                <h2 class="text-3xl font-bold text-slate-900 px-6">Indoor Games & Activities</h2>
                <div class="h-px bg-slate-200 flex-grow"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Badminton -->
                <div
                    class="bg-white rounded-xl shadow-lg border border-slate-100 p-6 hover:shadow-xl transition-shadow">
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-primary-500 to-primary-600 rounded-lg flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-center text-slate-900 mb-2">Badminton</h3>
                    <p class="text-sm text-center text-slate-600">4 synthetic courts</p>
                </div>

                <!-- Table Tennis -->
                <div
                    class="bg-white rounded-xl shadow-lg border border-slate-100 p-6 hover:shadow-xl transition-shadow">
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-accent-500 to-accent-600 rounded-lg flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-center text-slate-900 mb-2">Table Tennis</h3>
                    <p class="text-sm text-center text-slate-600">6 professional tables</p>
                </div>

                <!-- Chess -->
                <div
                    class="bg-white rounded-xl shadow-lg border border-slate-100 p-6 hover:shadow-xl transition-shadow">
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-slate-700 to-slate-800 rounded-lg flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-center text-slate-900 mb-2">Chess & Carrom</h3>
                    <p class="text-sm text-center text-slate-600">Dedicated games room</p>
                </div>

                <!-- Yoga -->
                <div
                    class="bg-white rounded-xl shadow-lg border border-slate-100 p-6 hover:shadow-xl transition-shadow">
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-center text-slate-900 mb-2">Yoga Hall</h3>
                    <p class="text-sm text-center text-slate-600">Meditation & fitness</p>
                </div>

            </div>
        </div>

        <!-- CTA Section -->
        <div
            class="mt-16 bg-gradient-to-r from-primary-600 to-accent-500 rounded-2xl p-8 md:p-12 text-center text-white">
            <h2 class="text-3xl font-bold mb-4">Join Our Sports Programs</h2>
            <p class="text-lg mb-6 opacity-90">Enroll your child in our comprehensive sports training programs led by
                certified coaches</p>
            <a href="<?= base_url('contact') ?>"
                class="inline-flex items-center px-8 py-3 bg-white text-primary-600 font-bold rounded-xl hover:bg-slate-50 transition-colors">
                Contact Us
                <svg class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
        </div>

    </div>
</section>

<?= $this->endSection() ?>