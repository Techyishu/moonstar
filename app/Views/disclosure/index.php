<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero Header -->
<section class="relative bg-primary-950 py-16 md:py-24 px-4 sm:px-6 lg:px-8 text-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div
            class="absolute top-0 right-0 w-64 md:w-96 h-64 md:h-96 bg-accent-500 rounded-full blur-[128px] opacity-20 transform translate-x-1/2 -translate-y-1/2">
        </div>
        <div
            class="absolute bottom-0 left-0 w-64 md:w-96 h-64 md:h-96 bg-primary-600 rounded-full blur-[128px] opacity-20 transform -translate-x-1/2 translate-y-1/2">
        </div>
    </div>
    <div class="relative z-10 max-w-3xl mx-auto">
        <h1 class="text-3xl md:text-5xl font-bold font-heading text-white mb-4 md:mb-6">Mandatory Public Disclosure</h1>
        <p class="text-base md:text-lg text-primary-200">Complete transparency in compliance with CBSE guidelines</p>
    </div>
</section>

<!-- Content Section -->
<section class="py-12 md:py-20 bg-slate-50 min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Introduction -->
        <div class="bg-white rounded-2xl shadow-lg p-5 md:p-8 mb-8 md:mb-10 border border-slate-100">
            <div class="flex flex-col md:flex-row items-start md:space-x-4">
                <div class="flex-shrink-0 mb-4 md:mb-0">
                    <svg class="w-10 h-10 md:w-12 md:h-12 text-primary-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl md:text-2xl font-bold text-slate-900 mb-3 md:mb-4">About Mandatory Disclosure
                    </h2>
                    <p class="text-slate-600 leading-relaxed text-sm md:text-base">In compliance with CBSE guidelines
                        and to maintain
                        complete transparency, Moonstar School provides all essential documents and information for
                        public viewing. These documents are updated regularly and are available for download.</p>
                </div>
            </div>
        </div>

        <!-- Documents Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">

            <!-- Document Card 1 -->
            <div
                class="bg-white rounded-xl shadow-sm border border-slate-200 p-4 md:p-6 hover:shadow-lg transition-shadow group">
                <div class="flex items-start justify-between mb-4">
                    <div
                        class="w-12 h-12 bg-primary-50 rounded-lg flex items-center justify-center group-hover:bg-primary-100 transition-colors">
                        <svg class="w-6 h-6 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <span class="text-xs px-2 py-1 bg-green-100 text-green-800 rounded-full font-medium">Active</span>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">CBSE Affiliation Letter</h3>
                <p class="text-sm text-slate-600 mb-4">Official affiliation certificate from CBSE board</p>
                <a href="#"
                    class="inline-flex items-center text-sm font-semibold text-primary-600 hover:text-primary-700">
                    Download PDF
                    <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </a>
            </div>

            <!-- Document Card 2 -->
            <div
                class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-lg transition-shadow group">
                <div class="flex items-start justify-between mb-4">
                    <div
                        class="w-12 h-12 bg-accent-50 rounded-lg flex items-center justify-center group-hover:bg-accent-100 transition-colors">
                        <svg class="w-6 h-6 text-accent-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <span class="text-xs px-2 py-1 bg-green-100 text-green-800 rounded-full font-medium">Active</span>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Building Safety Certificate</h3>
                <p class="text-sm text-slate-600 mb-4">Structural safety compliance certificate</p>
                <a href="#"
                    class="inline-flex items-center text-sm font-semibold text-primary-600 hover:text-primary-700">
                    Download PDF
                    <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </a>
            </div>

            <!-- Document Card 3 -->
            <div
                class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-lg transition-shadow group">
                <div class="flex items-start justify-between mb-4">
                    <div
                        class="w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center group-hover:bg-red-100 transition-colors">
                        <svg class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                        </svg>
                    </div>
                    <span class="text-xs px-2 py-1 bg-green-100 text-green-800 rounded-full font-medium">Active</span>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Fire Safety Certificate</h3>
                <p class="text-sm text-slate-600 mb-4">Fire NOC from local authorities</p>
                <a href="#"
                    class="inline-flex items-center text-sm font-semibold text-primary-600 hover:text-primary-700">
                    Download PDF
                    <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </a>
            </div>

            <!-- Document Card 4 -->
            <div
                class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-lg transition-shadow group">
                <div class="flex items-start justify-between mb-4">
                    <div
                        class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center group-hover:bg-blue-100 transition-colors">
                        <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                    </div>
                    <span class="text-xs px-2 py-1 bg-green-100 text-green-800 rounded-full font-medium">Active</span>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">DEO Recognition Certificate</h3>
                <p class="text-sm text-slate-600 mb-4">Certificate from District Education Officer</p>
                <a href="#"
                    class="inline-flex items-center text-sm font-semibold text-primary-600 hover:text-primary-700">
                    Download PDF
                    <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </a>
            </div>

            <!-- Document Card 5 -->
            <div
                class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-lg transition-shadow group">
                <div class="flex items-start justify-between mb-4">
                    <div
                        class="w-12 h-12 bg-emerald-50 rounded-lg flex items-center justify-center group-hover:bg-emerald-100 transition-colors">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-xs px-2 py-1 bg-green-100 text-green-800 rounded-full font-medium">Active</span>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Water & Sanitation Certificate</h3>
                <p class="text-sm text-slate-600 mb-4">Health and sanitation compliance certificate</p>
                <a href="#"
                    class="inline-flex items-center text-sm font-semibold text-primary-600 hover:text-primary-700">
                    Download PDF
                    <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </a>
            </div>

            <!-- Document Card 6 -->
            <div
                class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-lg transition-shadow group">
                <div class="flex items-start justify-between mb-4">
                    <div
                        class="w-12 h-12 bg-purple-50 rounded-lg flex items-center justify-center group-hover:bg-purple-100 transition-colors">
                        <svg class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <span class="text-xs px-2 py-1 bg-green-100 text-green-800 rounded-full font-medium">Active</span>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Society Registration Certificate</h3>
                <p class="text-sm text-slate-600 mb-4">School trust registration document</p>
                <a href="#"
                    class="inline-flex items-center text-sm font-semibold text-primary-600 hover:text-primary-700">
                    Download PDF
                    <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </a>
            </div>

        </div>

        <!-- Additional Information -->
        <div class="mt-12 bg-blue-50 border border-blue-200 rounded-xl p-6">
            <div class="flex items-start space-x-3">
                <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    <h3 class="text-lg font-semibold text-blue-900 mb-2">Need More Information?</h3>
                    <p class="text-blue-800 text-sm">For any queries related to these documents or to request additional
                        information, please contact our administrative office or email us at <a
                            href="mailto:moonstar.gharounda@gmail.com"
                            class="underline font-medium">moonstar.gharounda@gmail.com</a></p>
                </div>
            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>