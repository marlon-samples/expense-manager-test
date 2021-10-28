<template>
    <Head title="User Management" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users {{roles}} {{canDelete}}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <BreezeUsersContainer v-bind:users="users" :create="canCreate" :update="canUpdate" :remove="canDelete">Users List</BreezeUsersContainer>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BreezeUsersContainer from '@/Containers/UsersContainer.vue';
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeUsersContainer,
        Head,
    },
    props: {
        users: Array,
        roles: Array,
        canCreate: Boolean,
        canUpdate: Boolean,
        canDelete: Boolean,
    }
}
</script>
