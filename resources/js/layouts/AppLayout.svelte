<script lang="ts">
    import { page } from '@inertiajs/svelte';
    import type { Snippet } from 'svelte';
    import type { BreadcrumbItem } from '@/types';
    import type { Service } from '@/types/models';

    let mobileMenuOpen = $state(false);

    function toggleMobileMenu() {
        mobileMenuOpen = !mobileMenuOpen;
    }

    function closeMobileMenu() {
        mobileMenuOpen = false;
    }

    const { footer, full_name, services } = page.props as unknown as {
        footer: {
            [key: string]: string;
        };
        full_name: string;
        services: Service[];
    };

    let {
        children,
    }: {
        breadcrumbs?: BreadcrumbItem[];
        children?: Snippet;
    } = $props();
</script>

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
                href={`${route('home')}#products`}
                class="text-sm font-medium hover:text-primary transition-colors"
                >Produk</a
            >
            <a
                href={`${route('home')}#services`}
                class="text-sm font-medium hover:text-primary transition-colors"
                >Jasa</a
            >
            <a
                href={`${route('home')}#projects`}
                class="text-sm font-medium hover:text-primary transition-colors"
                >Proyek</a
            >
            <a
                href={`${route('home')}#blogs`}
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
                    href={`${route('home')}#products`}
                    class="px-4 py-2 hover:bg-base-200 rounded-md transition-colors text-sm font-medium"
                    onclick={closeMobileMenu}
                >
                    Produk
                </a>
                <a
                    href={`${route('home')}#services`}
                    class="px-4 py-2 hover:bg-base-200 rounded-md transition-colors text-sm font-medium"
                    onclick={closeMobileMenu}
                >
                    Jasa
                </a>
                <a
                    href={`${route('home')}#projects`}
                    class="px-4 py-2 hover:bg-base-200 rounded-md transition-colors text-sm font-medium"
                    onclick={closeMobileMenu}
                >
                    Proyek
                </a>
                <a
                    href={`${route('home')}#blogs`}
                    class="px-4 py-2 hover:bg-base-200 rounded-md transition-colors text-sm font-medium"
                    onclick={closeMobileMenu}
                >
                    Blog
                </a>
            </nav>
        </div>
    {/if}
</header>

<main>
    {@render children?.()}
</main>

<!-- FOOTER -->
<footer id="footer" class="bg-neutral text-neutral-content py-16 px-6 lg:px-12">
    <div class="w-full mx-auto max-w-5xl">
        <!-- Footer Top -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 pb-8">
            <!-- Brand -->
            <div>
                <a
                    href="/#"
                    class="text-xl font-bold mb-4 block hover:text-primary transition-colors"
                >
                    {full_name || 'Hafidz Ubaidillah'}
                </a>
                <p class="text-sm text-neutral-content/80 mb-4">
                    {footer.footer__resume || ''}
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="font-bold text-lg mb-4 text-neutral-content">
                    Navigasi
                </h4>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a
                            href={`${route('home')}#products`}
                            class="link link-hover text-neutral-content hover:text-primary"
                            >Produk</a
                        >
                    </li>
                    <li>
                        <a
                            href={`${route('home')}#services`}
                            class="link link-hover text-neutral-content hover:text-primary"
                            >Layanan</a
                        >
                    </li>
                    <li>
                        <a
                            href={`${route('home')}#projects`}
                            class="link link-hover text-neutral-content hover:text-primary"
                            >Proyek</a
                        >
                    </li>
                    <li>
                        <a
                            href={`${route('home')}#blogs`}
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
                    {#each services as service (service.id)}
                        <li>
                            <a
                                href={route('services.show', {
                                    service: service.id,
                                })}
                                class="link link-hover text-neutral-content hover:text-primary"
                                >{service.name}</a
                            >
                        </li>
                    {/each}
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
                            href={`mailto:${footer.footer__email}`}
                            class="link link-hover text-neutral-content hover:text-primary"
                            >{footer.footer__email}</a
                        >
                    </li>
                    <li class="text-neutral-content/80">
                        Phone: <a
                            href={`tel:${footer.footer__phone_number}`}
                            class="link link-hover text-neutral-content hover:text-primary"
                            >{footer.footer__phone}</a
                        >
                    </li>
                    <li class="text-neutral-content/80">
                        Location: {footer.footer__location}
                    </li>
                </ul>
            </div>
        </div>

        <!-- Social Links -->
        <div class="flex justify-center flex-wrap gap-4 pb-4">
            {#if footer.footer__github_url && footer.footer__github_username}
                <a
                    href={footer.footer__github_url || '#'}
                    target="_blank"
                    rel="noopener noreferrer"
                    class="link link-hover text-neutral-content hover:text-primary inline-flex items-center whitespace-nowrap gap-2"
                >
                    <img
                        src="/images/github.svg"
                        alt="GitHub"
                        class="size-4 dark:invert"
                    />
                    {footer.footer__github_username}
                </a>
            {/if}
            {#if footer.footer__linkedin_url && footer.footer__linkedin_username}
                <a
                    href={footer.footer__linkedin_url || '#'}
                    target="_blank"
                    rel="noopener noreferrer"
                    class="link link-hover text-neutral-content hover:text-primary inline-flex items-center whitespace-nowrap gap-2"
                >
                    <img
                        src="/images/linkedin.svg"
                        alt="LinkedIn"
                        class="size-4"
                    />
                    {footer.footer__linkedin_username}
                </a>
            {/if}
            {#if footer.footer__youtube_url && footer.footer__youtube_username}
                <a
                    href={footer.footer__youtube_url || '#'}
                    target="_blank"
                    rel="noopener noreferrer"
                    class="link link-hover text-neutral-content hover:text-primary inline-flex items-center whitespace-nowrap gap-2"
                >
                    <img
                        src="/images/youtube.svg"
                        alt="YouTube"
                        class="size-4"
                    />
                    {footer.footer__youtube_username}
                </a>
            {/if}
            {#if footer.footer__tiktok_url && footer.footer__tiktok_username}
                <a
                    href={footer.footer__tiktok_url || '#'}
                    target="_blank"
                    rel="noopener noreferrer"
                    class="link link-hover text-neutral-content hover:text-primary inline-flex items-center whitespace-nowrap gap-2"
                >
                    <img src="/images/tiktok.svg" alt="Tiktok" class="size-4" />
                    {footer.footer__tiktok_username}
                </a>
            {/if}
            {#if footer.footer__instagram_url && footer.footer__instagram_username}
                <a
                    href={footer.footer__instagram_url || '#'}
                    target="_blank"
                    rel="noopener noreferrer"
                    class="link link-hover text-neutral-content hover:text-primary inline-flex items-center whitespace-nowrap gap-2"
                >
                    <img
                        src="/images/instagram.svg"
                        alt="Instagram"
                        class="size-4"
                    />
                    {footer.footer__instagram_username}
                </a>
            {/if}
            {#if footer.footer__facebook_url && footer.footer__facebook_username}
                <a
                    href={footer.footer__facebook_url || '#'}
                    target="_blank"
                    rel="noopener noreferrer"
                    class="link link-hover text-neutral-content hover:text-primary inline-flex items-center whitespace-nowrap gap-2"
                >
                    <img
                        src="/images/facebook.svg"
                        alt="Facebook"
                        class="size-4"
                    />
                    {footer.footer__facebook_username}
                </a>
            {/if}
        </div>
        <!-- Footer Bottom -->
        <div
            class="pt-8 flex flex-col md:flex-row justify-between items-center gap-4 border-t border-neutral-focus"
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
