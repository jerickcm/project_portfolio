<script>
import { Head, Link } from "@inertiajs/vue3";
import Layout from "../Layouts/GeneralLayout.vue";
import { ref, onMounted, reactive, watch, computed } from "vue";
export default {
    components: {
        Head,
        Link,
        Layout,
    },
    setup(props) {
        const website_projects = reactive([
            {
                sitename: "Payco",
                image: "payco.jpg",
                url: "https://www.pay.co/",
                contribution: "",
            },
            {
                sitename: "ForexMart",
                image: "forexmart.jpg",
                url: "https://www.forexmart.com/",
                contribution: "",
            },
            {
                sitename: "Binary Instaforex",
                image: "binaryinstaforex.jpg",
                url: "https://binary.instaforex.com/",
                contribution: "",
            },
            {
                sitename: "Orsat",
                image: "orsat.jpg",
                url: "https://orsatmax.com/",
                contribution: "",
            },
            {
                sitename: "CSWDO Malolos Database",
                image: "cswdo.jpg",
                url: "https://cswdo.engrjerick.com/",
                contribution: "",
            },
            {
                sitename: "Saipan Dol Workforce",
                image: "cnmidol.jpg",
                url: "https://www.cnmidol.com/",
                contribution: "",
            },
            {
                sitename: "Japan Travel Information",
                image: "travelinfo.jpg",
                url: "https://travelinfo.engrjerick.com/",
                contribution: "",
            },
        ]);

        return { website_projects };
    },
};
</script>

<template>
    <Head title="Portfolio Website" />
    <Layout>
        <div class="min-h-screen flex flex-col">
            <section class="flex-1 h-screen bg-white-500 mb-16">
                <div class="flex mt-5 mx-6 mb-0">
                    <div class="w-1/2 p-4">
                        <div class="text-left">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="blue"
                                class="w-10 h-10"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"
                                />
                            </svg>
                        </div>
                    </div>
                    <div class="w-1/2 p-4">
                        <div class="text-right">
                            <a
                                href="https://github.com/jerickcm"
                                target="_blank"
                                class="px-4 py-2 rounded bg-transparent hover:text-purple-700"
                            >
                                Hire Me
                            </a>
                            <a href="mailto:jerickmangalus@engrjerick.com">
                                <button
                                    type="button"
                                    class="text-purple-700 hover:text-white border-2 border-purple-500 hover:bg-purple-500 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-500 dark:text-purple-500 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-800"
                                >
                                    Say Hello
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-center items-center my-8 py-10"
                >
                    <div class="text-4xl font-bold">
                        I plan, analyze and code as a Web Developer & Mentor
                    </div>
                    <div class="text-lg mt-4">
                        I engineer simple solutions through coding, and I love
                        what I do.
                    </div>
                    <div>
                        <img src="/assets/img/myavatar.svg" />
                    </div>
                    <div class="text-2xl mt-4">
                        I'm Engr. Jerick C. Mangalus
                    </div>
                </div>
            </section>

            <section
                class="flex-1 h-screen bg-blue-500 flex items-center justify-center"
            >
                <div class="w-full sm:w-1/2 text-white my-8 py-10">
                    <p class="text-3xl mt-4 text-center font-bold my-5">
                        Hello, I'm Jerick
                    </p>
                    <p class="text-xl mt-2 text-justify">
                        It's a pleasure to meet you. I've recently embarked on
                        my freelance web development journey this year. With a
                        B.S. in Computer Engineering and 27 units towards an
                        M.S. in Information Technology, I bring a strong
                        educational foundation. Alongside my civil service role,
                        I have significant web development experience. My goal
                        is to enhance my Computer Engineering skills, develop
                        research-oriented software, and deliver user-friendly
                        projects on time. Your collaboration and ideas are
                        always welcome on this exciting journey!
                    </p>
                </div>
            </section>

            <section>
                <div class="container mx-auto px-4">
                    <div
                        class="flex flex-col justify-center items-center my-8 py-10"
                    >
                        <label class="text-3xl mt-4 text-center font-bold my-5">
                            Website Projects
                        </label>
                    </div>

                    <div class="flex flex-wrap">
                        <div
                            class="w-1/3 p-4"
                            v-for="(item, index) in website_projects"
                            :key="index"
                        >
                            <div
                                class="bg-sky-300 rounded-lg shadow-lg border-2 border-blue-500 transition-transform transform hover:border-blue-500 hover:bg-sky-400"
                            >
                                <a :href="item.url">
                                    <div class="p-4">
                                        <div class="mb-4">
                                            <img
                                                :src="
                                                    '/assets/img/' + item.image
                                                "
                                                target="_blank"
                                                alt="Image Alt Text"
                                                class="w-full h-auto rounded-lg"
                                            />
                                        </div>
                                        <h3 class="text-xl font-semibold">
                                            {{ item.sitename }}
                                        </h3>
                                        <p class="text-gray-700">
                                            {{ item.contribution }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex flex-col justify-center items-center mt-8 pt-10"
                    >
                        <img src="/assets/img/logo.jpg" alt="offial logo" />
                    </div>
                </div>
            </section>
        </div>
    </Layout>
</template>

<style scoped>
.min-height-15vh {
    min-height: 15vh;
}
</style>
