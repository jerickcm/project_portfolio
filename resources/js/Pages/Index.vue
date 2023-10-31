<script>
import { Head, Link } from "@inertiajs/vue3";
import Layout from "../Layouts/GeneralLayout.vue";

export default {
    components: {
        Head,
        Link,
        Layout,
    },
    setup(props) {
        return {};
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
                                class="px-4 py-2 rounded bg-transparent hover:text-purple-700"
                            >
                                Hire Me
                            </a>
                            <button
                                type="button"
                                class="text-purple-700 hover:text-white border-2 border-purple-500 hover:bg-purple-500 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-purple-500 dark:text-purple-500 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-800"
                            >
                                Say Hello
                            </button>
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
                        I design and code beautifully simple things, and I love
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
                        Website Projects
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
                <div class="container mx-auto">
                    <div class="w-full sm:w-1/2 my-8 py-10">
                        <label class="text-3xl mt-4 text-center font-bold my-5">
                            Website Projects
                        </label>
                    </div>
                    <div class="flex flex-wrap">
                        <div class="w-1/3 p-4">
                            <div class="bg-gray-100 rounded-lg shadow-lg">
                                <div class="p-4">
                                    <!-- Image Box -->
                                    <div class="mb-4">
                                        <img
                                            src="your-image-url.jpg"
                                            alt="Image Alt Text"
                                            class="w-full h-auto rounded-lg"
                                        />
                                    </div>
                                    <!-- Widget content goes here -->
                                    <h3 class="text-xl font-semibold">
                                        Widget Title
                                    </h3>
                                    <p class="text-gray-700">
                                        Widget description or content.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="w-1/3 p-4">
                            <div
                                class="bg-gray-100 rounded-lg shadow-lg box-border hover:box-content"
                            >
                                <div class="p-4">
                                    <!-- Image Box -->
                                    <div class="mb-4">
                                        <img
                                            src="your-image-url.jpg"
                                            alt="Image Alt Text"
                                            class="w-full h-auto rounded-lg"
                                        />
                                    </div>
                                    <!-- Widget content goes here -->
                                    <h3 class="text-xl font-semibold">
                                        Widget Title
                                    </h3>
                                    <p class="text-gray-700">
                                        Widget description or content.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="w-1/3 p-4">
                            <div class="bg-gray-100 rounded-lg shadow-lg">
                                <div class="p-4">
                                    <!-- Image Box -->
                                    <div class="mb-4">
                                        <img
                                            src="your-image-url.jpg"
                                            alt="Image Alt Text"
                                            class="w-full h-auto rounded-lg"
                                        />
                                    </div>
                                    <!-- Widget content goes here -->
                                    <h3 class="text-xl font-semibold">
                                        Widget Title
                                    </h3>
                                    <p class="text-gray-700">
                                        Widget description or content.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="w-1/3 p-4">
                            <div class="bg-purple-100 rounded-lg shadow-lg">
                                <div class="p-4">
                                    <!-- Image Box -->
                                    <div class="mb-4">
                                        <img
                                            src="your-image-url.jpg"
                                            alt="Image Alt Text"
                                            class="w-full h-auto rounded-lg"
                                        />
                                    </div>
                                    <!-- Widget content goes here -->
                                    <h3 class="text-xl font-semibold">
                                        Widget Title
                                    </h3>
                                    <p class="text-gray-700">
                                        Widget description or content.
                                    </p>
                                </div>
                            </div>
                        </div>
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
