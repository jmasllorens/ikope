<template>
    <Head title="Contact" />

    <BreezeAuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-3 bg-blueish border-b border-gray-200">
                        Contact
                    </div>
                </div>
                <br />
                <div
                    class="
                        relative
                        flex
                        items-top
                        justify-center
                        min-h-screen
                        sm:rounded-lg
                        bg-white
                        dark:bg-gray-900
                        sm:items-center sm:pt-0
                    "
                >
                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                        <div class="mt-8 overflow-hidden">
                            <div class="grid grid-cols-1 md:grid-cols-2">
                                <div
                                    class="
                                        p-6
                                        mr-2
                                        bg-gray-100
                                        dark:bg-gray-800
                                        sm:rounded-lg
                                    "
                                >
                                    <h1
                                        class="
                                            text-4xl
                                            sm:text-5xl
                                            text-gray-800
                                            dark:text-white
                                            font-bold
                                            tracking-tight
                                        "
                                    >
                                        Get in touch
                                    </h1>
                                    <p
                                        class="
                                            text-normal text-lg
                                            sm:text-2xl
                                            font-medium
                                            text-gray-600
                                            dark:text-gray-400
                                            mt-2
                                        "
                                    >
                                        Fill in the form to start a conversation
                                    </p>

                                    <div
                                        class="
                                            flex
                                            items-center
                                            mt-8
                                            text-gray-600
                                            dark:text-gray-400
                                        "
                                    >
                                        <svg
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            viewBox="0 0 24 24"
                                            class="w-8 h-8 text-gray-500"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                            />
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                            />
                                        </svg>
                                        <div
                                            class="
                                                ml-4
                                                text-md
                                                tracking-wide
                                                font-semibold
                                                w-40
                                            "
                                        >
                                            I-KOPE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            Bruc Street, 166, Barcelona, 08037
                                        </div>
                                    </div>

                                    <div
                                        class="
                                            flex
                                            items-center
                                            mt-4
                                            text-gray-600
                                            dark:text-gray-400
                                        "
                                    >
                                        <svg
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            viewBox="0 0 24 24"
                                            class="w-8 h-8 text-gray-500"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                            />
                                        </svg>
                                        <div
                                            class="
                                                ml-4
                                                text-md
                                                tracking-wide
                                                font-semibold
                                                w-40
                                            "
                                        >
                                            +34 123 45 67 89
                                        </div>
                                    </div>

                                    <div
                                        class="
                                            flex
                                            items-center
                                            mt-2
                                            text-gray-600
                                            dark:text-gray-400
                                        "
                                    >
                                        <svg
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            viewBox="0 0 24 24"
                                            class="w-8 h-8 text-gray-500"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                            />
                                        </svg>
                                        <div
                                            class="
                                                ml-4
                                                text-md
                                                tracking-wide
                                                font-semibold
                                                w-40
                                            "
                                        >
                                            info@ikope.com
                                        </div>
                                    </div>
                                </div>

                                <form
                                    @submit.prevent="sendMessage()"
                                    class="p-6 flex flex-col justify-center"
                                >
                                    <div class="flex flex-col mt-3">
                                        <BreezeLabel
                                            for="message"
                                            value="Message (max. 500)"
                                        />
                                        <textarea
                                            class="
                                                border-gray-300
                                                focus:border-indigo-300
                                                focus:ring
                                                focus:ring-indigo-200
                                                focus:ring-opacity-50
                                                rounded-md
                                                shadow-sm
                                                mt-1
                                                block
                                                w-full
                                            "
                                            rows="10"
                                            max="500"
                                            ref="input"
                                            id="message"
                                            v-model="form.message"
                                            type="textarea"
                                            required
                                            autofocus
                                        />
                                    </div>

                                    <div
                                        class="
                                            flex
                                            items-center
                                            justify-end
                                            mt-5
                                            space-x-3
                                        "
                                    >
                                        <BreezeButton
                                            type="submit"
                                            :class="{
                                                'opacity-25': form.processing,
                                            }"
                                            :disabled="form.processing"
                                        >
                                            Submit
                                        </BreezeButton>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/Button.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeInput from "@/Components/Input.vue";

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeButton,
        BreezeLabel,
        BreezeInput,
    },

    data() {
        return {
            form: this.$inertia.form({
                message: "",
            }),
        };
    },

    methods: {
        sendMessage() {
            let data = new FormData();

            data.append("message", this.form.message);

            this.$inertia.post("/contactMail", data);
        },
    },
};
</script>
<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>
