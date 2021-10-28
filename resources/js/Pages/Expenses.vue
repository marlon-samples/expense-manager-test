<template>
    <Head title="Expenses Management" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Expenses {{roles}}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <BreezeExpensesContainer v-bind:expenses="expenses" :create="canCreate" :update="canUpdate" :remove="canDelete">Expenses</BreezeExpensesContainer>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BreezeExpensesContainer from '@/Containers/ExpensesContainer.vue';
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeExpensesContainer,
        Head,
    },
    props: {
        expenses: Array,
        roles: Array,
        canCreate: Boolean,
        canUpdate: Boolean,
        canDelete: Boolean,
    }
}
</script>
