<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() =>
    props.active
        ? 'px-3 py-2 text-sm font-medium rounded-md hover:bg-gray-100 bg-gray-100'
        : 'px-3 py-2 text-sm font-medium rounded-md hover:bg-gray-100'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
