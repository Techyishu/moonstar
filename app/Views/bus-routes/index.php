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
        <h1 class="text-3xl md:text-5xl font-bold font-heading text-white mb-4 md:mb-6">Bus Routes & Transport</h1>
        <p class="text-base md:text-lg text-primary-200">Safe and reliable transport services with GPS tracking</p>
    </div>
</section>

<!-- Content Section -->
<section class="py-12 md:py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Introduction -->
        <div class="bg-white rounded-2xl shadow-lg p-5 md:p-8 mb-8 md:mb-12 border border-slate-100">
            <div class="flex flex-col md:flex-row items-start md:space-x-4">
                <div class="flex-shrink-0 mb-4 md:mb-0">
                    <svg class="w-10 h-10 md:w-12 md:h-12 text-accent-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl md:text-2xl font-bold text-slate-900 mb-3 md:mb-4">Transport Services</h2>
                    <p class="text-slate-600 leading-relaxed mb-4">Moonstar School provides safe and reliable transport
                        services covering major areas of the city. All our buses are equipped with:</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm font-medium text-slate-700">GPS Tracking</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm font-medium text-slate-700">CCTV Cameras</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm font-medium text-slate-700">Trained Attendants</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm font-medium text-slate-700">First Aid Kit</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm font-medium text-slate-700">Fire Extinguisher</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm font-medium text-slate-700">Speed Governors</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bus Routes Table -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
            <div class="bg-gradient-to-r from-primary-600 to-accent-500 px-6 py-4">
                <h2 class="text-2xl font-bold text-white">Available Bus Routes</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900">Route No.</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900">Area Covered</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900">Pickup Time</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900">Drop Time</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900">Fee/Month</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-800">R-01</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-700">City Centre → Mall Road → School</td>
                            <td class="px-6 py-4 text-sm font-medium text-slate-900">7:30 AM</td>
                            <td class="px-6 py-4 text-sm font-medium text-slate-900">3:30 PM</td>
                            <td class="px-6 py-4 text-sm font-bold text-green-600">₹ 1,800</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800">R-02</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-700">Civil Lines → Railway Station → School</td>
                            <td class="px-6 py-4 text-sm font-medium text-slate-900">7:40 AM</td>
                            <td class="px-6 py-4 text-sm font-medium text-slate-900">3:20 PM</td>
                            <td class="px-6 py-4 text-sm font-bold text-green-600">₹ 1,600</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-purple-100 text-purple-800">R-03</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-700">Tech Park → Housing Board → School</td>
                            <td class="px-6 py-4 text-sm font-medium text-slate-900">7:25 AM</td>
                            <td class="px-6 py-4 text-sm font-medium text-slate-900">3:35 PM</td>
                            <td class="px-6 py-4 text-sm font-bold text-green-600">₹ 2,000</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-orange-100 text-orange-800">R-04</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-700">Cantonment → University → School</td>
                            <td class="px-6 py-4 text-sm font-medium text-slate-900">7:35 AM</td>
                            <td class="px-6 py-4 text-sm font-medium text-slate-900">3:25 PM</td>
                            <td class="px-6 py-4 text-sm font-bold text-green-600">₹ 1,700</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-800">R-05</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-700">Industrial Area → Market → School</td>
                            <td class="px-6 py-4 text-sm font-medium text-slate-900">7:20 AM</td>
                            <td class="px-6 py-4 text-sm font-medium text-slate-900">3:40 PM</td>
                            <td class="px-6 py-4 text-sm font-bold text-green-600">₹ 1,900</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-teal-100 text-teal-800">R-06</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-700">Green Park → Residency → School</td>
                            <td class="px-6 py-4 text-sm font-medium text-slate-900">7:45 AM</td>
                            <td class="px-6 py-4 text-sm font-medium text-slate-900">3:15 PM</td>
                            <td class="px-6 py-4 text-sm font-bold text-green-600">₹ 1,500</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Important Information -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-12">

            <!-- Contact for Transport -->
            <div class="bg-gradient-to-br from-primary-50 to-accent-50 rounded-2xl p-6 border border-primary-100">
                <div class="flex items-start space-x-3">
                    <svg class="w-6 h-6 text-primary-600 flex-shrink-0 mt-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Need Transport Service?</h3>
                        <p class="text-sm text-slate-600 mb-3">Contact our transport coordinator for route inquiries and
                            new registrations.</p>
                        <div class="space-y-2 text-sm">
                            <p class="font-medium text-slate-900">📞 Transport Office: +91 123 456 7890</p>
                            <p class="font-medium text-slate-900">📧 Email: moonstar.gharounda@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- GPS Tracking -->
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 border border-green-100">
                <div class="flex items-start space-x-3">
                    <svg class="w-6 h-6 text-green-600 flex-shrink-0 mt-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Live GPS Tracking</h3>
                        <p class="text-sm text-slate-600 mb-3">Track your child's bus in real-time using our mobile app.
                        </p>
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-semibold rounded-lg hover:bg-green-700 transition-colors">
                            Download App
                            <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Note -->
        <div class="mt-8 bg-yellow-50 border border-yellow-200 rounded-xl p-5">
            <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-yellow-600 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-sm text-yellow-800"><strong>Note:</strong> Transport fees are subject to change based on
                    fuel prices and distance. The timings mentioned are approximate and may vary by ±10 minutes. Parents
                    will be notified of any changes via SMS.</p>
            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>