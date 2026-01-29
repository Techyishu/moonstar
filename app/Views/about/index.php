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
        <h1 class="text-3xl md:text-6xl font-bold font-heading text-white mb-4 md:mb-6 animate-fade-in-up">Welcome To
            Moon Star Public School</h1>
        <p class="text-base md:text-xl text-primary-200 leading-relaxed font-light">
            A world class educational group committed to holistic school education that engenders excellence in every
            sphere of human endeavor.
        </p>
    </div>
</section>

<!-- Welcome Section -->
<section class="py-12 md:py-20 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-6">
            <p class="text-slate-700 text-base md:text-lg leading-relaxed">
                Our Vision is to enable all students, without exception, to develop their talents to the full, and
                realize creative potential, including responsibilities of life and achievement of personal aims.
            </p>
            <p class="text-slate-700 text-base md:text-lg leading-relaxed">
                The process evolves to instill values of Indian tradition in three simple yet meaningful words: <strong
                    class="text-primary-700">"Satyam - Shivam - Sundaram"</strong> (Truth - Love - Beauty). The Motto of
                the school has been derived from ancient treasure of Vedas, which means <em>"Lead Me from Darkness to
                    Light"</em>.
            </p>
            <div class="py-6 px-8 bg-gradient-to-r from-accent-50 to-primary-50 rounded-2xl border border-accent-200">
                <p class="text-xl md:text-2xl font-heading font-bold text-primary-900 mb-2">
                    ॥ "आप हमें अबोध बालक दीजिए" "हम आपको सुबोध नागरिक देंगे" ॥
                </p>
                <p class="text-slate-600 italic">
                    You give us an innocent child, We will give you an intelligent citizen.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Values Section (Mission/Vision) -->
<section class="py-12 md:py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
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
                    To create a future-ready generation by integrating academic excellence with skill-based education,
                    nurturing confident, innovative, and responsible learners who contribute meaningfully to a
                    self-reliant and progressive India.
                </p>
            </div>

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
                    Our mission is to educate and empower young minds through holistic, skill-based, and value-oriented
                    education, fostering critical thinking, creativity, and lifelong learning to build a knowledgeable,
                    ethical, and progressive India.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Chairman's Message -->
<section class="py-8 md:py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-6 md:mb-8">
            <span class="text-accent-500 font-bold tracking-wider uppercase text-xs md:text-sm">Leadership
                Messages</span>
            <h2 class="text-xl md:text-3xl font-bold font-heading text-primary-950 mt-2">Chairman's Message</h2>
            <p class="text-base text-slate-600 mt-1">Mr. Sompal Rana</p>
        </div>
        <div class="bg-gradient-to-br from-primary-50 to-accent-50 rounded-2xl p-4 md:p-8 shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 md:gap-8">
                <div class="md:col-span-1">
                    <div class="relative overflow-hidden rounded-xl aspect-square">
                        <img src="<?= base_url('uploads/chairman/WhatsApp Image 2025-12-19 at 18.42.31-2.jpeg') ?>"
                            alt="Mr. Sompal Rana - Chairman" class="absolute inset-0 w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-900/20 to-transparent"></div>
                    </div>
                </div>
                <div class="md:col-span-3 space-y-3">
                    <div class="bg-white/80 rounded-lg p-3 md:p-4 border border-slate-200">
                        <p class="text-sm md:text-base leading-relaxed text-slate-700">
                            We stand on the threshold of a new beginning, having covered a quarter of a century in the
                            endeavor to create independent thinking, creative and sensitive individuals.
                        </p>
                    </div>
                    <div class="bg-white/80 rounded-lg p-3 md:p-4 border border-slate-200">
                        <p class="text-sm md:text-base leading-relaxed text-slate-700">
                            Every child is unique, every child is important. We are committed to provide a progressive
                            education system that steers the holistic education of a child.
                        </p>
                    </div>
                    <div class="bg-white/80 rounded-lg p-3 md:p-4 border border-slate-200">
                        <p class="text-sm md:text-base leading-relaxed text-slate-700">
                            We aim to develop a future generation that takes pride in our heritage and culture, with a
                            yearning for global competitive excellence.
                        </p>
                    </div>
                    <div class="bg-primary-100/50 rounded-lg p-3 md:p-4 border border-primary-200">
                        <p class="text-sm md:text-base font-medium text-primary-800 italic">
                            "Our greatest glory is not in never falling, but rising every time we fall"
                        </p>
                    </div>
                    <div class="bg-accent-100/50 rounded-lg p-3 md:p-4 border border-accent-200">
                        <p class="text-sm md:text-base italic text-accent-700">
                            "Love was not put in your heart to stay. Love isn't love until you give it away."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Director's Message -->
<section class="py-8 md:py-16 bg-slate-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-6 md:mb-8">
            <h2 class="text-xl md:text-3xl font-bold font-heading text-primary-950">Director's Message</h2>
            <p class="text-base text-slate-600 mt-1">Mr. Dinesh Kaushik</p>
        </div>
        <div class="bg-gradient-to-br from-accent-50 to-primary-50 rounded-2xl p-4 md:p-8 shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 md:gap-8">
                <div class="md:col-span-1">
                    <div class="relative overflow-hidden rounded-xl aspect-square">
                              <img src="<?= base_url('uploads/directors/WhatsApp Image 2026-01-28 at 12.45.02.jpeg') ?>"
                        alt="Mr. Dinesh Kaushik - Director"
                        class="absolute inset-0 w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-900/20 to-transparent"></div>
                    </div>
                </div>
                <div class="md:col-span-3 space-y-3">
                    <div class="bg-white/80 rounded-lg p-3 md:p-4 border border-slate-200">
                        <p class="text-sm md:text-base leading-relaxed text-slate-700">
                            Students and Visitors, I'm very delighted that you have taken the time to visit the Moon
                            Star Public School website. Our hope is that you find our website to be user-friendly.
                        </p>
                    </div>
                    <div class="bg-primary-100/50 rounded-lg p-3 md:p-4 border border-primary-200">
                        <p class="text-sm md:text-base font-medium text-primary-800">
                            "Education is the most powerful weapon which you can use to change the world." - Nelson
                            Mandela
                        </p>
                    </div>
                    <div class="bg-white/80 rounded-lg p-3 md:p-4 border border-slate-200">
                        <p class="text-sm md:text-base leading-relaxed text-slate-700">
                            We believe that Moon Star School offers an educational experience like no other to our
                            children and will give them the qualifications and confidence they will need to play a
                            leading role in tomorrow's society.
                        </p>
                    </div>
                    <div class="bg-white/80 rounded-lg p-3 md:p-4 border border-slate-200">
                        <p class="text-sm md:text-base leading-relaxed text-slate-700">
                            The Health, Hygiene and Safety of our children and teachers is paramount. All our endeavors
                            will fail if we, the School and the parents, are unable to forge a bond of trust.
                        </p>
                    </div>
                    <div class="bg-white/80 rounded-lg p-3 md:p-4 border border-slate-200">
                        <p class="text-sm md:text-base leading-relaxed text-slate-700">
                            We are committed to the philosophy that each member of the school community must have the
                            opportunity for reaching his potential.
                        </p>
                    </div>
                    <div class="bg-accent-100/50 rounded-lg p-3 md:p-4 border border-accent-200">
                        <p class="text-sm md:text-base font-medium text-accent-800">
                            "An opportunity is a gift by us to the students, what they can make of it, is their gift to
                            us and to the society at large."
                        </p>
                    </div>
                    <div class="bg-white/80 rounded-lg p-3 md:p-4 border border-slate-200">
                        <p class="text-sm md:text-base italic text-accent-700">
                            "We welcome you
                            here, to a world of learning in enjoyable ways, to a world where every child is challenged
                            to grow to his or her potential."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Principal's Message -->
<section class="py-8 md:py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-6 md:mb-8">
            <h2 class="text-xl md:text-3xl font-bold font-heading text-primary-950">Principal's Message</h2>
            <p class="text-base text-slate-600 mt-1">Dr. Rinkyla</p>
        </div>
        <div class="bg-white rounded-2xl p-4 md:p-8 shadow-lg border border-slate-100">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 md:gap-8">
                <div class="md:col-span-1">
                    <div class="relative overflow-hidden rounded-xl aspect-square">
                        <img src="<?= base_url('uploads/principals/IMG_5656.JPG') ?>" alt="Dr. Rinkyla - Principal"
                            class="absolute inset-0 w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-900/20 to-transparent"></div>
                    </div>
                </div>
                <div class="md:col-span-3 space-y-3">
                    <div class="bg-slate-50 rounded-lg p-3 md:p-4 border border-slate-200">
                        <p class="text-sm md:text-base leading-relaxed text-slate-700">
                            If there is anything more powerful in this universe than faith and hope, it's love. Love is
                            patient and kind. It gives hope and courage. Love heals and endures.
                        </p>
                    </div>
                    <div class="bg-slate-50 rounded-lg p-3 md:p-4 border border-slate-200">
                        <p class="text-sm md:text-base leading-relaxed text-slate-700">
                            Trees give fruit, rivers water, sun warmth, flowers resplendency – nature gives selflessly.
                            From these truths we learn our life's lesson – love and give.
                        </p>
                    </div>
                    <div class="bg-slate-50 rounded-lg p-3 md:p-4 border border-slate-200">
                        <p class="text-sm md:text-base leading-relaxed text-slate-700">
                            It is our endeavor to instill in our children compassion, empathy, tenderness and
                            humaneness, so they can forge a path of roses for themselves and humankind.
                        </p>
                    </div>
                    <div class="bg-slate-50 rounded-lg p-3 md:p-4 border border-slate-200">
                        <p class="text-sm md:text-base leading-relaxed text-slate-700">
                            I believe in quality education, which will create sensitive caring citizens who will give
                            something back to the society.
                        </p>
                    </div>
                    <div class="bg-primary-100/50 rounded-lg p-3 md:p-4 border border-primary-200">
                        <p class="text-sm md:text-base italic text-primary-700 font-medium">
                            "May God be our guiding light and bless our institution."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Grid (Core Values) -->
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

<?= $this->endSection() ?>