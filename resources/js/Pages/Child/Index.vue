<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link as InertiaLink, Head, useForm } from '@inertiajs/vue3';
import CardListItemCreateForm from '@/Pages/Child/CardListItemCreateForm.vue';
const props = defineProps({
  boards: Array,
});

</script>

<template>
  <Head title="Boards" />

  <AuthenticatedLayout>
    <div class="h-full px-4 py-6 overflow-y-auto bg-blue-50">
      <div class="px-3 mt-3">
        <CardListItemCreateForm
          :list="list"
          />
      </div>
</div>

  </AuthenticatedLayout>
</template>
