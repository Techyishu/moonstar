<?php
$current_uri = uri_string();
?>
<nav class="fixed w-full z-50 transition-all duration-300" id="navbar" x-data="{ 
        scrolled: false, 
        mobileMenuOpen: false,
        checkScroll() {
            this.scrolled = window.scrollY > 20 || this.mobileMenuOpen;
        }
     }" @scroll.window="checkScroll()"
    :class="{ 'bg-white/90 backdrop-blur-md shadow-sm py-2': scrolled, 'bg-transparent py-4': !scrolled }">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">

            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="<?= base_url('/') ?>" class="flex items-center gap-2 group">
                    <div
                        class="w-10 h-10 bg-primary-600 rounded-lg flex items-center justify-center text-white shadow-lg group-hover:bg-primary-700 transition-colors">
                        <span class="font-heading font-bold text-xl">M</span>
                    </div>
                    <div>
                        <span
                            class="block text-xl font-heading font-bold text-slate-900 leading-none group-hover:text-primary-600 transition-colors"
                            :class="{ 'text-slate-900': scrolled, 'text-white': !scrolled && !mobileMenuOpen }">Moonstar</span>
                        <span class="block text-xs font-medium text-slate-500 uppercase tracking-widest"
                            :class="{ 'text-slate-500': scrolled, 'text-primary-200': !scrolled && !mobileMenuOpen }">School</span>
                    </div>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="<?= base_url() ?>" class="px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200 relative group
                   <?= $current_uri == '' ? '!text-primary-600 bg-primary-50' : '' ?>"
                    :class="{ 'text-slate-700 hover:text-primary-600 hover:bg-slate-50': scrolled, 'text-white/90 hover:text-white hover:bg-white/10': !scrolled }">
                    Home
                </a>

                <a href="<?= base_url('about') ?>" class="px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200 relative group
                   <?= strpos($current_uri, 'about') !== false ? '!text-primary-600 bg-primary-50' : '' ?>"
                    :class="{ 'text-slate-700 hover:text-primary-600 hover:bg-slate-50': scrolled, 'text-white/90 hover:text-white hover:bg-white/10': !scrolled }">
                    About
                </a>

                <a href="<?= base_url('toppers') ?>" class="px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200 relative group
                   <?= strpos($current_uri, 'toppers') !== false ? '!text-primary-600 bg-primary-50' : '' ?>"
                    :class="{ 'text-slate-700 hover:text-primary-600 hover:bg-slate-50': scrolled, 'text-white/90 hover:text-white hover:bg-white/10': !scrolled }">
                    Toppers
                </a>

                <a href="<?= base_url('staff') ?>" class="px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200 relative group
                   <?= strpos($current_uri, 'staff') !== false ? '!text-primary-600 bg-primary-50' : '' ?>"
                    :class="{ 'text-slate-700 hover:text-primary-600 hover:bg-slate-50': scrolled, 'text-white/90 hover:text-white hover:bg-white/10': !scrolled }">
                    Staff
                </a>

                <a href="<?= base_url('gallery') ?>" class="px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200 relative group
                   <?= strpos($current_uri, 'gallery') !== false ? '!text-primary-600 bg-primary-50' : '' ?>"
                    :class="{ 'text-slate-700 hover:text-primary-600 hover:bg-slate-50': scrolled, 'text-white/90 hover:text-white hover:bg-white/10': !scrolled }">
                    Gallery
                </a>

                <!-- More Info Dropdown -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button
                        class="flex items-center space-x-1 px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200"
                        :class="{ 'text-slate-700 hover:text-primary-600 hover:bg-slate-50': scrolled, 'text-white/90 hover:text-white hover:bg-white/10': !scrolled }">
                        <span>More Info</span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-2"
                        class="absolute left-0 mt-0 w-64 rounded-xl shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none overflow-hidden z-50">
                        <div class="py-2">
                            <a href="<?= base_url('page/disclosure') ?>"
                                class="flex items-center px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-primary-600 transition-colors">
                                <svg class="w-5 h-5 mr-3 text-slate-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Disclosure
                            </a>
                            <a href="<?= base_url('page/sports') ?>"
                                class="flex items-center px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-primary-600 transition-colors">
                                <svg class="w-5 h-5 mr-3 text-slate-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Sports
                            </a>
                            <a href="<?= base_url('slc') ?>"
                                class="flex items-center px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-primary-600 transition-colors">
                                <svg class="w-5 h-5 mr-3 text-slate-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                School Leaving Certificate
                            </a>
                            <a href="<?= base_url('page/bus-routes') ?>"
                                class="flex items-center px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-primary-600 transition-colors">
                                <svg class="w-5 h-5 mr-3 text-slate-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                </svg>
                                Bus Routes
                            </a>
                            <a href="<?= base_url('page/fee-structure') ?>"
                                class="flex items-center px-4 py-3 text-sm text-slate-700 hover:bg-slate-50 hover:text-primary-600 transition-colors">
                                <svg class="w-5 h-5 mr-3 text-slate-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Fee Structure
                            </a>
                        </div>
                    </div>
                </div>

                <a href="<?= base_url('contact') ?>" class="px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200 relative group
                   <?= strpos($current_uri, 'contact') !== false ? '!text-primary-600 bg-primary-50' : '' ?>"
                    :class="{ 'text-slate-700 hover:text-primary-600 hover:bg-slate-50': scrolled, 'text-white/90 hover:text-white hover:bg-white/10': !scrolled }">
                    Contact
                </a>
            </div>

            <!-- CTA Button -->
            <div class="hidden md:flex items-center ml-4">
                <a href="<?= base_url('admissions') ?>"
                    class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-sm font-bold rounded-xl text-white bg-accent-500 hover:bg-accent-600 hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                    Admission
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button @click="mobileMenuOpen = !mobileMenuOpen; checkScroll()" type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md transition-colors duration-200"
                    :class="{ 'text-slate-600 hover:text-primary-600 hover:bg-slate-100': scrolled, 'text-white hover:text-primary-100 hover:bg-white/10': !scrolled }"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed -->
                    <svg x-show="!mobileMenuOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon when menu is open -->
                    <svg x-show="mobileMenuOpen" x-cloak class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="md:hidden absolute top-full left-0 w-full bg-white border-t border-slate-100 shadow-xl" id="mobile-menu"
        x-cloak>
        <div class="px-4 pt-2 pb-6 space-y-1">
            <a href="<?= base_url() ?>"
                class="block px-3 py-3 rounded-lg text-base font-medium text-slate-700 hover:text-primary-600 hover:bg-primary-50">Home</a>
            <a href="<?= base_url('about') ?>"
                class="block px-3 py-3 rounded-lg text-base font-medium text-slate-700 hover:text-primary-600 hover:bg-primary-50">About</a>
            <a href="<?= base_url('toppers') ?>"
                class="block px-3 py-3 rounded-lg text-base font-medium text-slate-700 hover:text-primary-600 hover:bg-primary-50">Toppers</a>
            <a href="<?= base_url('staff') ?>"
                class="block px-3 py-3 rounded-lg text-base font-medium text-slate-700 hover:text-primary-600 hover:bg-primary-50">Staff</a>
            <a href="<?= base_url('gallery') ?>"
                class="block px-3 py-3 rounded-lg text-base font-medium text-slate-700 hover:text-primary-600 hover:bg-primary-50">Gallery</a>

            <div x-data="{ open: false }" class="space-y-1">
                <button @click="open = !open"
                    class="flex w-full items-center justify-between px-3 py-3 rounded-lg text-base font-medium text-slate-700 hover:text-primary-600 hover:bg-primary-50">
                    <span>More Info</span>
                    <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="pl-4 space-y-1">
                    <a href="<?= base_url('page/disclosure') ?>"
                        class="block px-3 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-primary-600 hover:bg-slate-50">Disclosure</a>
                    <a href="<?= base_url('page/sports') ?>"
                        class="block px-3 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-primary-600 hover:bg-slate-50">Sports</a>
                    <a href="<?= base_url('slc') ?>"
                        class="block px-3 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-primary-600 hover:bg-slate-50">SLC</a>
                    <a href="<?= base_url('page/bus-routes') ?>"
                        class="block px-3 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-primary-600 hover:bg-slate-50">Bus
                        Routes</a>
                    <a href="<?= base_url('page/fee-structure') ?>"
                        class="block px-3 py-2 rounded-lg text-sm font-medium text-slate-600 hover:text-primary-600 hover:bg-slate-50">Fee
                        Structure</a>
                </div>
            </div>

            <a href="<?= base_url('contact') ?>"
                class="block px-3 py-3 rounded-lg text-base font-medium text-slate-700 hover:text-primary-600 hover:bg-primary-50">Contact</a>

            <div class="pt-4 mt-4 border-t border-slate-100">
                <a href="<?= base_url('admissions') ?>"
                    class="block w-full text-center px-4 py-3 rounded-xl text-white bg-primary-600 font-bold hover:bg-primary-700">Apply
                    for Admission</a>
            </div>
        </div>
    </div>
</nav>