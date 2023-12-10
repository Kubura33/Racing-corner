<script setup>
import {Link, usePage} from '@inertiajs/vue3'
import {computed} from "vue";

const page = usePage()
const user = computed(() => page.props.auth.user)
const messages = computed(() => page.props.messages)
</script>

<template>
    <main id="adminBody">
        <header>

            <nav id="adminNav">
                <Link :href="route('admin.dashboard')">
                    Dashboard
                </Link>
                <Link :href="route('admin.ads')">
                    Oglasi
                </Link>
                <Link :href="route('admin.users')">Korisnici</Link>
            </nav>

        </header>

        <div style="display: flex; flex-direction: row; align-items: center;justify-content: center;justify-items: center;">
            <div onclick="this.remove()" style="text-align: center; font-size: 27px; padding: 20px; background-color: green; width: 33%; margin-top: 10px; border-radius:0.375rem" v-if="messages.success">
                {{messages.success}}
            </div>
            <div onclick="this.remove()" style="text-align: center; font-size: 27px; padding: 20px; background-color: red; width: 33%; margin-top: 10px; border-radius:0.375rem" v-else-if="messages.error">
                {{messages.error}}
            </div>
        </div>
        <article>
            <slot/>
        </article>
    </main>
</template>
