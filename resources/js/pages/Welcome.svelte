<script lang="ts">
    import { Link, page } from '@inertiajs/svelte';
    import AppHead from '@/components/AppHead.svelte';
    import { toUrl } from '@/lib/utils';
    import { dashboard, login } from '@/routes';
    import { register } from '@/routes';

    const auth = $derived(page.props.auth);
</script>

<AppHead></AppHead>

<header>
    <nav class="h-14 py-3 px-6 flex justify-between fixed top-0 bg-base-100 w-full">
        <a href="/#">
            <img
                src="/hafidz-ubaidillah-logo.png"
                alt="hafidz ubaidillah logo"
                class="h-full"
            />
        </a>

        <div class="flex">
            <a href="#products" class="px-5 hover:underline">Produk</a>
            <a href="#services" class="px-5 hover:underline">Jasa</a>
            <a href="#projects" class="px-5 hover:underline">Proyek</a>
            <a href="#blogs" class="px-5 hover:underline">Blog</a>
        </div>
    </nav>
</header>
<section id="onboarding" class="min-h-screen bg-amber-950">
    <p>berisi pemancing</p>
</section>
<section id="onboarding" class="min-h-screen bg-blue-950">
    <p>perkenalan dan branding</p>
</section>
<section id="product" class="min-h-screen bg-green-950">
    <p>onboarding</p>
</section>
<section id="services" class="min-h-screen bg-red-950">
    <p>services short list</p>
</section>
<section id="projects" class="min-h-screen bg-cyan-950">
    <p>projects short list</p>
</section>
<section id="blogs" class="min-h-screen bg-indigo-950">
    <p>blogs short list</p>
</section>
<section id="affiliate" class="min-h-screen bg-indigo-950">afiliasi</section>
<footer id="footer" class="min-h-screen bg-indigo-950">footer</footer>
