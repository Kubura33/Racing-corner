
import MainLayout from "@/Layouts/MainLayout.vue";
import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/vue3';
import {ZiggyVue} from 'ziggy-js';
import ResizeTextarea from 'resize-textarea-vue3';

const appName = import.meta.env.VITE_APP_NAME || 'Trkacka Berza';


createInertiaApp({
    title: title => ` ${appName}  ${title} `,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page = pages[`./Pages/${name}.vue`]
        page.default.layout = page.default.layout || MainLayout
        return page
    },
    setup({el, App, props, plugin}) {
        return createApp({render: () => h(App, props)})
            .use(plugin)
            .use(ZiggyVue)
            .use(ResizeTextarea)
            .mount(el);
    },

    progress: {
        color: '#4B5563',
    },
});
