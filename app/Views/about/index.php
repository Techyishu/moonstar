<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero Header -->
<section class="relative bg-primary-950 py-20 md:py-32 px-4 sm:px-6 lg:px-8 text-center overflow-hidden">
    <!-- Decorative background -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full max-w-7xl">
        <div
            class="absolute top-20 left-10 w-48 md:w-64 h-48 md:h-64 bg-primary-700/30 rounded-full blur-3xl animate-pulse">
        </div>
        <div class="absolute bottom-20 right-10 w-48 md:w-64 h-48 md:h-64 bg-accent-500/20 rounded-full blur-3xl"
            style="animation-delay: 1.5s"></div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto">
        <h1 class="text-3xl md:text-6xl font-bold font-heading text-white mb-4 md:mb-6 animate-fade-in-up">About
            Moonstar</h1>
        <p class="text-base md:text-xl text-primary-200 leading-relaxed font-light">
            Founded with a vision to illuminate young minds, Moonstar School has been a pioneer in holistic education
            for over two decades.
        </p>
    </div>
</section>

<!-- Values Section (Mission/Vision) -->
<section class="py-12 md:py-24 bg-white relative -mt-10 md:-mt-16 z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
            <!-- Mission -->
            <div
                class="bg-white rounded-2xl shadow-xl p-6 md:p-10 border-t-4 border-accent-400 transform hover:-translate-y-2 transition-all duration-300">
                <div
                    class="w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-accent-50 text-accent-600 flex items-center justify-center mb-4 md:mb-6">
                    <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h2 class="text-xl md:text-2xl font-bold font-heading text-primary-950 mb-3 md:mb-4">Our Mission</h2>
                <p class="text-slate-600 leading-relaxed text-base md:text-lg">
                    To empower every student with knowledge, character, and creativity. We strive to foster an inclusive
                    environment where curiosity is celebrated and excellence is a habit.
                </p>
            </div>

            <!-- Vision -->
            <div
                class="bg-white rounded-2xl shadow-xl p-6 md:p-10 border-t-4 border-primary-500 transform hover:-translate-y-2 transition-all duration-300">
                <div
                    class="w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-primary-50 text-primary-600 flex items-center justify-center mb-4 md:mb-6">
                    <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <h2 class="text-xl md:text-2xl font-bold font-heading text-primary-950 mb-3 md:mb-4">Our Vision</h2>
                <p class="text-slate-600 leading-relaxed text-base md:text-lg">
                    To be a global leader in education, nurturing compassionate and innovative citizens who are prepared
                    to shape the future of our world with integrity and wisdom.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Values Grid (Replaces Timeline) -->
<section class="py-12 md:py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10 md:mb-16">
            <span class="text-accent-500 font-bold tracking-wider uppercase text-xs md:text-sm">Our Philosophy</span>
            <h2 class="text-2xl md:text-5xl font-bold font-heading text-primary-950 mt-2">Core Values</h2>
            <p class="mt-3 md:mt-4 text-slate-500 max-w-2xl mx-auto text-sm md:text-base">The principles that guide our
                everyday interactions and educational approach.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            <!-- Value 1 -->
            <div
                class="bg-white p-5 md:p-8 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 border border-slate-100 group">
                <div
                    class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Integrity</h3>
                <p class="text-slate-600">We act with honesty and strong moral principles in everything we do.</p>
            </div>

            <!-- Value 2 -->
            <div
                class="bg-white p-5 md:p-8 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 border border-slate-100 group">
                <div
                    class="w-12 h-12 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Innovation</h3>
                <p class="text-slate-600">We embrace creativity and new ideas to prepare for a changing world.</p>
            </div>

            <!-- Value 3 -->
            <div
                class="bg-white p-5 md:p-8 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 border border-slate-100 group">
                <div
                    class="w-12 h-12 bg-pink-50 text-pink-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-pink-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Empathy</h3>
                <p class="text-slate-600">We cultivate kindness, understanding, and respect for others' perspectives.
                </p>
            </div>

            <!-- Value 4 -->
            <div
                class="bg-white p-5 md:p-8 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 border border-slate-100 group">
                <div
                    class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-green-600 group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Community</h3>
                <p class="text-slate-600">We work together to build a supportive and inclusive family of learners.</p>
            </div>
        </div>
    </div>
</section>

<!-- Leadership Team -->
<section class="py-12 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10 md:mb-16">
            <h2 class="text-2xl md:text-5xl font-bold font-heading text-primary-950">Meet Our Leaders</h2>
            <p class="mt-3 md:mt-4 text-slate-500 max-w-2xl mx-auto text-sm md:text-base">The dedicated educators
                guiding our path.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-10">
            <?php if (!empty($leadership)): ?>
                <?php foreach ($leadership as $leader): ?>
                    <div class="group relative overflow-hidden rounded-2xl shadow-lg aspect-[3/4]">
                        <?php if (!empty($leader['photo'])): ?>
                            <img src="<?= base_url('uploads/teachers/' . $leader['photo']) ?>"
                                alt="<?= esc($leader['first_name']) ?>"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <?php else: ?>
                            <div class="absolute inset-0 bg-slate-200 flex items-center justify-center text-slate-400">
                                <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        <?php endif; ?>

                        <div class="absolute inset-0 bg-gradient-to-t from-primary-950 via-primary-900/50 to-transparent"></div>

                        <div
                            class="absolute bottom-0 left-0 w-full p-6 text-white transform translate-y-2 group-hover:translate-y-0 transition-transform">
                            <h3 class="text-xl font-bold font-heading mb-1">
                                <?= esc($leader['first_name'] . ' ' . $leader['last_name']) ?>
                            </h3>
                            <p class="text-accent-400 font-medium mb-2 uppercase tracking-wider text-xs">
                                <?= esc($leader['subject']) ?>
                            </p>
                            <p class="text-sm text-slate-300 opacity-0 group-hover:opacity-100 transition-opacity delay-100">
                                <?= esc($leader['qualification']) ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Fallback / Static Data for Design -->
                <div class="group relative overflow-hidden rounded-2xl shadow-lg bg-slate-100 aspect-[3/4]">
                    <div class="absolute inset-0 bg-slate-200 flex items-center justify-center text-slate-400"><svg
                            class="w-16 h-16" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd" />
                        </svg></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-primary-950 via-primary-900/40 to-transparent"></div>
                    <div
                        class="absolute bottom-0 left-0 w-full p-6 text-white translate-y-2 group-hover:translate-y-0 transition-transform">
                        <h3 class="text-xl font-bold font-heading mb-1">Dr. Jane Smith</h3>
                        <p class="text-accent-400 font-medium text-xs uppercase">Principal</p>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg bg-slate-100 aspect-[3/4]">
                    <div class="absolute inset-0 bg-slate-200 flex items-center justify-center text-slate-400"><svg
                            class="w-16 h-16" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd" />
                        </svg></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-primary-950 via-primary-900/40 to-transparent"></div>
                    <div
                        class="absolute bottom-0 left-0 w-full p-6 text-white translate-y-2 group-hover:translate-y-0 transition-transform">
                        <h3 class="text-xl font-bold font-heading mb-1">Mr. Robert Fox</h3>
                        <p class="text-accent-400 font-medium text-xs uppercase">Vice Principal</p>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg bg-slate-100 aspect-[3/4]">
                    <div class="absolute inset-0 bg-slate-200 flex items-center justify-center text-slate-400"><svg
                            class="w-16 h-16" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd" />
                        </svg></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-primary-950 via-primary-900/40 to-transparent"></div>
                    <div
                        class="absolute bottom-0 left-0 w-full p-6 text-white translate-y-2 group-hover:translate-y-0 transition-transform">
                        <h3 class="text-xl font-bold font-heading mb-1">Ms. Sarah Connor</h3>
                        <p class="text-accent-400 font-medium text-xs uppercase">Academic Coordinator</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>