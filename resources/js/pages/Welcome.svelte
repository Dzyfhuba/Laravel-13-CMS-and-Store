<script lang="ts">
    import { Link, page } from '@inertiajs/svelte';
    import AppHead from '@/components/AppHead.svelte';
    import { toUrl } from '@/lib/utils';
    import { dashboard, login } from '@/routes';
    import { register } from '@/routes';
    // @ts-ignore
    import MyPhoto from '@/assets/ma-photo.png?format=webp&quality=10,50,75';
    // @ts-ignore
    import BgImgOnboarding from '@/assets/seni.png?format=webp&quality=10,50,75';
    // @ts-ignore
    import IllustrationImg from '@/assets/ilustrasi.png?format=webp&quality=10,50,75';
    import { lazyLoad } from '@/lib/lazyload';

    const auth = $derived(page.props.auth);
    let mobileMenuOpen = $state(false);

    function toggleMobileMenu() {
        mobileMenuOpen = !mobileMenuOpen;
    }

    function closeMobileMenu() {
        mobileMenuOpen = false;
    }
    const inlinePlaceholder = "data:image/svg+xml;utf8,<svg xmlns='http://w3.org' width='100' height='50' viewBox='0 0 100 50'><rect width='100%' height='100%' fill='%23ccc'/></svg>";
</script>

<AppHead></AppHead>

<header>
    <nav
        class="h-16 py-3 px-6 lg:px-12 flex justify-between items-center fixed top-0 backdrop-blur-md bg-base-100/80 w-full z-50 border-b border-base-300"
    >
        <!-- Logo -->
        <a href="/#" class="shrink-0">
            <img
                src="/hafidz-ubaidillah-logo.png"
                alt="hafidz ubaidillah logo"
                class="h-10"
            />
        </a>

        <!-- Desktop Menu -->
        <div class="hidden md:flex gap-8 items-center">
            <a
                href="#products"
                class="text-sm font-medium hover:text-primary transition-colors"
                >Produk</a
            >
            <a
                href="#services"
                class="text-sm font-medium hover:text-primary transition-colors"
                >Jasa</a
            >
            <a
                href="#projects"
                class="text-sm font-medium hover:text-primary transition-colors"
                >Proyek</a
            >
            <a
                href="#blogs"
                class="text-sm font-medium hover:text-primary transition-colors"
                >Blog</a
            >
        </div>

        <!-- Mobile Hamburger Button -->
        <button
            type="button"
            class="md:hidden flex flex-col gap-1.5 w-8 h-8 items-center justify-center hover:bg-base-200 rounded-md transition-colors"
            onclick={toggleMobileMenu}
            aria-label="Toggle menu"
        >
            <span
                class="w-6 h-0.5 bg-base-content transition-all"
                class:rotate-45={mobileMenuOpen}
                class:translate-y-2={mobileMenuOpen}
            ></span>
            <span
                class="w-6 h-0.5 bg-base-content transition-all"
                class:opacity-0={mobileMenuOpen}
            ></span>
            <span
                class="w-6 h-0.5 bg-base-content transition-all"
                class:-rotate-45={mobileMenuOpen}
                class:-translate-y-2={mobileMenuOpen}
            ></span>
        </button>
    </nav>

    <!-- Mobile Menu Dropdown -->
    {#if mobileMenuOpen}
        <div
            class="fixed top-16 left-0 right-0 bg-base-100 border-b border-base-300 z-40 md:hidden animate-in"
        >
            <nav class="flex flex-col p-4 gap-2">
                <a
                    href="#products"
                    class="px-4 py-2 hover:bg-base-200 rounded-md transition-colors text-sm font-medium"
                    onclick={closeMobileMenu}
                >
                    Produk
                </a>
                <a
                    href="#services"
                    class="px-4 py-2 hover:bg-base-200 rounded-md transition-colors text-sm font-medium"
                    onclick={closeMobileMenu}
                >
                    Jasa
                </a>
                <a
                    href="#projects"
                    class="px-4 py-2 hover:bg-base-200 rounded-md transition-colors text-sm font-medium"
                    onclick={closeMobileMenu}
                >
                    Proyek
                </a>
                <a
                    href="#blogs"
                    class="px-4 py-2 hover:bg-base-200 rounded-md transition-colors text-sm font-medium"
                    onclick={closeMobileMenu}
                >
                    Blog
                </a>
            </nav>
        </div>
    {/if}
</header>
<section
    id="onboarding"
    class="min-h-screen bg-linear-to-br from-base-100/70 to-base-200/70 relative overflow-hidden"
>
    <div
        class="relative z-20 mx-auto flex min-h-[calc(100vh-64px)] max-w-7xl items-center justify-center px-6 lg:px-12"
    >
        <div class="w-full h-screen grid grid-cols-1 lg:grid-cols-2">
            <!-- Left: Photo/Visual with Layered Background -->
            <div
                class="order-2 lg:order-1 flex items-end justify-center lg:justify-start"
            >
                <div
                    class="relative w-full lg:max-w-2xl h-80 sm:h-96 md:h-125 lg:h-162.5 top-0"
                >
                    <!-- Background Artwork (Latar Belakang) -->
                    <img
                        src={BgImgOnboarding}
                        alt="background artwork"
                        class="absolute inset-0 w-full h-full object-cover opacity-60 rounded-xl"
                    />
                    <!-- Photo (Gambar Utama) -->
                    <!-- <enhanced:img
                        src={MyPhoto}
                        alt="hafidz ubaidillah"
                        fetchpriority="high"
                        class="absolute inset-0 w-full h-full object-cover rounded-xl drop-shadow-2xl"
                    /> -->
                    <picture>
                        <source srcset={MyPhoto} type="image/webp" />
                        <img
                            src={inlinePlaceholder}
                            alt="hafidz ubaidillah"
                            fetchpriority="high"
                            class="absolute inset-0 w-full h-full object-cover rounded-xl drop-shadow-2xl"
                            use:lazyLoad={MyPhoto}
                        />
                    </picture>
                </div>
            </div>

            <!-- Right: Text Content -->
            <div
                class="order-1 lg:order-2 text-center lg:text-left lg:self-center flex flex-col justify-end"
            >
                <p
                    class="text-sm font-semibold uppercase tracking-[0.25em] text-primary/80"
                >
                    Fullstack Web Developer
                </p>
                <h1
                    class="mt-4 text-4xl font-black tracking-tight sm:text-5xl lg:text-6xl text-base-content"
                >
                    Hafidz Ubaidillah
                </h1>
                <p
                    class="mt-5 text-base leading-8 text-base-content/80 sm:text-lg"
                >
                    Seorang fullstack web developer yang senang mengeksplorasi
                    hal baru. Saya menikmati membangun solusi digital yang
                    bermanfaat, responsif, dan mudah digunakan untuk kebutuhan
                    bisnis maupun pengguna.
                </p>
                <p class="mt-4 text-lg font-semibold text-primary">
                    Terbuka untuk pekerjaan dan project.
                </p>
                <div
                    class="mt-8 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start"
                >
                    <a href={'#'} class="btn btn-primary">Hubungi Saya</a>
                    <a href="#products" class="btn btn-outline"
                        >Lihat Portfolio</a
                    >
                </div>
            </div>
        </div>
    </div>
</section>
<!-- SECTION: Perkenalan & Branding -->
<section
    id="branding"
    class="min-h-screen bg-linear-to-bl from-base-200 to-base-100 flex items-center pt-16"
>
    <div class="w-full mx-auto px-6 py-20 lg:px-12">
        <div class="max-w-5xl mx-auto">
            <div
                class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center"
            >
                <!-- Teks Content -->
                <div class="order-2 lg:order-1 text-center lg:text-left">
                    <h2 class="text-3xl lg:text-4xl font-black tracking-tight">
                        Tentang Hafidz Ubaidillah
                    </h2>
                    <p
                        class="mt-4 text-base leading-8 text-justify text-base-content/80"
                    >
                        Saya adalah seorang Software Developer lulusan Teknik
                        Informatika dengan pengalaman membangun solusi digital
                        modern yang terukur. Spesialisasi saya mencakup
                        pengembangan lintas platform untuk web dan mobile
                        menggunakan Laravel, Flutter, React, dan Svelte, serta
                        perancangan spesifikasi sistem (SRS).
                    </p>
                    <p
                        class="mt-4 text-base leading-8 text-justify text-base-content/80"
                    >
                        Selain berfokus pada pengalaman pengguna dan struktur
                        kode yang rapi, saya memiliki keahlian kuat dalam
                        manajemen infrastruktur. Saya terbiasa mengelola
                        environment server berbasis Linux, optimasi VPS, hingga
                        deployment aplikasi menggunakan Docker untuk memastikan
                        reliabilitas dan performa aplikasi dari sisi hulu hingga
                        hilir.
                    </p>
                    <div
                        class="mt-8 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start"
                    >
                        <a href={'#'} class="btn btn-primary">Hubungi Saya</a>
                        <a href="#projects" class="btn btn-outline"
                            >Lihat Portfolio</a
                        >
                    </div>
                </div>

                <!-- Visual / Gambar Aksesori -->
                <!-- PERLU GAMBAR: Foto profesional atau ilustrasi branding -->
                <div
                    class="order-1 lg:order-2 flex items-center justify-center"
                >
                    <div
                        class="w-full aspect-square bg-linear-to-br from-primary/20 to-secondary/20 rounded-2xl flex items-center justify-center border-2 border-dashed border-primary/40"
                    >
                        <!-- <div class="text-center">
                            <p
                                class="text-sm text-base-content/60 font-semibold"
                            >
                                [PERLU GAMBAR: Foto Profesional]
                            </p>
                        </div> -->
                        <!-- <enhanced:img
                            srcset={IllustrationImg}
                            alt="Illustration"
                            loading="lazy"
                            class="w-full h-full object-cover object-left"
                        /> -->
                        <picture>
                            <source
                                srcset={IllustrationImg}
                                type="image/webp"
                            />
                            <img
                                src={inlinePlaceholder}
                                alt="Illustration"
                                loading="lazy"
                                class="w-full h-full object-cover object-left"
                                use:lazyLoad={IllustrationImg}
                            />
                        </picture>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: Produk/Portfolio Highlight -->
<section
    id="products"
    class="min-h-screen bg-linear-to-br from-base-100 to-base-200 flex items-center pt-16"
>
    <div class="w-full mx-auto px-6 py-20 lg:px-12">
        <div class="max-w-5xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-16">
                <p
                    class="text-sm font-semibold uppercase tracking-[0.25em] text-primary/80"
                >
                    PORTFOLIO
                </p>
                <h2 class="mt-2 text-3xl lg:text-4xl font-black tracking-tight">
                    Produk & Solusi Terbaru
                </h2>
                <p
                    class="mt-4 text-base text-base-content/80 max-w-2xl mx-auto"
                >
                    Beberapa produk dan solusi yang telah saya kerjakan untuk
                    klien dan proyek personal
                </p>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Product Card 1 -->
                <div
                    class="card bg-base-100 shadow-md hover:shadow-xl transition-shadow"
                >
                    <!-- PERLU GAMBAR: Screenshot atau thumbnail produk 1 -->
                    <div
                        class="h-48 bg-linear-to-br from-primary/10 to-secondary/10 flex items-center justify-center border-b border-base-300"
                    >
                        <p class="text-sm text-base-content/60 font-semibold">
                            [PERLU GAMBAR: Produk 1]
                        </p>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title text-lg">
                            [template nama_produk_1]
                        </h3>
                        <p class="text-sm text-base-content/70">
                            Deskripsi singkat tentang produk atau solusi yang
                            telah dibuat dengan fitur-fitur unggulan.
                        </p>
                        <div class="card-actions justify-end mt-4">
                            <a href="#sd" class="link link-primary text-sm"
                                >Pelajari Lebih Lanjut →</a
                            >
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div
                    class="card bg-base-100 shadow-md hover:shadow-xl transition-shadow"
                >
                    <!-- PERLU GAMBAR: Screenshot atau thumbnail produk 2 -->
                    <div
                        class="h-48 bg-linear-to-br from-primary/10 to-secondary/10 flex items-center justify-center border-b border-base-300"
                    >
                        <p class="text-sm text-base-content/60 font-semibold">
                            [PERLU GAMBAR: Produk 2]
                        </p>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title text-lg">
                            [template nama_produk_2]
                        </h3>
                        <p class="text-sm text-base-content/70">
                            Deskripsi singkat tentang produk atau solusi yang
                            telah dibuat dengan fitur-fitur unggulan.
                        </p>
                        <div class="card-actions justify-end mt-4">
                            <a href="#sd" class="link link-primary text-sm"
                                >Pelajari Lebih Lanjut →</a
                            >
                        </div>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div
                    class="card bg-base-100 shadow-md hover:shadow-xl transition-shadow"
                >
                    <!-- PERLU GAMBAR: Screenshot atau thumbnail produk 3 -->
                    <div
                        class="h-48 bg-linear-to-br from-primary/10 to-secondary/10 flex items-center justify-center border-b border-base-300"
                    >
                        <p class="text-sm text-base-content/60 font-semibold">
                            [PERLU GAMBAR: Produk 3]
                        </p>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title text-lg">
                            [template nama_produk_3]
                        </h3>
                        <p class="text-sm text-base-content/70">
                            Deskripsi singkat tentang produk atau solusi yang
                            telah dibuat dengan fitur-fitur unggulan.
                        </p>
                        <div class="card-actions justify-end mt-4">
                            <a href="#sd" class="link link-primary text-sm"
                                >Pelajari Lebih Lanjut →</a
                            >
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Button -->
            <div class="text-center mt-12">
                <a href="#sd" class="btn btn-primary btn-lg">
                    Lihat Semua Produk
                </a>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: Layanan (Services) -->
<section
    id="services"
    class="min-h-screen bg-linear-to-bl from-base-200 to-base-100 flex items-center pt-16"
>
    <div class="w-full mx-auto px-6 py-20 lg:px-12">
        <div class="max-w-5xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-16">
                <p
                    class="text-sm font-semibold uppercase tracking-[0.25em] text-primary/80"
                >
                    LAYANAN
                </p>
                <h2 class="mt-2 text-3xl lg:text-4xl font-black tracking-tight">
                    Jasa yang Saya Tawarkan
                </h2>
                <p
                    class="mt-4 text-base text-base-content/80 max-w-2xl mx-auto"
                >
                    Berbagai layanan profesional untuk kebutuhan digital dan web
                    development bisnis Anda
                </p>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Service 1 -->
                <div
                    class="bg-base-100 p-8 rounded-xl shadow-md hover:shadow-lg transition-shadow"
                >
                    <!-- PERLU GAMBAR: Icon atau ilustrasi untuk Web Development -->
                    <div
                        class="w-16 h-16 bg-primary/20 rounded-lg flex items-center justify-center mb-4"
                    >
                        <span class="text-2xl">🚀</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Web Development</h3>
                    <p class="text-base-content/70 mb-4">
                        Membangun website dan aplikasi web modern dengan
                        teknologi terkini, responsif, dan performance optimal
                        untuk bisnis Anda.
                    </p>
                    <ul class="space-y-2 text-sm text-base-content/70">
                        <li>✓ Frontend Development (React, Svelte, Vue)</li>
                        <li>✓ Backend Development (Laravel, Node.js)</li>
                        <li>✓ Full Stack Solutions</li>
                        <li>✓ API Development & Integration</li>
                    </ul>
                </div>

                <!-- Service 2 -->
                <div
                    class="bg-base-100 p-8 rounded-xl shadow-md hover:shadow-lg transition-shadow"
                >
                    <!-- PERLU GAMBAR: Icon atau ilustrasi untuk UI/UX Design -->
                    <div
                        class="w-16 h-16 bg-secondary/20 rounded-lg flex items-center justify-center mb-4"
                    >
                        <span class="text-2xl">🎨</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">UI/UX Design</h3>
                    <p class="text-base-content/70 mb-4">
                        Merancang antarmuka yang indah, intuitif, dan
                        user-friendly untuk memberikan pengalaman terbaik kepada
                        pengguna.
                    </p>
                    <ul class="space-y-2 text-sm text-base-content/70">
                        <li>✓ User Interface Design</li>
                        <li>✓ User Experience Research</li>
                        <li>✓ Wireframing & Prototyping</li>
                        <li>✓ Design System Development</li>
                    </ul>
                </div>

                <!-- Service 3 -->
                <div
                    class="bg-base-100 p-8 rounded-xl shadow-md hover:shadow-lg transition-shadow"
                >
                    <!-- PERLU GAMBAR: Icon atau ilustrasi untuk Konsultasi -->
                    <div
                        class="w-16 h-16 bg-accent/20 rounded-lg flex items-center justify-center mb-4"
                    >
                        <span class="text-2xl">💡</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Technical Consulting</h3>
                    <p class="text-base-content/70 mb-4">
                        Memberikan konsultasi teknis untuk optimasi teknologi,
                        architecture design, dan strategi digital bisnis Anda.
                    </p>
                    <ul class="space-y-2 text-sm text-base-content/70">
                        <li>✓ Technology Selection</li>
                        <li>✓ Architecture Review</li>
                        <li>✓ Performance Optimization</li>
                        <li>✓ Best Practices & Standards</li>
                    </ul>
                </div>

                <!-- Service 4 -->
                <div
                    class="bg-base-100 p-8 rounded-xl shadow-md hover:shadow-lg transition-shadow"
                >
                    <!-- PERLU GAMBAR: Icon atau ilustrasi untuk Maintenance & Support -->
                    <div
                        class="w-16 h-16 bg-info/20 rounded-lg flex items-center justify-center mb-4"
                    >
                        <span class="text-2xl">🔧</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3">
                        Maintenance & Support
                    </h3>
                    <p class="text-base-content/70 mb-4">
                        Layanan pemeliharaan dan dukungan teknis berkelanjutan
                        untuk memastikan aplikasi Anda selalu berjalan optimal.
                    </p>
                    <ul class="space-y-2 text-sm text-base-content/70">
                        <li>✓ Bug Fixing & Troubleshooting</li>
                        <li>✓ Feature Enhancement</li>
                        <li>✓ Security Updates</li>
                        <li>✓ Performance Monitoring</li>
                    </ul>
                </div>
            </div>

            <!-- CTA -->
            <div class="text-center mt-12">
                <p class="text-base-content/80 mb-6">
                    Tertarik dengan layanan saya?
                </p>
                <a
                    href="[template email_atau_contact_link]"
                    class="btn btn-primary btn-lg"
                >
                    Hubungi Saya untuk Konsultasi Gratis
                </a>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: Proyek (Projects) -->
<section
    id="projects"
    class="min-h-screen bg-linear-to-br from-base-100 to-base-200 flex items-center pt-16"
>
    <div class="w-full mx-auto px-6 py-20 lg:px-12">
        <div class="max-w-5xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-16">
                <p
                    class="text-sm font-semibold uppercase tracking-[0.25em] text-primary/80"
                >
                    SHOWCASE
                </p>
                <h2 class="mt-2 text-3xl lg:text-4xl font-black tracking-tight">
                    Proyek Unggulan
                </h2>
                <p
                    class="mt-4 text-base text-base-content/80 max-w-2xl mx-auto"
                >
                    Koleksi proyek yang menunjukkan kemampuan dan pengalaman
                    dalam berbagai domain dan teknologi
                </p>
            </div>

            <!-- Project Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Project Card 1 -->
                <div
                    class="group overflow-hidden rounded-xl bg-base-100 shadow-md hover:shadow-xl transition-all"
                >
                    <!-- PERLU GAMBAR: Screenshot proyek 1 -->
                    <div
                        class="h-64 bg-linear-to-br from-primary/20 to-secondary/20 flex items-center justify-center overflow-hidden"
                    >
                        <p class="text-sm text-base-content/60 font-semibold">
                            [PERLU GAMBAR: Proyek 1]
                        </p>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">
                            [template nama_proyek_1]
                        </h3>
                        <p class="text-sm text-base-content/70 mb-4">
                            Deskripsi proyek dengan detail tentang teknologi
                            yang digunakan, tantangan yang dihadapi, dan solusi
                            yang diberikan.
                        </p>
                        <div class="mb-4">
                            <p
                                class="text-xs font-semibold text-base-content/60 mb-2"
                            >
                                TEKNOLOGI:
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span class="badge badge-sm">React</span>
                                <span class="badge badge-sm">Laravel</span>
                                <span class="badge badge-sm">PostgreSQL</span>
                            </div>
                        </div>
                        <a href="#sd" class="link link-primary text-sm"
                            >Lihat Detail Proyek →</a
                        >
                    </div>
                </div>

                <!-- Project Card 2 -->
                <div
                    class="group overflow-hidden rounded-xl bg-base-100 shadow-md hover:shadow-xl transition-all"
                >
                    <!-- PERLU GAMBAR: Screenshot proyek 2 -->
                    <div
                        class="h-64 bg-linear-to-br from-primary/20 to-secondary/20 flex items-center justify-center overflow-hidden"
                    >
                        <p class="text-sm text-base-content/60 font-semibold">
                            [PERLU GAMBAR: Proyek 2]
                        </p>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">
                            [template nama_proyek_2]
                        </h3>
                        <p class="text-sm text-base-content/70 mb-4">
                            Deskripsi proyek dengan detail tentang teknologi
                            yang digunakan, tantangan yang dihadapi, dan solusi
                            yang diberikan.
                        </p>
                        <div class="mb-4">
                            <p
                                class="text-xs font-semibold text-base-content/60 mb-2"
                            >
                                TEKNOLOGI:
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span class="badge badge-sm">Vue.js</span>
                                <span class="badge badge-sm">Node.js</span>
                                <span class="badge badge-sm">MongoDB</span>
                            </div>
                        </div>
                        <a href="#sd" class="link link-primary text-sm"
                            >Lihat Detail Proyek →</a
                        >
                    </div>
                </div>

                <!-- Project Card 3 -->
                <div
                    class="group overflow-hidden rounded-xl bg-base-100 shadow-md hover:shadow-xl transition-all"
                >
                    <!-- PERLU GAMBAR: Screenshot proyek 3 -->
                    <div
                        class="h-64 bg-linear-to-br from-primary/20 to-secondary/20 flex items-center justify-center overflow-hidden"
                    >
                        <p class="text-sm text-base-content/60 font-semibold">
                            [PERLU GAMBAR: Proyek 3]
                        </p>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">
                            [template nama_proyek_3]
                        </h3>
                        <p class="text-sm text-base-content/70 mb-4">
                            Deskripsi proyek dengan detail tentang teknologi
                            yang digunakan, tantangan yang dihadapi, dan solusi
                            yang diberikan.
                        </p>
                        <div class="mb-4">
                            <p
                                class="text-xs font-semibold text-base-content/60 mb-2"
                            >
                                TEKNOLOGI:
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span class="badge badge-sm">Svelte</span>
                                <span class="badge badge-sm">Python</span>
                                <span class="badge badge-sm">Firebase</span>
                            </div>
                        </div>
                        <a href="#sd" class="link link-primary text-sm"
                            >Lihat Detail Proyek →</a
                        >
                    </div>
                </div>

                <!-- Project Card 4 -->
                <div
                    class="group overflow-hidden rounded-xl bg-base-100 shadow-md hover:shadow-xl transition-all"
                >
                    <!-- PERLU GAMBAR: Screenshot proyek 4 -->
                    <div
                        class="h-64 bg-linear-to-br from-primary/20 to-secondary/20 flex items-center justify-center overflow-hidden"
                    >
                        <p class="text-sm text-base-content/60 font-semibold">
                            [PERLU GAMBAR: Proyek 4]
                        </p>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">
                            [template nama_proyek_4]
                        </h3>
                        <p class="text-sm text-base-content/70 mb-4">
                            Deskripsi proyek dengan detail tentang teknologi
                            yang digunakan, tantangan yang dihadapi, dan solusi
                            yang diberikan.
                        </p>
                        <div class="mb-4">
                            <p
                                class="text-xs font-semibold text-base-content/60 mb-2"
                            >
                                TEKNOLOGI:
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span class="badge badge-sm">Next.js</span>
                                <span class="badge badge-sm">GraphQL</span>
                                <span class="badge badge-sm">Docker</span>
                            </div>
                        </div>
                        <a href="#sd" class="link link-primary text-sm"
                            >Lihat Detail Proyek →</a
                        >
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="text-center mt-12">
                <a href="#sd" class="btn btn-primary btn-lg">
                    Lihat Semua Proyek
                </a>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: Blog -->
<section
    id="blogs"
    class="min-h-screen bg-linear-to-bl from-base-200 to-base-100 flex items-center pt-16"
>
    <div class="w-full mx-auto px-6 py-20 lg:px-12">
        <div class="max-w-5xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-16">
                <p
                    class="text-sm font-semibold uppercase tracking-[0.25em] text-primary/80"
                >
                    BLOG
                </p>
                <h2 class="mt-2 text-3xl lg:text-4xl font-black tracking-tight">
                    Artikel & Tulisan Terbaru
                </h2>
                <p
                    class="mt-4 text-base text-base-content/80 max-w-2xl mx-auto"
                >
                    Berbagi pengetahuan, tips, dan pengalaman dalam dunia web
                    development dan teknologi
                </p>
            </div>

            <!-- Blog Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Blog Card 1 -->
                <div
                    class="card bg-base-100 shadow-md hover:shadow-xl transition-shadow"
                >
                    <!-- PERLU GAMBAR: Featured image untuk blog 1 -->
                    <div
                        class="h-40 bg-linear-to-br from-primary/10 to-secondary/10 flex items-center justify-center border-b border-base-300"
                    >
                        <p class="text-sm text-base-content/60 font-semibold">
                            [PERLU GAMBAR: Blog 1]
                        </p>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title text-base">
                            [template judul_artikel_1]
                        </h3>
                        <p class="text-xs text-base-content/60">
                            [template tanggal_publikasi] • 5 min read
                        </p>
                        <p class="text-sm text-base-content/70">
                            Ringkasan singkat dari artikel yang membahas topik
                            menarik terkait web development, tips coding, atau
                            pengalaman pribadi.
                        </p>
                        <div
                            class="card-actions justify-between items-center mt-4"
                        >
                            <div class="flex gap-2">
                                <span class="badge badge-sm badge-outline"
                                    >[template kategori_1]</span
                                >
                            </div>
                            <a href="#sd" class="link link-primary text-sm"
                                >Baca →</a
                            >
                        </div>
                    </div>
                </div>

                <!-- Blog Card 2 -->
                <div
                    class="card bg-base-100 shadow-md hover:shadow-xl transition-shadow"
                >
                    <!-- PERLU GAMBAR: Featured image untuk blog 2 -->
                    <div
                        class="h-40 bg-linear-to-br from-primary/10 to-secondary/10 flex items-center justify-center border-b border-base-300"
                    >
                        <p class="text-sm text-base-content/60 font-semibold">
                            [PERLU GAMBAR: Blog 2]
                        </p>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title text-base">
                            [template judul_artikel_2]
                        </h3>
                        <p class="text-xs text-base-content/60">
                            [template tanggal_publikasi] • 7 min read
                        </p>
                        <p class="text-sm text-base-content/70">
                            Ringkasan singkat dari artikel yang membahas topik
                            menarik terkait web development, tips coding, atau
                            pengalaman pribadi.
                        </p>
                        <div
                            class="card-actions justify-between items-center mt-4"
                        >
                            <div class="flex gap-2">
                                <span class="badge badge-sm badge-outline"
                                    >[template kategori_2]</span
                                >
                            </div>
                            <a href="#sd" class="link link-primary text-sm"
                                >Baca →</a
                            >
                        </div>
                    </div>
                </div>

                <!-- Blog Card 3 -->
                <div
                    class="card bg-base-100 shadow-md hover:shadow-xl transition-shadow"
                >
                    <!-- PERLU GAMBAR: Featured image untuk blog 3 -->
                    <div
                        class="h-40 bg-linear-to-br from-primary/10 to-secondary/10 flex items-center justify-center border-b border-base-300"
                    >
                        <p class="text-sm text-base-content/60 font-semibold">
                            [PERLU GAMBAR: Blog 3]
                        </p>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title text-base">
                            [template judul_artikel_3]
                        </h3>
                        <p class="text-xs text-base-content/60">
                            [template tanggal_publikasi] • 6 min read
                        </p>
                        <p class="text-sm text-base-content/70">
                            Ringkasan singkat dari artikel yang membahas topik
                            menarik terkait web development, tips coding, atau
                            pengalaman pribadi.
                        </p>
                        <div
                            class="card-actions justify-between items-center mt-4"
                        >
                            <div class="flex gap-2">
                                <span class="badge badge-sm badge-outline"
                                    >[template kategori_3]</span
                                >
                            </div>
                            <a href="#sd" class="link link-primary text-sm"
                                >Baca →</a
                            >
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="text-center mt-12">
                <a href="#sd" class="btn btn-primary btn-lg">
                    Baca Semua Artikel
                </a>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: Affiliate & Partnership -->
<section
    id="affiliate"
    class="min-h-screen bg-linear-to-br from-base-100 to-base-200 flex items-center pt-16"
>
    <div class="w-full mx-auto px-6 py-20 lg:px-12">
        <div class="max-w-5xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-16">
                <p
                    class="text-sm font-semibold uppercase tracking-[0.25em] text-primary/80"
                >
                    PARTNERSHIP
                </p>
                <h2 class="mt-2 text-3xl lg:text-4xl font-black tracking-tight">
                    Afiliasi & Rekomendasi
                </h2>
                <p
                    class="mt-4 text-base text-base-content/80 max-w-2xl mx-auto"
                >
                    Produk dan layanan yang saya percaya dan rekomendasikan
                    untuk mendukung workflow development Anda
                </p>
            </div>

            <!-- Affiliate Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Affiliate 1 -->
                <div
                    class="bg-base-100 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow border border-base-300"
                >
                    <!-- PERLU GAMBAR: Logo atau badge afiliasi 1 -->
                    <div
                        class="h-24 bg-linear-to-br from-primary/10 to-secondary/10 rounded-lg flex items-center justify-center mb-4"
                    >
                        <p class="text-xs text-base-content/60 font-semibold">
                            [PERLU GAMBAR: Logo 1]
                        </p>
                    </div>
                    <h3 class="text-lg font-bold mb-2">
                        [template nama_produk_afiliasi_1]
                    </h3>
                    <p class="text-sm text-base-content/70 mb-4">
                        Penjelasan singkat tentang produk/layanan ini dan
                        mengapa saya merekomendasikannya untuk kebutuhan Anda.
                    </p>
                    <a
                        href="[template link_afiliasi_1]"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="link link-primary text-sm"
                    >
                        Kunjungi →
                    </a>
                </div>

                <!-- Affiliate 2 -->
                <div
                    class="bg-base-100 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow border border-base-300"
                >
                    <!-- PERLU GAMBAR: Logo atau badge afiliasi 2 -->
                    <div
                        class="h-24 bg-linear-to-br from-primary/10 to-secondary/10 rounded-lg flex items-center justify-center mb-4"
                    >
                        <p class="text-xs text-base-content/60 font-semibold">
                            [PERLU GAMBAR: Logo 2]
                        </p>
                    </div>
                    <h3 class="text-lg font-bold mb-2">
                        [template nama_produk_afiliasi_2]
                    </h3>
                    <p class="text-sm text-base-content/70 mb-4">
                        Penjelasan singkat tentang produk/layanan ini dan
                        mengapa saya merekomendasikannya untuk kebutuhan Anda.
                    </p>
                    <a
                        href="[template link_afiliasi_2]"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="link link-primary text-sm"
                    >
                        Kunjungi →
                    </a>
                </div>

                <!-- Affiliate 3 -->
                <div
                    class="bg-base-100 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow border border-base-300"
                >
                    <!-- PERLU GAMBAR: Logo atau badge afiliasi 3 -->
                    <div
                        class="h-24 bg-linear-to-br from-primary/10 to-secondary/10 rounded-lg flex items-center justify-center mb-4"
                    >
                        <p class="text-xs text-base-content/60 font-semibold">
                            [PERLU GAMBAR: Logo 3]
                        </p>
                    </div>
                    <h3 class="text-lg font-bold mb-2">
                        [template nama_produk_afiliasi_3]
                    </h3>
                    <p class="text-sm text-base-content/70 mb-4">
                        Penjelasan singkat tentang produk/layanan ini dan
                        mengapa saya merekomendasikannya untuk kebutuhan Anda.
                    </p>
                    <a
                        href="[template link_afiliasi_3]"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="link link-primary text-sm"
                    >
                        Kunjungi →
                    </a>
                </div>
            </div>

            <!-- Newsletter CTA -->
            <div
                class="mt-16 bg-linear-to-r from-primary/10 to-secondary/10 rounded-2xl p-8 md:p-12 border border-primary/20"
            >
                <div class="max-w-2xl mx-auto text-center">
                    <h3 class="text-2xl font-bold mb-4">
                        Dapatkan Update Terbaru
                    </h3>
                    <p class="text-base-content/80 mb-6">
                        Berlangganan newsletter saya untuk mendapatkan tips,
                        artikel terbaru, dan update tentang tools & resources
                        yang saya rekomendasikan.
                    </p>
                    <form class="flex flex-col sm:flex-row gap-3">
                        <input
                            type="email"
                            placeholder="[template email_address]"
                            class="input input-bordered flex-1"
                            required
                        />
                        <button type="submit" class="btn btn-primary">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer id="footer" class="bg-neutral text-neutral-content py-16 px-6 lg:px-12">
    <div class="w-full mx-auto max-w-5xl">
        <!-- Footer Top -->
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 pb-8 border-b border-neutral-focus"
        >
            <!-- Brand -->
            <div>
                <a
                    href="/#"
                    class="text-xl font-bold mb-4 block hover:text-primary transition-colors"
                >
                    Hafidz Ubaidillah
                </a>
                <p class="text-sm text-neutral-content/80 mb-4">
                    Fullstack Web Developer yang passionate tentang membangun
                    solusi digital yang berguna dan inovatif.
                </p>
                <!-- Social Links -->
                <div class="flex gap-4">
                    <a
                        href="[template github_profile]"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="link link-hover text-neutral-content hover:text-primary"
                    >
                        GitHub
                    </a>
                    <a
                        href="[template linkedin_profile]"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="link link-hover text-neutral-content hover:text-primary"
                    >
                        LinkedIn
                    </a>
                    <a
                        href="[template twitter_profile]"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="link link-hover text-neutral-content hover:text-primary"
                    >
                        Twitter
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="font-bold text-lg mb-4 text-neutral-content">
                    Navigasi
                </h4>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a
                            href="#products"
                            class="link link-hover text-neutral-content hover:text-primary"
                            >Produk</a
                        >
                    </li>
                    <li>
                        <a
                            href="#services"
                            class="link link-hover text-neutral-content hover:text-primary"
                            >Layanan</a
                        >
                    </li>
                    <li>
                        <a
                            href="#projects"
                            class="link link-hover text-neutral-content hover:text-primary"
                            >Proyek</a
                        >
                    </li>
                    <li>
                        <a
                            href="#blogs"
                            class="link link-hover text-neutral-content hover:text-primary"
                            >Blog</a
                        >
                    </li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h4 class="font-bold text-lg mb-4 text-neutral-content">
                    Layanan
                </h4>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a
                            href="#sd"
                            class="link link-hover text-neutral-content hover:text-primary"
                            >Web Development</a
                        >
                    </li>
                    <li>
                        <a
                            href="#sd"
                            class="link link-hover text-neutral-content hover:text-primary"
                            >UI/UX Design</a
                        >
                    </li>
                    <li>
                        <a
                            href="#sd"
                            class="link link-hover text-neutral-content hover:text-primary"
                            >Consulting</a
                        >
                    </li>
                    <li>
                        <a
                            href="#sd"
                            class="link link-hover text-neutral-content hover:text-primary"
                            >Support</a
                        >
                    </li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="font-bold text-lg mb-4 text-neutral-content">
                    Hubungi
                </h4>
                <ul class="space-y-2 text-sm">
                    <li class="text-neutral-content/80">
                        Email: <a
                            href="[template email]"
                            class="link link-hover text-neutral-content hover:text-primary"
                            >[template email_address]</a
                        >
                    </li>
                    <li class="text-neutral-content/80">
                        Phone: <a
                            href="[template phone]"
                            class="link link-hover text-neutral-content hover:text-primary"
                            >[template nomor_telepon]</a
                        >
                    </li>
                    <li class="text-neutral-content/80">
                        Location: [template lokasi]
                    </li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div
            class="pt-8 flex flex-col md:flex-row justify-between items-center gap-4"
        >
            <p class="text-sm text-neutral-content/80">
                &copy; 2024 Hafidz Ubaidillah. All rights reserved.
            </p>
            <div class="flex gap-6 text-sm">
                <a
                    href="#sd"
                    class="link link-hover text-neutral-content hover:text-primary"
                    >Privacy Policy</a
                >
                <a
                    href="#sd"
                    class="link link-hover text-neutral-content hover:text-primary"
                    >Terms of Service</a
                >
                <a
                    href="#sd"
                    class="link link-hover text-neutral-content hover:text-primary"
                    >Sitemap</a
                >
            </div>
        </div>
    </div>
</footer>
