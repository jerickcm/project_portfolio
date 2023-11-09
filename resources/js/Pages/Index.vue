<script>
import { Head, Link } from "@inertiajs/vue3";
import Layout from "@/Layouts/GeneralLayout.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import {
    ref,
    reactive,
    watch,
    computed,

    // lifecycle hooks
    onMounted,
    onBeforeUnmount,
    onServerPrefetch,

} from "vue";
import { Observable, Subscription } from "rxjs";
import { BehaviorSubject, fromEvent } from "rxjs";
import { takeUntil } from "rxjs/operators";
import useOpenWeatherApi from "@/Composables/open_weather_api";
import usePersonalData from "@/Composables/personaldata_api";
import useHeaders from "@/Mixins/table_headers";

export default {
    components: {
        Head,
        Link,
        Layout,
        Dropdown,
        DropdownLink,
        Observable,
    },
    beforeCreate() {
        let thumb = document.createElement("META");
        thumb.setAttribute("name", "thumbnail");
        thumb.setAttribute("content", "/assets/img/index.jpg");
        document.querySelector(`head`).appendChild(thumb);
    },
    setup(props) {
        const form = reactive({});
        const loading = ref(true);
        const rows_per_page = ref(2);
        form.country_code = "ph";
        form.city_name = "manila";

        const { headers_certificate } = useHeaders();
        const { getPersonalContent, personal_data } = usePersonalData();

        const { getWeatherByCity, weather, errors_weather, convertTimezone } =
            useOpenWeatherApi();

        const convert_timezone = (timestamp, timezone) => {
            return convertTimezone(timestamp, timezone);
        };

        const dataReceived = ref(false);
        const receivedData = ref("");

        const observable = new BehaviorSubject(null);

        let subscription;

        const startObservable = () => {
            subscription = fromEvent(document, "mousemove")
                .pipe(takeUntil(observable))
                .subscribe((event) => {
                    receivedData.value = `X: ${event.clientX}, Y: ${event.clientY}`;
                    dataReceived.value = true;
                });
        };

        const stopObservable = () => {
            if (subscription) {
                subscription.unsubscribe();
            }
            observable.next(true);
            observable.complete();
            dataReceived.value = false;
            receivedData.value = "";
        };
        onServerPrefetch(async () => {
            await startObservable();
            await stopObservable();
            await startObservable();
            await getWeatherByCity({ ...form }).then(() => {
                loading.value = false;
            });
            await getPersonalContent();
        })
        onMounted(async () => {
            await startObservable();
            await stopObservable();
            await startObservable();
            await getWeatherByCity({ ...form }).then(() => {
                loading.value = false;
            });
            await getPersonalContent();
        });

        onBeforeUnmount(() => {
            stopObservable();
        });

        const section = {
            class: "relative",
        };

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

            gotoSection,

            sections_main,
            sections_intro,
            sections_skill,
            sections_project,
            sections_cert,
            sections_freelance,
            sections_testimonial,
            gotoTop,

            startObservable,
            stopObservable,
            dataReceived,
            receivedData,

            weather,
            convert_timezone,
            loading,

            headers_certificate,
            rows_per_page,
            personal_data,
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
                <div>
                    <div v-if="dataReceived" class="">
                        <p>Coordinates: {{ receivedData }}</p>
                    </div>
                </div>
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
                                <!-- focus:border-gray-200 -->
                                <select
                                    @change="gotoSection($event)"
                                    id="underline_select"
                                    class="underline_select w-30 block py-2.5 px-2 w-full text-md text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none peer focus:shadow-none"
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
                <div
                    v-if="!loading"
                    class="left-0 bottom-0 p-4 bg-white shadow-md rounded-lg"
                    v-for="(item, index) in weather"
                    :key="index"
                >
                    <!-- Weather information content goes here -->
                    <div class="text-lg font-semibold">Today's Weather</div>
                    <div class="flex flex-wrap flex-row items-center">
                        <div>
                            <img
                                src="/assets/img/logo/weather-color-moon-cloud-light-svgrepo-com.svg"
                                alt="Weather Icon"
                                class="w-8 h-8 mr-2"
                            />
                        </div>
                        <div>
                            <span>
                                {{ item.name }} , {{ item.sys.country }},
                                {{ parseInt(item.main.temp - 273.15) }} °C -
                                {{
                                    parseInt(
                                        (item.main.temp - 273.15) * (9 / 5) + 32
                                    )
                                }}
                                °F
                            </span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="text-gray-600">
                            {{ item.weather[0]["main"] }} -
                            {{ item.weather[0]["description"] }} </span
                        ><br />
                        <span class="text-gray-600"
                            >Wind: {{ item.wind.speed }} m/s
                        </span>
                        <span class="ml-4 text-gray-600"
                            >Humidity: {{ item.main.humidity }} %</span
                        >
                    </div>
                    <div class="mt-2">
                        <span class="text-gray-600"
                            >Sunrise:
                            {{
                                convert_timezone(
                                    item.sys.sunrise,
                                    item.timezone
                                )
                            }}</span
                        >
                        <span class="ml-4 text-gray-600"
                            >Sunset:
                            {{
                                convert_timezone(item.sys.sunset, item.timezone)
                            }}</span
                        >
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
                <div
                    class="flex flex-row flex-wrap justify-center"
                    v-if="personal_data.techlogo != null"
                >
                    <div
                        v-for="(logo, index) in personal_data.techlogo"
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

                    <div
                        class="flex flex-wrap"
                        v-if="personal_data.websites != null"
                    >
                        <div
                            class="w-full lg:w-1/3 md:w-1/2 sm:w-full p-4 px-1 py-1 sm:px-4 sm:py-4"
                            v-for="(item, index) in personal_data.websites"
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
                class="bg-blue-500 py-5 pb-20"
            >
                <div class="container mx-auto px-4">
                    <div
                        class="flex flex-col justify-center items-center py-10"
                    >
                        <label
                            class="text-white text-3xl mt-4 text-center font-bold my-5 underline underline-offset-8"
                        >
                            Training and Certificates
                        </label>
                    </div>
                    <div
                        class="mb-50"
                        v-if="personal_data.certificates != null"
                    >
                        <EasyDataTable
                            :headers="headers_certificate"
                            :items="personal_data.certificates"
                            table-class-name="customize-table-blue"
                            :rows-items="[1, 2, 5, 10]"
                            :rows-per-page="rows_per_page"
                        >
                            <template #expand="item">
                                <div class="flex flex-wrap flex-col">
                                    <div
                                        class="bg-blue-500 rounded-lg shadow-lg border-2 border-gray-400 transition-transform transform hover:border-white hover:bg-blue-400"
                                    >
                                        <a :href="item.url">
                                            <div class="p-4">
                                                <div class="mb-4">
                                                    <img
                                                        :src="item.src"
                                                        target="_blank"
                                                        :alt="item.src"
                                                        class="rounded-lg"
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
                                    <div
                                        v-if="item.url2 != ''"
                                        class="bg-blue-500 rounded-lg shadow-lg border-2 border-gray-400 transition-transform transform hover:border-white hover:bg-blue-400"
                                    >
                                        <a :href="item.url2">
                                            <div class="p-4">
                                                <div class="mb-4">
                                                    <img
                                                        :src="item.src2"
                                                        target="_blank"
                                                        :alt="item.src2"
                                                        class="rounded-lg"
                                                    />
                                                </div>
                                                <h3
                                                    class="text-xl font-semibold text-white"
                                                >
                                                    {{ item.title2 }}
                                                </h3>
                                            </div>
                                        </a>
                                    </div>
                                    <div
                                        v-if="item.url3 != ''"
                                        class="bg-blue-500 rounded-lg shadow-lg border-2 border-gray-400 transition-transform transform hover:border-white hover:bg-blue-400"
                                    >
                                        <a :href="item.url2">
                                            <div class="p-4">
                                                <div class="mb-4">
                                                    <img
                                                        :src="item.src3"
                                                        target="_blank"
                                                        :alt="item.src3"
                                                        class="rounded-lg"
                                                    />
                                                </div>
                                                <h3
                                                    class="text-xl font-semibold text-white"
                                                >
                                                    {{ item.title3 }}
                                                </h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </template>
                            <template #item-box="item">
                                <div
                                    class="bg-blue-500 rounded-lg shadow-lg border-2 border-gray-400 transition-transform transform hover:border-white hover:bg-blue-400"
                                >
                                    <a :href="item.url">
                                        <div class="p-4">
                                            <div class="mb-4">
                                                <img
                                                    :src="item.src"
                                                    target="_blank"
                                                    :alt="item.src"
                                                    class="rounded-lg"
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
                            </template>
                            <template #item-box2="item">
                                <div
                                    v-if="item.url2 != ''"
                                    class="bg-blue-500 rounded-lg shadow-lg border-2 border-gray-400 transition-transform transform hover:border-white hover:bg-blue-400"
                                >
                                    <a :href="item.url2">
                                        <div class="p-4">
                                            <div class="mb-4">
                                                <img
                                                    :src="item.src2"
                                                    target="_blank"
                                                    :alt="item.src2"
                                                    class="rounded-lg"
                                                />
                                            </div>
                                            <h3
                                                class="text-xl font-semibold text-white"
                                            >
                                                {{ item.title2 }}
                                            </h3>
                                        </div>
                                    </a>
                                </div>
                            </template>
                            <template #item-box3="item">
                                <div
                                    v-if="item.url3 != ''"
                                    class="bg-blue-500 rounded-lg shadow-lg border-2 border-gray-400 transition-transform transform hover:border-white hover:bg-blue-400"
                                >
                                    <a :href="item.url3">
                                        <div class="p-4">
                                            <div class="mb-4">
                                                <img
                                                    :src="item.src3"
                                                    target="_blank"
                                                    :alt="item.src3"
                                                    class="rounded-lg"
                                                />
                                            </div>
                                            <h3
                                                class="text-xl font-semibold text-white"
                                            >
                                                {{ item.title3 }}
                                            </h3>
                                        </div>
                                    </a>
                                </div>
                            </template>
                        </EasyDataTable>
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
                <div
                    class="flex flex-row flex-wrap justify-center"
                    v-if="personal_data.freelance != null"
                >
                    <div
                        v-for="(logo, index) in personal_data.freelance"
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
                        <div
                            class="flex -mx-4"
                            v-if="personal_data.testimonials != null"
                        >
                            <div
                                class="w-full md:w-1/2 lg:w-1/3 px-4 mb-4 m-2"
                                v-for="(
                                    item, index
                                ) in personal_data.testimonials"
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
                        <div
                            class="flex -mx-4"
                            v-if="personal_data.testimonials != null"
                        >
                            <div
                                class="w-full md:w-1/2 lg:w-1/3 px-4 mb-4 m-2"
                                v-for="(
                                    item, index
                                ) in personal_data.testimonials"
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
                <div class="absolute bottom-4s right-4">
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
<style scoped src="@/Assets/css/table_blue.css"></style>
<style scoped>
.min-height-15vh {
    min-height: 15vh;
}

#underline_select {
    --tw-ring-shadow: 0 0 #000 !important;
}

.vue3-easy-data-table__main .fixed-header {
    padding-bottom: 200px;
    margin-bottom: 200px;
}
</style>
