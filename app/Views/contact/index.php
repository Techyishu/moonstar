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
        <h1 class="text-3xl md:text-5xl font-bold font-heading text-white mb-4 md:mb-6">Get in Touch</h1>
        <p class="text-base md:text-lg text-primary-200">We'd love to hear from you. Here's how you can reach us.</p>
    </div>
</section>

<!-- Contact Info Cards -->
<section class="py-10 md:py-16 -mt-8 md:-mt-10 relative z-20 px-4">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
        <!-- Address -->
        <div
            class="bg-white rounded-2xl shadow-xl p-5 md:p-8 text-center border-b-4 border-accent-400 group hover:-translate-y-1 transition-transform cursor-default">
            <div
                class="w-12 h-12 md:w-16 md:h-16 mx-auto bg-accent-50 text-accent-600 rounded-full flex items-center justify-center mb-4 md:mb-6 group-hover:bg-accent-600 group-hover:text-white transition-colors">
                <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <h3 class="text-lg md:text-xl font-bold text-slate-900 mb-2">Visit Us</h3>
            <p class="text-slate-500 leading-relaxed">
                Hassanpur Road, Near Grain Market,<br>
                Gharaunda (Karnal)-132114
            </p>
        </div>

        <!-- Phone -->
        <div
            class="bg-white rounded-2xl shadow-xl p-5 md:p-8 text-center border-b-4 border-primary-500 group hover:-translate-y-1 transition-transform cursor-default">
            <div
                class="w-12 h-12 md:w-16 md:h-16 mx-auto bg-primary-50 text-primary-600 rounded-full flex items-center justify-center mb-4 md:mb-6 group-hover:bg-primary-600 group-hover:text-white transition-colors">
                <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
            </div>
            <h3 class="text-lg md:text-xl font-bold text-slate-900 mb-2">Call Us</h3>
            <p class="text-slate-500 mb-1"><span class="font-semibold text-slate-700">Phone:</span> +91-7404-266-266</p>
            <p class="text-slate-500 mb-1"><span class="font-semibold text-slate-700">Mobile:</span> +91-740-411-6673
            </p>
            <p class="text-slate-500"><span class="font-semibold text-slate-700">Mobile:</span> +91-98960-92826</p>
        </div>

        <!-- Email -->
        <div
            class="bg-white rounded-2xl shadow-xl p-5 md:p-8 text-center border-b-4 border-emerald-400 group hover:-translate-y-1 transition-transform cursor-default">
            <div
                class="w-12 h-12 md:w-16 md:h-16 mx-auto bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center mb-4 md:mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <h3 class="text-lg md:text-xl font-bold text-slate-900 mb-2">Email Us</h3>
            <p class="text-slate-500 text-sm mb-2"><a href="mailto:moonstar.gharaunda@gmail.com"
                    class="hover:text-primary-600 transition-colors">moonstar.gharaunda@gmail.com</a></p>
        </div>
    </div>
</section>

<!-- Form & Map Flex -->
<section class="py-12 md:py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-start">

            <!-- Contact Form -->
            <div class="bg-white rounded-2xl shadow-lg p-5 md:p-8 border border-slate-100">
                <h2 class="text-xl md:text-2xl font-bold font-heading text-slate-800 mb-4 md:mb-6">Send a Message</h2>
                <form action="<?= base_url('contact/submit') ?>" method="post" class="space-y-6">
                    <?= csrf_field() ?>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Full Name</label>
                        <input type="text" name="name" required
                            class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Email Address</label>
                        <input type="email" name="email" required
                            class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Subject</label>
                        <select name="subject"
                            class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all">
                            <option>General Inquiry</option>
                            <option>Admissions Question</option>
                            <option>Schedule a Tour</option>
                            <option>Feedback</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Message</label>
                        <textarea name="message" rows="4" required
                            class="w-full px-4 py-3 rounded-lg bg-slate-50 border border-slate-200 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all"></textarea>
                    </div>
                    <button type="submit"
                        class="w-full py-3 md:py-4 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all hover:-translate-y-0.5 text-sm md:text-base">
                        Send Message
                    </button>
                </form>
            </div>

            <!-- Map/Hours -->
            <div class="space-y-8">
                <!-- Map Placeholder -->
                <div class="bg-slate-200 rounded-2xl overflow-hidden shadow-lg h-80 relative group">
                    <div class="absolute inset-0 flex items-center justify-center bg-slate-300">
                        <span class="text-slate-500 font-medium flex flex-col items-center">
                            <svg class="w-12 h-12 mb-2 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Interactive Map Component
                        </span>
                    </div>
                    <!-- Overlay with CTA -->
                    <div
                        class="absolute inset-x-0 bottom-0 bg-white/90 backdrop-blur p-4 flex justify-between items-center transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <div>
                            <p class="text-sm font-bold text-slate-800">Moon Star Public School</p>
                            <p class="text-xs text-slate-500">Gharaunda (Karnal)</p>
                        </div>
                        <a href="https://maps.google.com" target="_blank"
                            class="text-xs bg-primary-600 text-white px-3 py-1.5 rounded-lg hover:bg-primary-700 transition">Get
                            Directions</a>
                    </div>
                </div>

                <!-- Hours -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
                    <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-primary-500" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Office Hours
                    </h3>
                    <ul class="space-y-3">
                        <li class="flex justify-between text-sm">
                            <span class="text-slate-600">Monday - Friday</span>
                            <span class="font-medium text-slate-900">8:00 AM - 4:00 PM</span>
                        </li>
                        <li class="flex justify-between text-sm">
                            <span class="text-slate-600">Saturday</span>
                            <span class="font-medium text-slate-900">9:00 AM - 1:00 PM</span>
                        </li>
                        <li class="flex justify-between text-sm">
                            <span class="text-slate-600">Sunday</span>
                            <span class="font-medium text-red-500">Closed</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>