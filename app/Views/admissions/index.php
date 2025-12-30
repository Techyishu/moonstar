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
        <div
            class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImEiIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTTAgNDBMMTQwIDBoMjBMMCA2MHoiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wMyIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNhKSIvPjwvc3ZnPg==')] opacity-30">
        </div>
    </div>

    <div class="relative z-10 max-w-3xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-bold font-heading text-white mb-6">Join the Moonstar Family</h1>
        <p class="text-lg text-primary-200 mb-8 max-w-2xl mx-auto">We are looking for curious minds and compassionate
            hearts. Our seamless admissions process is designed to help you every step of the way.</p>
        <div class="flex justify-center space-x-2 text-sm text-primary-300 font-medium tracking-wide uppercase">
            <a href="<?= base_url() ?>" class="hover:text-white transition-colors">Home</a>
            <span>/</span>
            <span class="text-white">Admissions</span>
        </div>
    </div>
</section>

<!-- Admissions Steps -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div
                class="relative p-6 bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all border border-slate-100 group text-center">
                <div
                    class="w-16 h-16 mx-auto bg-primary-50 rounded-full flex items-center justify-center text-primary-600 mb-4 group-hover:scale-110 transition-transform">
                    <span class="text-2xl font-bold font-heading">1</span>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Apply Online</h3>
                <p class="text-sm text-slate-600">Complete the form below with student details.</p>
            </div>

            <div
                class="relative p-6 bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all border border-slate-100 group text-center">
                <div
                    class="w-16 h-16 mx-auto bg-primary-50 rounded-full flex items-center justify-center text-primary-600 mb-4 group-hover:scale-110 transition-transform">
                    <span class="text-2xl font-bold font-heading">2</span>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Review</h3>
                <p class="text-sm text-slate-600">Our team reviews your application.</p>
            </div>

            <div
                class="relative p-6 bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all border border-slate-100 group text-center">
                <div
                    class="w-16 h-16 mx-auto bg-primary-50 rounded-full flex items-center justify-center text-primary-600 mb-4 group-hover:scale-110 transition-transform">
                    <span class="text-2xl font-bold font-heading">3</span>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Assessment</h3>
                <p class="text-sm text-slate-600">Interview or age-appropriate test.</p>
            </div>

            <div
                class="relative p-6 bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all border border-slate-100 group text-center">
                <div
                    class="w-16 h-16 mx-auto bg-primary-50 rounded-full flex items-center justify-center text-primary-600 mb-4 group-hover:scale-110 transition-transform">
                    <span class="text-2xl font-bold font-heading">4</span>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Welcome</h3>
                <p class="text-sm text-slate-600">Enrollment and orientation.</p>
            </div>
        </div>
    </div>
</section>

<!-- Application Form -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100">
            <div class="p-8 md:p-12">
                <h2 class="text-2xl font-bold font-heading text-primary-950 mb-2 text-center">Application Form</h2>
                <p class="text-slate-500 text-center mb-10">We'll get back to you within 48 hours.</p>

                <form action="<?= base_url('admissions/submit') ?>" method="post" id="admissionForm" class="space-y-8">
                    <?= csrf_field() ?>

                    <!-- Student Info -->
                    <div>
                        <h3 class="text-lg font-semibold text-primary-900 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Student Details
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label for="studentName" class="block text-sm font-medium text-slate-700 mb-1">Full Name
                                    *</label>
                                <input type="text" id="studentName" name="student_name" required
                                    class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all placeholder:text-slate-400"
                                    placeholder="e.g. John Doe">
                            </div>

                            <div>
                                <label for="dob" class="block text-sm font-medium text-slate-700 mb-1">Date of Birth
                                    *</label>
                                <input type="date" id="dob" name="date_of_birth" required
                                    class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all">
                            </div>

                            <div>
                                <label for="gender" class="block text-sm font-medium text-slate-700 mb-1">Gender
                                    *</label>
                                <select id="gender" name="gender" required
                                    class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all">
                                    <option value="">Select...</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <div class="md:col-span-2">
                                <label for="classApplied" class="block text-sm font-medium text-slate-700 mb-1">Grade
                                    Applying For *</label>
                                <select id="classApplied" name="class_applied" required
                                    class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all">
                                    <option value="">Select Grade...</option>
                                    <?php
                                    $grades = ['Pre-K', 'Kindergarten', 'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6', 'Grade 7', 'Grade 8', 'Grade 9', 'Grade 10', 'Grade 11', 'Grade 12'];
                                    foreach ($grades as $g)
                                        echo "<option value='$g'>$g</option>";
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-slate-100"></div>

                    <!-- Parent Info -->
                    <div>
                        <h3 class="text-lg font-semibold text-primary-900 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Guardian Details
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label for="parentName" class="block text-sm font-medium text-slate-700 mb-1">Guardian
                                    Name *</label>
                                <input type="text" id="parentName" name="parent_name" required
                                    class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all">
                            </div>

                            <div>
                                <label for="parentEmail" class="block text-sm font-medium text-slate-700 mb-1">Email
                                    *</label>
                                <input type="email" id="parentEmail" name="parent_email" required
                                    class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all">
                            </div>

                            <div>
                                <label for="parentPhone" class="block text-sm font-medium text-slate-700 mb-1">Phone
                                    *</label>
                                <input type="tel" id="parentPhone" name="parent_phone" required
                                    class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all">
                            </div>

                            <div class="md:col-span-2">
                                <label for="address" class="block text-sm font-medium text-slate-700 mb-1">Address
                                    *</label>
                                <textarea id="address" name="address" rows="3" required
                                    class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all"></textarea>
                            </div>

                            <div class="md:col-span-2">
                                <label for="remarks" class="block text-sm font-medium text-slate-700 mb-1">Additional
                                    Remarks</label>
                                <textarea id="remarks" name="remarks" rows="2"
                                    class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-slate-100"></div>

                    <div class="flex items-start">
                        <input type="checkbox" id="agree" required
                            class="mt-1 w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        <label for="agree" class="ml-2 text-sm text-slate-600">I confirm that all provided information
                            is accurate and I agree to the terms.</label>
                    </div>

                    <button type="submit"
                        class="w-full py-4 px-6 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all hover:-translate-y-1 transform">
                        Submit Application
                    </button>

                    <p class="text-xs text-center text-slate-400">
                        <svg class="w-3 h-3 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        Secure Encrypted Submission
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section with Alpine -->
<section class="py-20 bg-slate-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold font-heading text-primary-950 text-center mb-12">Common Questions</h2>

        <div class="space-y-4" x-data="{ active: null }">
            <?php
            $faqs = [
                ['q' => 'What is the admission timeline?', 'a' => 'Review takes 2-3 business days. The full process including assessment takes about 2-3 weeks.'],
                ['q' => 'What documents are needed?', 'a' => 'Birth certificate, previous school records, immunization records, proof of residence, and photos.'],
                ['q' => 'Do you offer financial aid?', 'a' => 'Yes, need-based aid and merit scholarships are available. Contact finance office for details.'],
                ['q' => 'When does the year start?', 'a' => 'Typically late August. Mid-year admissions are subject to seat availability.']
            ];
            foreach ($faqs as $i => $faq):
                ?>
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <button @click="active === <?= $i ?> ? active = null : active = <?= $i ?>"
                        class="w-full px-6 py-4 text-left flex justify-between items-center transition-colors hover:bg-slate-50">
                        <span class="font-semibold text-slate-800"><?= $faq['q'] ?></span>
                        <svg class="w-5 h-5 text-primary-500 transform transition-transform"
                            :class="active === <?= $i ?> ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="active === <?= $i ?>" x-collapse x-cloak>
                        <div
                            class="px-6 pb-4 pt-2 text-slate-600 text-sm leading-relaxed border-t border-slate-100 bg-slate-50/50">
                            <?= $faq['a'] ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>