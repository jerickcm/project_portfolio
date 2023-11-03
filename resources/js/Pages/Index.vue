<script>
import { Head, Link } from "@inertiajs/vue3";
import Layout from "@/Layouts/GeneralLayout.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import { ref, onMounted, reactive, watch, computed } from "vue";
export default {
    components: {
        Head,
        Link,
        Layout,
        Dropdown,
        DropdownLink,
    },
    setup(props) {
        const section = {
            class: "relative",
        };
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
                sitename: "E27.co",
                image: "e27.jpg",
                url: "https://e27.co/",
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
        const training_certificates = reactive([
            /** Udemy */
            {
                url: "https://www.udemy.com/certificate/UC-3142d35c-73ad-46f8-9734-c9f5d669f18a/",
                src: "/assets/img/certificate/UC-3142d35c-73ad-46f8-9734-c9f5d669f18a.jpg",
                title: "AZ-900 Bootcamp: Microsoft Azure Fundamentals (OCT 2023)",
            },
            {
                url: "https://www.udemy.com/certificate/UC-dbaa6490-1a6c-4553-bd2c-4751ab7b07c1/",
                src: "/assets/img/certificate/UC-dbaa6490-1a6c-4553-bd2c-4751ab7b07c1.jpg",
                title: "PHP with Laravel for beginners - Become a Master in Laravel",
            },
            {
                url: "https://www.udemy.com/certificate/UC-735b5ac5-d6fc-4260-a51a-391b2e40b3e5/",
                src: "/assets/img/certificate/UC-735b5ac5-d6fc-4260-a51a-391b2e40b3e5.jpg",
                title: "Master Course : CC - Certified in Cybersecurity",
            },

            {
                url: "https://www.udemy.com/certificate/UC-6c132fd1-8089-424b-a33a-931ec06c1b3b/",
                src: "/assets/img/certificate/UC-6c132fd1-8089-424b-a33a-931ec06c1b3b.jpg",
                title: "Project Management Crash Course in 60 Minutes",
            },

            {
                url: "https://www.udemy.com/certificate/UC-a9104c52-224f-4bc8-8f91-c241e1c93951/",
                src: "/assets/img/certificate/UC-a9104c52-224f-4bc8-8f91-c241e1c93951.jpg",
                title: "React 18 Tutorial and Projects Course (2023)",
            },
            /** Google */
            {
                url: "https://skillshop.exceedlms.com/profiles/dd3b4d7fb337478f87b1f6372c277175",
                src: "/assets/img/certificate/GoogleAdsDisplayCertification_Google.jpg",
                title: "Google Ads Display Certification",
            },
            {
                url: "https://skillshop.exceedlms.com/profiles/dd3b4d7fb337478f87b1f6372c277175",
                src: "/assets/img/certificate/GoogleAdsSearchcertification_Google.jpg",
                title: "Google Ads Search certification",
            },
            {
                url: "https://skillshop.exceedlms.com/profiles/dd3b4d7fb337478f87b1f6372c277175",
                src: "/assets/img/certificate/GoogleAnalyticsIndividualQualification_Google.jpg",
                title: "Google Analytics Individual Qualification",
            },
        ]);
        const testimonial = reactive([
            {
                message: " Delivered outstanding results.",
                author: "",
                role: "",
            },
            {
                message: "Will be working with him again.",
                author: "Ms. Candy Feliciano",
                role: "CNMI DOL Operations- Mariana Island",
            },
            {
                message: "Top-notch solutions and a pleasure to work with.",
                author: "",
                role: "",
            },
            {
                message: "Innovative solutions and exceptional support.",
                author: "",
                role: "",
            },
            {
                message: "Highly skilled and professional.",
                author: "",
                role: "",
            },
        ]);
        const freelance = reactive([
            {
                src: "upwork.svg",
                name: "Upwork",
                alt: "Upwork",
                url: "https://www.upwork.com/freelancers/~015515782763c14dc3",
            },
            {
                src: "fiverr-2.svg",
                name: "Fiverr",
                alt: "Fiverr",
                url: "https://www.fiverr.com/jerickmangalus",
            },
        ]);
        const techlogo = reactive([
            {
                src: "python-5.svg",
                name: "Phyton",
                alt: "Phyton",
            },

            {
                src: "wordpress-icon.svg",
                name: "WordPress",
                alt: "WordPress",
            },

            {
                src: "codeigniter-2.svg",
                name: "CodeIgniter",
                alt: "CodeIgniter",
            },
            {
                src: "laravel-2.svg",
                name: "Laravel ",
                alt: "Laravel",
            },

            {
                src: "vue-9.svg",
                name: "Vue JS 3",
                alt: "Vue JS 3",
            },
            {
                src: "nuxt-2.svg",
                name: "Nuxt Js",
                alt: "Nuxt Js",
            },
            {
                src: "react-2.svg",
                name: "React Js",
                alt: "React Js",
            },
            {
                src: "ubuntu-icon.svg",
                name: "Ubuntu",
                alt: "Ubuntu",
            },
            {
                src: "centos.svg",
                name: "CentOS",
                alt: "CentOS",
            },
            {
                src: "nginx-1.svg",
                name: "Nginx",
                alt: "Nginx",
            },
            {
                src: "apache-13.svg",
                name: "Apache",
                alt: "Apache",
            },
            {
                src: "docker-3.svg",
                name: "Docker",
                alt: "Docker",
            },
        ]);

        const sections_main = ref([]);
        const sections_intro = ref([]);
        const sections_skill = ref([]);
        const sections_cert = ref([]);
        const sections_project = ref([]);
        const sections_freelance = ref([]);
        const sections_testimonial = ref([]);

        const gotoTop = () => {
            sections_main.value.scrollIntoView({ behavior: "smooth" });
        };

        const gotoSection = (event) => {
            switch (event.target.value) {
                case "sections_main":
                    sections_main.value.scrollIntoView({ behavior: "smooth" });
                    break;
                case "sections_intro":
                    sections_intro.value.scrollIntoView({ behavior: "smooth" });
                    break;
                case "sections_skill":
                    sections_skill.value.scrollIntoView({ behavior: "smooth" });
                    break;
                case "sections_project":
                    sections_project.value.scrollIntoView({
                        behavior: "smooth",
                    });
                    break;
                case "sections_cert":
                    sections_cert.value.scrollIntoView({ behavior: "smooth" });

                    break;
                case "sections_freelance":
                    sections_freelance.value.scrollIntoView({
                        behavior: "smooth",
                    });

                    break;
                case "sections_testimonial":
                    sections_testimonial.value.scrollIntoView({
                        behavior: "smooth",
                    });

                    break;
            }
        };

        return {
            section,
            website_projects,
            training_certificates,
            testimonial,
            techlogo,
            freelance,
            gotoSection,

            sections_main,
            sections_intro,
            sections_skill,
            sections_project,
            sections_cert,
            sections_freelance,
            sections_testimonial,
            gotoTop,
        };
    },
};
</script>

<template>
    <Head title="Portfolio Website" />
    <Layout>
        <div class="min-h-screen flex flex-col">
            <section
                :class="section.class"
                ref="sections_main"
                class="flex-1 h-screen"
            >
                <div class="flex mt-5 mx-6 mb-0">
                    <div class="w-full sm:w-1/2 p-2 sm:p-4">
                        <div class="text-left flex flex-row flex-wrap">
                            <div class="mx-0 sm:mx-10">
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
                            <div class="mx-0 sm:mx-10">
                                <label for="underline_select" class="sr-only"
                                    >Underline select</label
                                >
                                <select
                                    @change="gotoSection($event)"
                                    id="underline_select"
                                    class="w-30 block py-2.5 px-2 w-full text-md text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-2 focus:border-gray-200 peer"
                                >
                                    <option disabled selected>
                                        Navigate Section
                                    </option>

                                    <option value="sections_intro">
                                        Introduction
                                    </option>
                                    <option value="sections_skill">
                                        Skillset
                                    </option>
                                    <option value="sections_project">
                                        Website Projects
                                    </option>
                                    <option value="sections_cert">
                                        Training and Certificates
                                    </option>

                                    <option value="sections_freelance">
                                        My Freelance Page
                                    </option>
                                    <option value="sections_testimonial">
                                        Testimonial
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="w-full sm:w-1/2 p-2 sm:p-4">
                        <div class="flex justify-end sm:flex-row">
                            <div>
                                <button class="px-4 py-2">
                                    <a
                                        href="https://github.com/jerickcm"
                                        target="_blank"
                                        class="rounded bg-transparent hover:text-purple-700"
                                    >
                                        Hire Me
                                    </a>
                                </button>
                            </div>

                            <div>
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
                </div>

                <div
                    class="flex flex-col justify-center items-center px-2 my-2 py-2 sm:my-8 sm:py-10"
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
                <div class="h-20"></div>
                <div class="absolute bottom-4 right-4">
                    <button @click="gotoTop()" class="transparent">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="blue"
                            class="w-6 h-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12"
                            />
                        </svg>
                    </button>
                </div>
            </section>
            <section
                :class="section.class"
                ref="sections_intro"
                class="flex-1 h-screen bg-blue-500 flex items-center justify-center"
            >
                <div
                    class="w-full sm:w-1/2 text-white my-2 py-2 px-4 sm:my-8 sm:py-10"
                >
                    <div class="flex justify-center">
                        <div class="w-2/3 p-4 text-right">
                            <p class="text-3xl mt-4 font-bold my-5">
                                Hello, I'm Jerick
                            </p>
                        </div>
                        <div class="w-1/3 p-4 text-left">
                            <span class="relative flex h-3 w-3">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"
                                ></span>
                                <span
                                    class="relative inline-flex rounded-full h-3 w-3 bg-sky-500"
                                ></span>
                            </span>
                        </div>
                    </div>

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
                <div class="absolute bottom-4 right-4">
                    <button @click="gotoTop()" class="transparent">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="white"
                            class="w-6 h-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12"
                            />
                        </svg>
                    </button>
                </div>
            </section>
            <section
                :class="section.class"
                ref="sections_skill"
                class="bg-emerald-200 py-5"
            >
                <div class="flex flex-col justify-center">
                    <label class="text-xl text-center text-blue-950 my-2">
                        My Current Skillset
                    </label>
                </div>
                <div class="flex flex-row flex-wrap justify-center">
                    <div
                        v-for="(logo, index) in techlogo"
                        :key="index"
                        class="py-2 px-2 m-2 text-center"
                    >
                        <img
                            class="h-8"
                            :src="'/assets/img/logo/' + logo.src"
                            :alt="logo.alt"
                        />

                        <label class="text-center" for="vue logo">{{
                            logo.name
                        }}</label>
                    </div>
                </div>
                <div class="absolute bottom-4 right-4">
                    <button @click="gotoTop()" class="transparent">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="gray"
                            class="w-6 h-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12"
                            />
                        </svg>
                    </button>
                </div>
            </section>
            <section :class="section.class" ref="sections_project">
                <div class="container mx-auto px-4">
                    <div
                        class="flex flex-col justify-center items-center my-8 py-10"
                    >
                        <label
                            class="text-3xl mt-4 text-center font-bold my-5 underline underline-offset-8"
                        >
                            Website Projects
                        </label>
                    </div>

                    <div class="flex flex-wrap">
                        <div
                            class="w-full lg:w-1/3 md:w-1/2 sm:w-full p-4 px-1 py-1 sm:px-4 sm:py-4"
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
                </div>
                <div class="absolute bottom-4 right-4">
                    <button @click="gotoTop()" class="transparent">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="blue"
                            class="w-6 h-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12"
                            />
                        </svg>
                    </button>
                </div>
            </section>
            <section
                :class="section.class"
                ref="sections_cert"
                class="bg-blue-500 py-5"
            >
                <div class="container mx-auto px-4">
                    <div
                        class="flex flex-col justify-center items-center my-8 py-10"
                    >
                        <label
                            class="text-white text-3xl mt-4 text-center font-bold my-5 underline underline-offset-8"
                        >
                            Training and Certificates
                        </label>
                    </div>
                    <div class="flex flex-wrap">
                        <div
                            class="w-full lg:w-1/3 md:w-1/2 sm:w-full p-4 px-1 py-1 sm:px-4 sm:py-4"
                            v-for="(item, index) in training_certificates"
                            :key="index"
                        >
                            <div
                                class="bg-blue-500 rounded-lg shadow-lg border-2 border-gray-400 transition-transform transform hover:border-white hover:bg-blue-400"
                            >
                                <a :href="item.url">
                                    <div class="p-4">
                                        <div class="mb-4">
                                            <img
                                                :src="item.src"
                                                target="_blank"
                                                alt="Image Alt Text"
                                                class="w-full h-auto rounded-lg"
                                            />
                                        </div>
                                        <h3
                                            class="text-xl font-semibold text-white"
                                        >
                                            {{ item.title }}
                                        </h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute bottom-4 right-4">
                    <button @click="gotoTop()" class="transparent">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="white"
                            class="w-6 h-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12"
                            />
                        </svg>
                    </button>
                </div>
            </section>
            <section
                :class="section.class"
                ref="sections_freelance"
                class="bg-cyan-200 py-5"
            >
                <div class="flex flex-col justify-center">
                    <label class="text-xl text-center text-blue-950 my-2">
                        My Freelance Pages
                    </label>
                </div>
                <div class="flex flex-row flex-wrap justify-center">
                    <div
                        v-for="(logo, index) in freelance"
                        :key="index"
                        class="py-2 px-2 m-2 text-center"
                    >
                        <a :href="logo.url" target="_blank">
                            <img
                                class="h-8"
                                :src="'/assets/img/logo/' + logo.src"
                                :alt="logo.alt"
                            />
                            <label for="vue logo " class="text-center">{{
                                logo.name
                            }}</label>
                        </a>
                    </div>
                </div>
                <div class="absolute bottom-4 right-4">
                    <button @click="gotoTop()" class="transparent">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="gray"
                            class="w-6 h-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12"
                            />
                        </svg>
                    </button>
                </div>
            </section>
            <section
                :class="section.class"
                ref="sections_testimonial"
                class="flex-1 h-screen bg-black"
            >
                <div class="h-20"></div>
                <div class="relative flex overflow-x-hidden">
                    <div class="py-12 animate-marquee whitespace-nowrap">
                        <div class="flex -mx-4">
                            <div
                                class="w-full md:w-1/2 lg:w-1/3 px-4 mb-4 m-2"
                                v-for="(item, index) in testimonial"
                            >
                                <div
                                    class="border-2 bg-gray-900 p-6 rounded-lg shadow-lg"
                                >
                                    <div
                                        class="text-lg font-semibold mb-2 text-white"
                                    >
                                        Testimonial
                                    </div>
                                    <blockquote
                                        class="text-gray-700 text-xl mb-4 text-white"
                                    >
                                        "{{ item.message }}"
                                    </blockquote>
                                    <div class="text-gray-600">
                                        <p
                                            class="font-semibold"
                                            v-if="item.author != null"
                                        >
                                            - {{ item.author }}
                                        </p>
                                        <p v-if="item.role != null">
                                            {{ item.role }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="absolute top-0 py-12 animate-marquee2 whitespace-nowrap"
                    >
                        <div class="flex -mx-4">
                            <div
                                class="w-full md:w-1/2 lg:w-1/3 px-4 mb-4 m-2"
                                v-for="(item, index) in testimonial"
                            >
                                <div
                                    class="border-2 bg-gray-900 p-6 rounded-lg shadow-lg"
                                >
                                    <div
                                        class="text-lg font-semibold mb-2 text-white"
                                    >
                                        Testimonial
                                    </div>
                                    <blockquote
                                        class="text-gray-700 text-xl mb-4 text-white"
                                    >
                                        "{{ item.message }}"
                                    </blockquote>
                                    <div class="text-gray-600">
                                        <p
                                            class="font-semibold"
                                            v-if="item.author != null"
                                        >
                                            - {{ item.author }}
                                        </p>
                                        <p v-if="item.role != null">
                                            {{ item.role }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute bottom-4 right-4">
                    <button @click="gotoTop()" class="transparent">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="white"
                            class="w-6 h-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12"
                            />
                        </svg>
                    </button>
                </div>
            </section>
            <section :class="section.class" class="flex-1 h-screen bg-white">
                <div class="container mx-auto px-4">
                    <div
                        class="flex flex-col justify-center items-center mt-8 pt-10"
                    >
                        <img src="/assets/img/logo.jpg" alt="offial logo" />
                    </div>
                    <div
                        class="flex flex-col justify-center items-center mt-8 pt-10"
                    >
                        <button
                            class="tranparent group justify-center ease-out"
                            @click="gotoTop()"
                        >
                            <div
                                class="flex items-center justify-center relative transition-transform transform scale-100 group-hover:scale-110"
                            >
                                <img
                                    src="/assets/img/logo/rocket-svgrepo-com.svg"
                                    class="h-10 justify-center"
                                />
                            </div>
                            <div>
                                <span
                                    class="invisible group-hover:visible justify-center"
                                >
                                    Click to launch up the rocket
                                </span>
                            </div>
                        </button>
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
