<script>
import { Link } from "@inertiajs/vue3";
import Footer from "../Components/Footer/footer.vue";
export default {
    data: () => ({}),
    components: {
        Link,
        Footer,
    },
};
</script>
<template>
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white"
    >
        <div class="w-full">
            <div id="holder">
                <div id="body">
                    <main>
                        <slot />
                    </main>
                    <div style="min-height: 100px"></div>
                </div>

                <Footer />
            </div>
        </div>
    </div>
</template>

<style>
#holder {
    min-height: 100%;
    position: relative;
}

#body {
    padding-bottom: 120px;
}
</style>
