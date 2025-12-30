<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<section class="relative bg-primary-950 py-24 px-4 sm:px-6 lg:px-8 text-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute top-1/2 left-0 w-full h-96 bg-primary-800/30 -skew-y-6 transform origin-left"></div>
    </div>

    <div class="relative z-10 max-w-3xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-bold font-heading text-white mb-6">Our Educators</h1>
        <p class="text-lg text-primary-200 mb-8 max-w-2xl mx-auto">Meet the passionate individuals dedicated to shaping
            the minds of tomorrow.</p>
    </div>
</section>

<!-- Staff Grid -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Staff 1 -->
            <div
                class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden border border-slate-100">
                <div class="aspect-square relative overflow-hidden bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Teacher"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 grayscale group-hover:grayscale-0">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Dr. Eleanor Rigby</h3>
                    <p class="text-xs text-primary-600 font-bold uppercase tracking-wider mb-2">Principal</p>
                    <p class="text-slate-500 text-sm">Ph.D. in Education Leadership</p>
                </div>
            </div>

            <!-- Staff 2 -->
            <div
                class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden border border-slate-100">
                <div class="aspect-square relative overflow-hidden bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Teacher"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 grayscale group-hover:grayscale-0">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Mr. David Tennant</h3>
                    <p class="text-xs text-primary-600 font-bold uppercase tracking-wider mb-2">Senior Mathematics</p>
                    <p class="text-slate-500 text-sm">M.Sc. Mathematics</p>
                </div>
            </div>

            <!-- Staff 3 -->
            <div
                class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden border border-slate-100">
                <div class="aspect-square relative overflow-hidden bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Teacher"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 grayscale group-hover:grayscale-0">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Ms. Sarah Connor</h3>
                    <p class="text-xs text-primary-600 font-bold uppercase tracking-wider mb-2">Science Dept. Head</p>
                    <p class="text-slate-500 text-sm">M.Ed. Science Education</p>
                </div>
            </div>

            <!-- Staff 4 -->
            <div
                class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden border border-slate-100">
                <div class="aspect-square relative overflow-hidden bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Teacher"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 grayscale group-hover:grayscale-0">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Mr. John Smith</h3>
                    <p class="text-xs text-primary-600 font-bold uppercase tracking-wider mb-2">Physical Education</p>
                    <p class="text-slate-500 text-sm">B.P.Ed. Sports Science</p>
                </div>
            </div>
            <!-- Staff 5 -->
            <div
                class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden border border-slate-100">
                <div class="aspect-square relative overflow-hidden bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1598550881338-960313da4abe?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Teacher"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 grayscale group-hover:grayscale-0">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Ms. Emily Blunt</h3>
                    <p class="text-xs text-primary-600 font-bold uppercase tracking-wider mb-2">Arts & Drama</p>
                    <p class="text-slate-500 text-sm">B.F.A. Performing Arts</p>
                </div>
            </div>

            <!-- Staff 6 -->
            <div
                class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden border border-slate-100">
                <div class="aspect-square relative overflow-hidden bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1531123897727-8f129e1688ce?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Teacher"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 grayscale group-hover:grayscale-0">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Ms. Sophia Loren</h3>
                    <p class="text-xs text-primary-600 font-bold uppercase tracking-wider mb-2">Literature</p>
                    <p class="text-slate-500 text-sm">M.A. English Literature</p>
                </div>
            </div>

            <!-- Staff 7 -->
            <div
                class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden border border-slate-100">
                <div class="aspect-square relative overflow-hidden bg-slate-200">
                    <img src="https://images.unsplash.com/photo-1562788869-4ed32648eb72?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="Teacher"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 grayscale group-hover:grayscale-0">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Mr. Robert Downey</h3>
                    <p class="text-xs text-primary-600 font-bold uppercase tracking-wider mb-2">Chemistry</p>
                    <p class="text-slate-500 text-sm">Ph.D. Chemistry</p>
                </div>
            </div>

            <!-- Join Us -->
            <div
                class="bg-primary-50 rounded-xl border border-dashed border-primary-200 flex flex-col items-center justify-center p-6 text-center group hover:bg-primary-100 transition-colors cursor-pointer">
                <div
                    class="w-16 h-16 rounded-full bg-white text-primary-600 flex items-center justify-center mb-4 shadow-sm group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-primary-900 mb-2">Join Our Team</h3>
                <p class="text-sm text-primary-700">We are always improving our faculty. Send us your resume.</p>
            </div>

        </div>
    </div>
</section>

<?= $this->endSection() ?>