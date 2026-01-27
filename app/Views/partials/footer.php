<footer class="bg-primary-950 text-slate-300 relative overflow-hidden">
    <!-- Background Decor -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 opacity-10 pointer-events-none">
        <div class="absolute -top-24 -right-24 w-64 md:w-96 h-64 md:h-96 rounded-full bg-primary-500 blur-3xl"></div>
        <div class="absolute bottom-0 left-20 w-48 md:w-72 h-48 md:h-72 rounded-full bg-secondary-500 blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 md:gap-12">
            <!-- Brand Column -->
            <div class="lg:col-span-4 space-y-6">
                <a href="<?= base_url() ?>" class="flex items-center gap-2">
                    <div
                        class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center text-white backdrop-blur-sm border border-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold font-heading text-white">Moon Star Public School</span>
                </a>
                <p class="text-slate-400 leading-relaxed text-sm">
                    Moon Star Public School is dedicated to providing excellence in education.
                    Affiliated to CBSE (Code: 531646).
                    Streams: Arts, Comm., Non Medical And Medical.
                </p>
                <div class="flex space-x-4 pt-2">
                    <a href="https://www.facebook.com/moonstarpublicschool" target="_blank"
                        class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                        </svg>
                    </a>
                    <a href="https://www.youtube.com/@moonstarpublicschool" target="_blank"
                        class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-red-600 hover:text-white transition-all">
                        <span class="sr-only">Youtube</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/moonstarpublicschool" target="_blank"
                        class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-pink-600 hover:text-white transition-all">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Links Column -->
            <div class="lg:col-span-2 md:col-span-4">
                <h3 class="text-white font-heading font-semibold text-base md:text-lg mb-4 md:mb-6">Quick Links</h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="<?= base_url('about') ?>" class="hover:text-accent-400 transition-colors">About Us</a>
                    </li>
                    <li><a href="<?= base_url('academics') ?>"
                            class="hover:text-accent-400 transition-colors">Academics</a></li>
                    <li><a href="<?= base_url('admissions') ?>"
                            class="hover:text-accent-400 transition-colors">Admissions</a></li>
                    <li><a href="<?= base_url('gallery') ?>" class="hover:text-accent-400 transition-colors">Gallery</a>
                    </li>
                    <li><a href="<?= base_url('contact') ?>" class="hover:text-accent-400 transition-colors">Contact</a>
                    </li>
                </ul>
            </div>

            <!-- Academics Column -->
            <div class="lg:col-span-2 md:col-span-4">
                <h3 class="text-white font-heading font-semibold text-base md:text-lg mb-4 md:mb-6">Academics</h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="hover:text-accent-400 transition-colors">Kindergarten</a></li>
                    <li><a href="#" class="hover:text-accent-400 transition-colors">Primary School</a></li>
                    <li><a href="#" class="hover:text-accent-400 transition-colors">Middle School</a></li>
                    <li><a href="#" class="hover:text-accent-400 transition-colors">High School</a></li>
                </ul>
            </div>

            <!-- Contact Column -->
            <div class="lg:col-span-4 md:col-span-4">
                <h3 class="text-white font-heading font-semibold text-base md:text-lg mb-4 md:mb-6">Contact Info</h3>
                <ul class="space-y-4 text-sm">
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-accent-400 mt-0.5 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Hassanpur Road, Near Grain Market, Gharaunda (Karnal)-132114</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-accent-400 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span>+91-7404-266-266, +91-7404-116-673, +91-98960-92826</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-accent-400 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>moonstar.gharounda@gmail.com</span>
                    </li>
                </ul>
            </div>
        </div>

        <div
            class="border-t border-white/10 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-slate-500">
            <p>&copy; <?= date('Y') ?> Moonstar School. All rights reserved.</p>
            <div class="flex space-x-6 mt-4 md:mt-0">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                <a href="<?= base_url('admin/login') ?>" class="hover:text-white transition-colors">Admin Login</a>
            </div>
        </div>
    </div>
</footer>