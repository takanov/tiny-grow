<script setup>
//import { DotsHorizontalIcon } from '@vue-hero-icons/solid'
import {Menu, MenuButton, MenuItem, MenuItems} from '@headlessui/vue';
import AuthenticatedLayouts from '@/Layouts/AuthenticatedLayout.vue';
import BoardNameForm from '@/Pages/Boards/BoardNameForm.vue';
import CardList from "@/Pages/Boards/CardList.vue";
//import { formToJSON } from 'axios';
import { nextTick } from 'vue';
import CardListCreateForm from '@/Pages/Boards/CardListCreateForm.vue';

const props = defineProps({
  board: {
    type: Object,
    default: () => ({})
  }
});
</script>

<template>
  <AuthenticatedLayouts>
    <div class="flex flex-col h-full bg-blue-600">
      <div class="flex items-center justify-between p-4 fle shrink-0">
        <BoardNameForm :board="board"/>
        <div>
          <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white rounded-md bg-white/10 hover:bg-white/20">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
              <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm6 0a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm6 0a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" clip-rule="evenodd" />
            </svg>
            <span class="ml-1">Settings</span>
          </button>
        </div>
      </div>
      <div class="flex-1 overflow-x-auto">
        <div class="inline-flex items-start h-full px-4 pb-4 space-x-4">
          <CardList
            v-for="list in board.lists"
            :key="list.id"
            :list="list"
            class="flex flex-col max-h-full bg-gray-200 rounded-md w-72"
          >
          </CardList>

          <div class="w-72">
           <CardListCreateForm :board="board"/>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayouts>
</template>
