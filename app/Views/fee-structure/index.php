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
        <h1 class="text-4xl md:text-5xl font-bold font-heading text-white mb-6">Fee Structure</h1>
        <p class="text-lg text-primary-200">Academic Year 2024-25 | Transparent & Inclusive Pricing</p>
    </div>
</section>

<!-- Content Section -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Introduction -->
        <div class="text-center max-w-3xl mx-auto mb-12">
            <p class="text-lg text-slate-600 leading-relaxed">Our fee structure is designed to be transparent and
                inclusive. We offer quality education at competitive rates with flexible payment options.</p>
        </div>

        <!-- Fee Structure Table -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100">
            <div class="bg-gradient-to-r from-primary-600 to-accent-500 px-6 py-5">
                <h2 class="text-2xl font-bold text-white">Tuition Fee Structure</h2>
                <p class="text-primary-100 text-sm mt-1">All amounts in Indian Rupees (₹)</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50 border-b-2 border-slate-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-bold text-slate-900">Class</th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-slate-900">Admission Fee<br><span
                                    class="text-xs font-normal text-slate-500">(One Time)</span></th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-slate-900">Tuition Fee<br><span
                                    class="text-xs font-normal text-slate-500">(Per Quarter)</span></th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-slate-900">Annual Charges</th>
                            <th class="px-6 py-4 text-center text-sm font-bold text-slate-900">Total Annual Fee</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-5">
                                <div class="font-bold text-slate-900">Nursery - KG</div>
                                <div class="text-xs text-slate-500">Pre-Primary</div>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-lg font-bold text-slate-900">₹ 15,000</span>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-lg font-bold text-primary-600">₹ 12,000</span>
                                <div class="text-xs text-slate-500 mt-1">₹ 48,000/year</div>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-lg font-bold text-slate-900">₹ 8,000</span>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-xl font-bold text-green-600">₹ 71,000</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-5">
                                <div class="font-bold text-slate-900">Class I - V</div>
                                <div class="text-xs text-slate-500">Primary</div>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-lg font-bold text-slate-900">₹ 20,000</span>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-lg font-bold text-primary-600">₹ 15,000</span>
                                <div class="text-xs text-slate-500 mt-1">₹ 60,000/year</div>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-lg font-bold text-slate-900">₹ 10,000</span>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-xl font-bold text-green-600">₹ 90,000</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-5">
                                <div class="font-bold text-slate-900">Class VI - VIII</div>
                                <div class="text-xs text-slate-500">Middle School</div>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-lg font-bold text-slate-900">₹ 25,000</span>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-lg font-bold text-primary-600">₹ 18,000</span>
                                <div class="text-xs text-slate-500 mt-1">₹ 72,000/year</div>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-lg font-bold text-slate-900">₹ 12,000</span>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-xl font-bold text-green-600">₹ 1,09,000</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-5">
                                <div class="font-bold text-slate-900">Class IX - X</div>
                                <div class="text-xs text-slate-500">High School (CBSE)</div>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-lg font-bold text-slate-900">₹ 30,000</span>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-lg font-bold text-primary-600">₹ 22,000</span>
                                <div class="text-xs text-slate-500 mt-1">₹ 88,000/year</div>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-lg font-bold text-slate-900">₹ 15,000</span>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-xl font-bold text-green-600">₹ 1,33,000</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-5">
                                <div class="font-bold text-slate-900">Class XI - XII</div>
                                <div class="text-xs text-slate-500">Senior Secondary (CBSE)</div>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-lg font-bold text-slate-900">₹ 35,000</span>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-lg font-bold text-primary-600">₹ 25,000</span>
                                <div class="text-xs text-slate-500 mt-1">₹ 1,00,000/year</div>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-lg font-bold text-slate-900">₹ 18,000</span>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-xl font-bold text-green-600">₹ 1,53,000</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Additional Fees -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-12">

            <!-- Transport Fees -->
            <div class="bg-white rounded-xl shadow-lg p-6 border border-slate-100">
                <div class="flex items-start space-x-3 mb-4">
                    <div class="w-10 h-10 bg-accent-50 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-accent-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Transport Fee (Optional)</h3>
                        <p class="text-sm text-slate-600 mb-3">Varies based on distance and route</p>
                    </div>
                </div>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between py-2 border-b border-slate-100">
                        <span class="text-slate-600">Within 5 km</span>
                        <span class="font-bold text-slate-900">₹ 1,500/month</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-slate-100">
                        <span class="text-slate-600">5 - 10 km</span>
                        <span class="font-bold text-slate-900">₹ 1,800/month</span>
                    </div>
                    <div class="flex justify-between py-2">
                        <span class="text-slate-600">Above 10 km</span>
                        <span class="font-bold text-slate-900">₹ 2,000/month</span>
                    </div>
                </div>
            </div>

            <!-- Other Fees -->
            <div class="bg-white rounded-xl shadow-lg p-6 border border-slate-100">
                <div class="flex items-start space-x-3 mb-4">
                    <div class="w-10 h-10 bg-primary-50 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Miscellaneous Fees</h3>
                        <p class="text-sm text-slate-600 mb-3">Additional optional services</p>
                    </div>
                </div>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between py-2 border-b border-slate-100">
                        <span class="text-slate-600">Smart Classes</span>
                        <span class="font-bold text-slate-900">Included</span>
                    </div>
                    <div class="flex justify-between py-2 border-b border-slate-100">
                        <span class="text-slate-600">Library Access</span>
                        <span class="font-bold text-slate-900">Included</span>
                    </div>
                    <div class="flex justify-between py-2">
                        <span class="text-slate-600">Sports Coaching</span>
                        <span class="font-bold text-slate-900">Included</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- Payment Options -->
        <div class="mt-12 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-8 border border-blue-100">
            <h3 class="text-2xl font-bold text-slate-900 mb-6 text-center">Payment Options & Policies</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h4 class="font-bold text-slate-900 mb-2">Quarterly Payment</h4>
                    <p class="text-sm text-slate-600">Pay fees in 4 installments</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h4 class="font-bold text-slate-900 mb-2">Annual Discount</h4>
                    <p class="text-sm text-slate-600">5% off on full year payment</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <h4 class="font-bold text-slate-900 mb-2">Multiple Modes</h4>
                    <p class="text-sm text-slate-600">Cash, Card, UPI, Netbanking</p>
                </div>
            </div>
        </div>

        <!-- Important Notes -->
        <div class="mt-8 bg-yellow-50 border border-yellow-200 rounded-xl p-6">
            <h4 class="font-bold text-yellow-900 mb-3 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Important Notes
            </h4>
            <ul class="space-y-2 text-sm text-yellow-800">
                <li class="flex items-start">
                    <span class="mr-2">•</span>
                    <span>All fees once paid are non-refundable.</span>
                </li>
                <li class="flex items-start">
                    <span class="mr-2">•</span>
                    <span>Fees must be paid by the 10th of every quarter. Late payment attracts a fine of ₹100 per
                        day.</span>
                </li>
                <li class="flex items-start">
                    <span class="mr-2">•</span>
                    <span>Sibling discount: 10% off on tuition fees for 2nd child and 15% for 3rd child onwards.</span>
                </li>
                <li class="flex items-start">
                    <span class="mr-2">•</span>
                    <span>Scholarship programs available based on merit and need. Contact admissions office for
                        details.</span>
                </li>
                <li class="flex items-start">
                    <span class="mr-2">•</span>
                    <span>Books, uniforms, and stationery charges are separate and can be purchased from school
                        store.</span>
                </li>
            </ul>
        </div>

        <!-- CTA -->
        <div class="mt-12 text-center">
            <a href="<?= base_url('admissions') ?>"
                class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-primary-600 to-accent-500 text-white font-bold rounded-xl hover:shadow-xl transition-all">
                Apply for Admission
                <svg class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
        </div>

    </div>
</section>

<?= $this->endSection() ?>