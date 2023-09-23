<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link as InertiaLink, Head } from '@inertiajs/vue3';
const props = defineProps({
  boards: Array,
});

</script>

<template>
  <Head title="Boards" />

  <AuthenticatedLayout>
    <div class="h-full px-4 py-6 bg-gray-50">
      <div class="max-w-5xl mx-auto">
        <div class="flex items-center px-3 mb-4">
          <h3 class="font-black text-gray-700">My boards</h3>
          <button class="inline-flex items-center px-3 py-2 ml-4 font-medium bg-gray-100 rounded hover:bg-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 -ml-1">
              <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
            </svg>
            <span class="ml-1">Create board</span>
          </button>
        </div>

        <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
          <li
            v-for="board in boards"
            :key="board.id"
            class="relative bg-blue-600 rounded-md hover:bg-blue-700 min-h-[7rem]">
            <InertiaLink :href="route('boards.show', {board: board.id})"
                         class="absolute inset-0 p-3 text-lg font-bold text-white">
              {{ board.name }}
            </InertiaLink>
          </li>
        </ul>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
