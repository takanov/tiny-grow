<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link as InertiaLink, Head, useForm } from '@inertiajs/vue3';
import { Popover, PopoverButton, PopoverOverlay, PopoverPanel} from '@headlessui/vue';
const props = defineProps({
  boards: Array,
});

const form = useForm({
  name: '',
});

function onSubmit(closePopover) {
  form.post(route('boards.store'), {
    onSuccess: () => {
      form.reset();
      closePopover();
    },
  });
}

</script>

<template>
  <Head title="Boards" />

  <AuthenticatedLayout>
    <div class="h-full px-4 py-6 overflow-y-auto bg-blue-50">
      <div class="max-w-5xl mx-auto">
        <div class="flex items-center px-3 mb-4">
          <h3 class="font-black text-gray-700">子供の気持ちボード</h3>

          <Popover
            v-slot="{ open }"
            class="relative">
            <PopoverButton
              :class="open ? 'bg-blue-50 text-blue-600' : ''"
              class="inline-flex items-center px-3 py-2 ml-4 font-medium text-gray-800 bg-gray-200 rounded hover:bg-gray-300"
            >
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 -ml-1">
                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
              </svg>
              <span class="ml-1">気持ちのボード作成</span>
            </PopoverButton>
            <PopoverOverlay class="fixed inset-0 z-10 bg-black opacity-30"/>

            <transition
              enter-active-class="transition duration-200 ease-out"
              enter-from-class="translate-y-1 opacity-0"
              enter-to-class="translate-y-0 opacity-100"
              leave-active-class="transition duration-150 ease-in"
              leave-from-class="translate-y-0 opacity-100"
              leave-to-class="translate-y-1 opacity-0"
            >
              <PopoverPanel
                :focus="true"
                v-slot="{close}"
                class="absolute z-10 px-4 mt-3 -translate-x-1/2 w-72 left-1/2 sm:px-0"
              >
                <div
                  class="p-3 overflow-hidden bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5"
                >
                  <form @submit.prevent="onSubmit(close)">
                    <label
                      class="block mb-1 text-sm font-medium text-gray-600"
                      for="name">子供の気持ちボード名:</label>
                    <input
                      id="name"
                      v-model="form.name"
                      class="block w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-400 focus:ring-blue-400"
                      name="name"
                      placeholder="子供の気持ちボード名"
                      type="text">
                    <p
                      v-if="form.errors.name"
                      class="text-sm text-red-600">{{ form.errors.name }}</p>

                    <div class="flex justify-end mt-2">
                      <button class="px-4 py-2 text-sm font-bold text-white bg-blue-600 rounded-md shadow-sm hover:bg-blue-500 focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 focus:outline-none">ボードを作成</button>
                    </div>
                  </form>
                </div>
              </PopoverPanel>
            </transition>
          </Popover>




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
