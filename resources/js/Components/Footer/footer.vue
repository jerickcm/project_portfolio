<script>
import { Head, Link } from "@inertiajs/vue3";

export default {
    data: () => ({}),
    components: {
        Link,
    },
};
</script>
<template>
    <footer>
        <div id="footer" class="p-5 bg-bottom">
            <footer class="footer bg-gray-900 text-gray-200 py-4 text-center">
                <div class="container mx-auto">
                    <p>
                        If you have any questions or inquiries, please
                        <a
                            href="mailto:contact@japan-travel.com"
                            class="text-blue-400 hover:text-blue-200"
                            >contact us via email</a
                        >.
                    </p>
                    <div class="mt-4">
                        <Link
                            :href="route('homepage')"
                            class="text-blue-400 hover:text-blue-200 mr-4"
                            >Home</Link
                        >
                        <Link
                            :href="route('about')"
                            class="text-blue-400 hover:text-blue-200 mr-4"
                            >About Us</Link
                        >
                    </div>
                </div>
            </footer>
        </div>
    </footer>
</template>
<style scoped>
.text-mustard {
    color: #e4c18e;
}
.bg-bottom {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
footer {
    height: 100px;
    width: 100%;
    position: absolute;
    left: 0;
    bottom: 0;
}
</style>
