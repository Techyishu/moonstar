<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
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
        <h1 class="text-3xl md:text-5xl font-bold font-heading text-white mb-4 md:mb-6">Academic Excellence</h1>
        <p class="text-base md:text-lg text-primary-200 mb-6 md:mb-8 max-w-2xl mx-auto">Nurturing curiosity, critical
            thinking, and character
            from early years to graduation.</p>
    </div>
</section>

<!-- Introduction -->
<section class="py-12 md:py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl md:text-3xl font-bold font-heading text-slate-900 mb-4 md:mb-6">A Journey of Discovery</h2>
        <p class="text-base md:text-lg text-slate-600 leading-relaxed">
            At Moonstar, we offer a student-centered curriculum that balances academic rigor with creative exploration.
            Our holistic approach ensures that students not only excel in their studies but also develop the social and
            emotional skills needed to thrive in a complex world.
        </p>
    </div>
</section>

<!-- Programs Grid -->
<section class="py-12 md:py-20 bg-slate-50" x-data="{ activeModal: null }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">

            <!-- Early Childhood -->
            <div
                class="bg-white rounded-2xl p-5 md:p-8 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
                <div
                    class="w-14 h-14 bg-pink-50 rounded-xl flex items-center justify-center text-pink-500 mb-6 group-hover:bg-pink-500 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Early Childhood</h3>
                <p class="text-sm font-semibold text-accent-500 uppercase tracking-wide mb-4">Pre-K to Kindergarten</p>
                <p class="text-slate-600 mb-6 leading-relaxed">Play-based learning that sparks curiosity and builds
                    foundational social and emotional skills.</p>

                <ul class="space-y-2 mb-6 text-sm text-slate-600">
                    <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Interactive Play</li>
                    <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Sensory Activities</li>
                    <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Early Literacy</li>
                </ul>

                <button @click="activeModal = 'early'"
                    class="text-primary-600 font-bold hover:text-primary-700 flex items-center group-hover:translate-x-1 transition-transform">
                    Learn More <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </div>

            <!-- Elementary -->
            <div
                class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
                <div
                    class="w-14 h-14 bg-sky-50 rounded-xl flex items-center justify-center text-sky-500 mb-6 group-hover:bg-sky-500 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Elementary School</h3>
                <p class="text-sm font-semibold text-accent-500 uppercase tracking-wide mb-4">Grades 1-5</p>
                <p class="text-slate-600 mb-6 leading-relaxed">Building strong academic foundations in core subjects
                    while encouraging creativity.</p>

                <ul class="space-y-2 mb-6 text-sm text-slate-600">
                    <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>STEM Projects</li>
                    <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Language Arts</li>
                    <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Arts Integration</li>
                </ul>

                <button @click="activeModal = 'elementary'"
                    class="text-primary-600 font-bold hover:text-primary-700 flex items-center group-hover:translate-x-1 transition-transform">
                    Learn More <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </div>

            <!-- Middle School -->
            <div
                class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
                <div
                    class="w-14 h-14 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-500 mb-6 group-hover:bg-indigo-500 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Middle School</h3>
                <p class="text-sm font-semibold text-accent-500 uppercase tracking-wide mb-4">Grades 6-8</p>
                <p class="text-slate-600 mb-6 leading-relaxed">Fostering independence and critical thinking through
                    project-based learning.</p>

                <ul class="space-y-2 mb-6 text-sm text-slate-600">
                    <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Advanced Science</li>
                    <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Debate & Speech</li>
                    <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Coding Electives</li>
                </ul>

                <button @click="activeModal = 'middle'"
                    class="text-primary-600 font-bold hover:text-primary-700 flex items-center group-hover:translate-x-1 transition-transform">
                    Learn More <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </div>

            <!-- High School -->
            <div
                class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
                <div
                    class="w-14 h-14 bg-purple-50 rounded-xl flex items-center justify-center text-purple-500 mb-6 group-hover:bg-purple-500 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path
                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">High School</h3>
                <p class="text-sm font-semibold text-accent-500 uppercase tracking-wide mb-4">Grades 9-12</p>
                <p class="text-slate-600 mb-6 leading-relaxed">Rigorous college prep curriculum designed to prepare
                    leaders for the future.</p>

                <ul class="space-y-2 mb-6 text-sm text-slate-600">
                    <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>AP Courses</li>
                    <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>College Counseling</li>
                    <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Internships</li>
                </ul>

                <button @click="activeModal = 'high'"
                    class="text-primary-600 font-bold hover:text-primary-700 flex items-center group-hover:translate-x-1 transition-transform">
                    Learn More <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </div>

            <!-- Arts -->
            <div
                class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
                <div
                    class="w-14 h-14 bg-orange-50 rounded-xl flex items-center justify-center text-orange-500 mb-6 group-hover:bg-orange-500 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Arts & Music</h3>
                <p class="text-sm font-semibold text-accent-500 uppercase tracking-wide mb-4">All Grades</p>
                <p class="text-slate-600 mb-6 leading-relaxed">Unleashing creativity through visual arts, music, drama,
                    and digital media.</p>

                <ul class="space-y-2 mb-6 text-sm text-slate-600">
                    <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Orchestra</li>
                    <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Theatre Production</li>
                    <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Gallery Exhibits</li>
                </ul>

                <button @click="activeModal = 'arts'"
                    class="text-primary-600 font-bold hover:text-primary-700 flex items-center group-hover:translate-x-1 transition-transform">
                    Learn More <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </div>

            <!-- Athletics -->
            <div
                class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
                <div
                    class="w-14 h-14 bg-red-50 rounded-xl flex items-center justify-center text-red-500 mb-6 group-hover:bg-red-500 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Athletics</h3>
                <p class="text-sm font-semibold text-accent-500 uppercase tracking-wide mb-4">All Grades</p>
                <p class="text-slate-600 mb-6 leading-relaxed">Developing teamwork, resilience, and physical fitness
                    through competitive sports.</p>

                <ul class="space-y-2 mb-6 text-sm text-slate-600">
                    <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Varsity Teams</li>
                    <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Intramurals</li>
                    <li class="flex items-start"><svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Fitness Center</li>
                </ul>

                <button @click="activeModal = 'athletics'"
                    class="text-primary-600 font-bold hover:text-primary-700 flex items-center group-hover:translate-x-1 transition-transform">
                    Learn More <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Alpine Modal -->
        <div x-show="activeModal" style="display: none;"
            class="fixed inset-0 z-50 flex items-center justify-center px-4" x-cloak>
            <!-- Backdrop -->
            <div @click="activeModal = null" x-show="activeModal" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>

            <!-- Modal Content -->
            <div x-show="activeModal" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 scale-95 translate-y-10"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-95 translate-y-10"
                class="relative bg-white rounded-2xl shadow-2xl max-w-lg w-full p-8 z-10">

                <button @click="activeModal = null" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <h3 class="text-2xl font-bold font-heading text-slate-900 mb-4">Program Details</h3>
                <p class="text-slate-600 mb-6">Thank you for your interest! For a detailed curriculum guide and specific
                    enrollment requirements for this program, please contact our admissions office.</p>

                <div class="bg-primary-50 rounded-xl p-4 flex items-start mb-6">
                    <div class="shrink-0 bg-white p-2 rounded-lg text-primary-600 shadow-sm mr-4">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-slate-900">Email Admissions</p>
                        <a href="mailto:moonstar.gharounda@gmail.com"
                            class="text-sm text-primary-600 hover:underline">moonstar.gharounda@gmail.com</a>
                    </div>
                </div>

                <div class="flex space-x-4">
                    <a href="<?= base_url('contact') ?>"
                        class="flex-1 text-center py-3 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl transition-colors">Contact
                        Us</a>
                    <button @click="activeModal = null"
                        class="flex-1 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold rounded-xl transition-colors">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-24 bg-white text-center">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-3xl font-bold font-heading text-slate-900 mb-6">Ready to Join the Moonstar Family?</h2>
        <p class="text-lg text-slate-600 mb-8">We are accepting applications for the upcoming academic year. Secure your
            child's future today.</p>
        <a href="<?= base_url('admissions') ?>"
            class="inline-block px-8 py-4 bg-accent-500 hover:bg-accent-600 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all hover:-translate-y-1">
            Apply Now
        </a>
    </div>
</section>

<?= $this->endSection() ?>