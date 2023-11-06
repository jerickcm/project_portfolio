<script>
import { Link } from "@inertiajs/vue3";
import { onMounted } from "vue";
import usePersonalData from "./../../Composables/personaldata_api";
export default {
    components: {
        Link,
    },
    setup() {
        const { getSocials, footer } = usePersonalData();
        onMounted(async () => {
            await getSocials();
        });
        return { footer };
    },
};
</script>
<template>
    <footer>
        <div id="footer" class="p-5 bg-bottom">
            <footer
                class="footer bg-gray-900 text-gray-200 py-4 text-center pb-5 sm:pb-20"
            >
                <div class="container mx-auto flex flex-col">
                    <div>
                        <p>
                            If you have any questions or inquiries, please
                            <a
                                href="mailto:jerickmangalus@engrjerick.com"
                                class="text-blue-400 hover:text-blue-200"
                                >contact us via email</a
                            >.
                        </p>
                    </div>

                    <div class="mt-2">
                        <Link
                            :href="route('homepage')"
                            class="text-blue-400 hover:text-blue-200 mr-4"
                            >Home</Link
                        >
                    </div>
                    <div class="p-1" v-if="footer.socials != null">
                        <p>E-mail : {{ footer.email }}</p>
                        <p>Contact Number :{{ footer.contact_number }}</p>
                    </div>
                </div>
                <div class="container mx-auto">
                    <div
                        class="flex flex-wrap flex-row justify-center items-center"
                        v-if="footer.socials != null"
                    >
                        <div
                            class="p-4"
                            v-for="(foot, index) in footer.socials"
                            :key="index"
                        >
                            <a :href="foot.url" target="_blank">
                                <img class="h-10" :src="foot.src" />
                            </a>
                        </div>
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
    height: 230px;
    width: 100%;
    position: absolute;
    left: 0;
    bottom: 0;
}
</style>
