<script>
import { Head, Link } from "@inertiajs/vue3";
import { ref, onMounted, reactive, watch, computed } from "vue";
import Layout from "../Layouts/CityLayout.vue";

export default {
    components: {
        Layout,
        Head,
        Link,
    },
    setup(props) {},
};
</script>
<template>
    <Layout>
        <Head title="About | Japan Travel Information" />

        <div class="article-page bg-gray-100 p-4">
            <nav class="flex my-2" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-4">
                    <li>
                        <Link
                            :href="route('homepage')"
                            class="text-gray-600 hover:text-gray-800 hover:text-2xl transition-transform transform scale-105"
                        >
                            <svg
                                class="h-5 w-5 mr-2 text-gray-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"
                                />
                            </svg>
                            Back
                        </Link>
                    </li>
                </ol>
            </nav>
            <section class="my-6 mx-4">
                <div
                    class="bg-white p-6 shadow-lg rounded-lg border border-gray-300"
                >
                    <section>
                        <fieldset
                            class="border border-solid border-gray-300 p-3"
                        >
                            <legend class="text-2xl font-semibold mb-4 p-1">
                                About Us
                            </legend>
                            <section class="mb-8">
                                <h2 class="text-2xl font-semibold mb-4">
                                    Our Mission
                                </h2>
                                <p>
                                    We are passionate about providing travelers
                                    with up-to-date and comprehensive
                                    information about the beautiful cities of
                                    Tokyo, Yokohama, Kyoto, Osaka, Sapporo and
                                    Nagoya,. Our mission is to help you plan
                                    your perfect trip by offering detailed
                                    guides, itineraries, and valuable insights
                                    into each destination.
                                </p>
                            </section>

                            <section class="mb-8">
                                <h2 class="text-2xl font-semibold mb-4">
                                    Our Team
                                </h2>
                                <p>
                                    We are a team of travel enthusiasts who love
                                    exploring and sharing our experiences. Our
                                    dedicated writers and researchers are
                                    committed to bringing you the latest and
                                    most accurate information to make your
                                    travel dreams come true.
                                </p>
                            </section>

                            <section>
                                <h2 class="text-2xl font-semibold mb-4">
                                    Contact Us
                                </h2>
                                <p>
                                    If you have any questions, suggestions, or
                                    feedback, please don't hesitate to
                                    <a
                                        href="mailto:contact@japan-travel.com"
                                        class="text-blue-500 hover:text-blue-700"
                                        >get in touch with us</a
                                    >
                                    . We value your input and are here to assist
                                    you in planning your dream trip.
                                </p>
                            </section>
                        </fieldset>
                    </section>
                </div>
            </section>
        </div>
    </Layout>
</template>
