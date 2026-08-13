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
    navigasi
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
<section id="onboarding" class="min-h-screen bg-red-950">
    <p>services short list</p>
</section>
<section id="onboarding" class="min-h-screen bg-cyan-950">
    <p>projects short list</p>
</section>
<section id="onboarding" class="min-h-screen bg-indigo-950">
    <p>blogs short list</p>
</section>
<footer id="footer" class="min-h-screen bg-indigo-950">
footer
</footer>
