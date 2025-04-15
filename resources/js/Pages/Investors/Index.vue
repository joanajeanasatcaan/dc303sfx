<script setup>
import { Head } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
import PageLayout from "../PageLayout.vue";

defineProps({
    investors: Object,
});
</script>

<template>
    <Head title="Investors" />

    <PageLayout>
        <div
            class="bg-green-100 border border-green-300 p-8 rounded-lg w-[600px] mx-auto mt-12"
        >
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-bold">Investors</h1>
                <Link
                    :href="route('investors.create')"
                    class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700"
                >
                    Add Investor
                </Link>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <div
                    v-for="investor in investors.data"
                    :key="investor.id"
                    class="p-4 bg-white rounded-lg shadow-md"
                >
                    <h2 class="text-lg font-semibold">
                        {{ investor.last_name }}, {{ investor.first_name }}
                    </h2>
                    <p class="text-gray-600">Phone: {{ investor.phone }}</p>
                    <p class="text-gray-600">Address: {{ investor.address }}</p>
                    <p class="text-gray-600">Type: {{ investor.investment_type }}</p>
                </div>
            </div>

            <div class="mt-6">
                <div
                    v-if="investors.links"
                    class="flex flex-wrap justify-center gap-2"
                >
                    <template v-for="link in investors.links" :key="link.label">
                        <component
                            :is="link.url ? Link : 'span'"
                            :href="link.url ?? undefined"
                            v-html="link.label"
                            class="px-3 py-1 text-sm border rounded"
                            :class="{
                                'bg-blue-600 text-white': link.active,
                                'text-gray-500 cursor-default': !link.url,
                                'hover:bg-blue-100': link.url && !link.active,
                            }"
                        />
                    </template>
                </div>
            </div>
        </div>
    </PageLayout>
</template>
