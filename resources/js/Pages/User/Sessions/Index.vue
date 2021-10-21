<template>
    <Head title="Sessions" />

    <BreezeAuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-3 bg-blueish border-b border-gray-200">
                        <strong>{{ $page.props.auth.user.name }}</strong
                        >'s Sessions & Notes
                    </div>
                </div>
                <br />
                <div class="grid grid-cols-2">
                    <span class="justify-self-start ml-2">
                        <a
                            href="/patients"
                            method="get"
                            class="
                                inline-flex
                                items-center
                                px-1
                                pt-1
                                border-b-2 border-transparent
                                text-sm
                                font-medium
                                leading-5
                                text-gray-500
                                hover:text-gray-700 hover:border-gray-400
                                focus:outline-none
                                focus:text-gray-700
                                focus:border-gray-400
                                transition
                                duration-150
                                ease-in-out
                            "
                            >Back to Patients</a
                        >
                    </span>

                    <span class="justify-self-end"> </span>
                </div>
                <br />
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div
                            class="
                                py-2
                                align-middle
                                inline-block
                                min-w-full
                                sm:px-6
                                lg:px-8
                            "
                        >
                            <div
                                class="
                                    shadow
                                    overflow-hidden
                                    border-b border-gray-200
                                    sm:rounded-lg
                                "
                            >
                                <table
                                    class="min-w-full divide-y divide-gray-200"
                                >
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th
                                                scope="col"
                                                class="
                                                    px-6
                                                    py-3
                                                    text-left text-xs
                                                    font-medium
                                                    text-gray-500
                                                    uppercase
                                                    tracking-wider
                                                "
                                            >
                                                Date
                                            </th>
                                            <th
                                                scope="col"
                                                class="
                                                    px-6
                                                    py-3
                                                    text-left text-xs
                                                    font-medium
                                                    text-gray-500
                                                    uppercase
                                                    tracking-wider
                                                "
                                            >
                                                Patient
                                            </th>
                                            <th
                                                scope="col"
                                                class="
                                                    px-6
                                                    py-3
                                                    text-left text-xs
                                                    font-medium
                                                    text-gray-500
                                                    uppercase
                                                    tracking-wider
                                                "
                                            >
                                                Keywords
                                            </th>
                                            <th
                                                scope="col"
                                                class="
                                                    px-6
                                                    py-3
                                                    text-left text-xs
                                                    font-medium
                                                    text-gray-500
                                                    uppercase
                                                    tracking-wider
                                                "
                                            >
                                                Notes
                                            </th>
                                            <th
                                                scope="col"
                                                class="
                                                    px-6
                                                    py-3
                                                    text-left text-xs
                                                    font-medium
                                                    text-gray-500
                                                    uppercase
                                                    tracking-wider
                                                "
                                            >
                                                Rate & Payment
                                            </th>
                                            <th
                                                scope="col"
                                                class="
                                                    px-6
                                                    py-3
                                                    text-left text-xs
                                                    font-medium
                                                    text-gray-500
                                                    uppercase
                                                    tracking-wider
                                                "
                                            ></th>
                                            <th
                                                scope="col"
                                                class="
                                                    px-6
                                                    py-3
                                                    text-left text-xs
                                                    font-medium
                                                    text-gray-500
                                                    uppercase
                                                    tracking-wider
                                                "
                                            ></th>
                                            <th
                                                scope="col"
                                                class="
                                                    px-6
                                                    py-3
                                                    text-left text-xs
                                                    font-medium
                                                    text-gray-500
                                                    uppercase
                                                    tracking-wider
                                                "
                                            ></th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="
                                            bg-white
                                            divide-y divide-gray-200
                                        "
                                    >
                                        <tr
                                            v-for="session in $page.props
                                                .sessions"
                                            v-bind:key="session"
                                        >
                                            <td
                                                class="
                                                    px-6
                                                    py-4
                                                    whitespace-nowrap
                                                "
                                            >
                                                <div
                                                    class="
                                                        text-sm text-gray-900
                                                    "
                                                >
                                                    {{ session.date }}
                                                </div>
                                            </td>
                                            <td
                                                class="
                                                    px-6
                                                    py-4
                                                    whitespace-nowrap
                                                    text-sm
                                                "
                                            >
                                                <div
                                                    class="
                                                        text-sm text-gray-900
                                                    "
                                                >
                                                    <a
                                                        class="
                                                            cursor-pointer
                                                            text-gray-500
                                                        "
                                                        :href="`/patients/${session.patient_id}/`"
                                                        >{{
                                                            session.patient_name
                                                        }}</a
                                                    >
                                                </div>
                                            </td>

                                            <td
                                                class="
                                                    px-6
                                                    py-4
                                                    whitespace-nowrap
                                                    text-sm
                                                "
                                            >
                                                {{ session.keywords }}
                                            </td>
                                            <td
                                                class="
                                                    px-6
                                                    py-4
                                                    whitespace-nowrap
                                                    text-sm
                                                "
                                            >
                                                <span
                                                    class="
                                                        text-sm text-gray-500
                                                    "
                                                    v-if="
                                                        session.note != null &&
                                                        session.note
                                                            .isImportant == 0
                                                    "
                                                >
                                                    {{ session.note.title }}
                                                </span>
                                                <span
                                                    class="
                                                        text-sm text-gray-900
                                                    "
                                                    v-if="
                                                        session.note != null &&
                                                        session.note
                                                            .isImportant == 1
                                                    "
                                                >
                                                    (!) {{ session.note.title }}
                                                </span>
                                            </td>
                                            <td
                                                class="
                                                    px-6
                                                    py-4
                                                    whitespace-nowrap
                                                    text-sm text-gray-500
                                                "
                                            >
                                                <span
                                                    v-if="session.isPayed == 0"
                                                    @click.prevent="
                                                        paySession(
                                                            `${session.id}`,
                                                            `${session.patient_id}`
                                                        )
                                                    "
                                                    class="
                                                        px-2
                                                        inline-flex
                                                        text-xs
                                                        leading-5
                                                        font-semibold
                                                        rounded-full
                                                        bg-red-100
                                                        text-red-700
                                                        cursor-pointer
                                                    "
                                                >
                                                    {{ session.cost }} € pending
                                                </span>
                                                <span
                                                    v-if="session.isPayed == 1"
                                                    @click.prevent="
                                                        unpaySession(
                                                            `${session.id}`,
                                                            `${session.patient_id}`
                                                        )
                                                    "
                                                    class="
                                                        px-2
                                                        inline-flex
                                                        text-xs
                                                        leading-5
                                                        font-semibold
                                                        rounded-full
                                                        bg-green-100
                                                        text-green-700
                                                        cursor-pointer
                                                    "
                                                >
                                                    {{ session.cost }} € payed
                                                </span>
                                            </td>

                                            <td>
                                                <BreezeButton
                                                    class="
                                                        bg-yellow-400
                                                        text-white
                                                        hover:bg-yellow-500
                                                    "
                                                    ><a
                                                        :href="`/patients/${session.patient_id}/sessions/${session.id}`"
                                                        method="get"
                                                        >View</a
                                                    ></BreezeButton
                                                >
                                            </td>
                                            <td>
                                                <BreezeButton
                                                    class="
                                                        bg-green-400
                                                        text-white
                                                        hover:bg-green-500
                                                    "
                                                    ><a
                                                        :href="`/sessions/${session.id}/edit`"
                                                        method="get"
                                                        >Edit</a
                                                    ></BreezeButton
                                                >
                                            </td>
                                            <td>
                                                <BreezeButton
                                                    class="
                                                        bg-red-400
                                                        hover:bg-red-500
                                                        mr-3
                                                    "
                                                    @click.prevent="
                                                        deleteSession(
                                                            `${session.id}`
                                                        )
                                                    "
                                                    >Delete</BreezeButton
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <br />
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/Button.vue";
import BreezeNavLink from "@/Components/NavLink.vue";

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeButton,
        BreezeNavLink,
    },
    methods: {
        deleteSession(id) {
            if (confirm("Are you sure you want to delete this session?")) {
                this.$inertia.delete(`/sessions/${id}`);
            }
            return;
        },
        paySession(id, pid) {
            let data = {
                isPayed: true,
            };

            this.$inertia.patch(`/patients/${pid}/sessions/${id}/update`, data);
        },
        unpaySession(id, pid) {
            let data = {
                isPayed: false,
            };

            this.$inertia.patch(`/patients/${pid}/sessions/${id}/update`, data);
        },
    },
};
</script>
<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>
