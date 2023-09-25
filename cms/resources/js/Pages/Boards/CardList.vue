<script setup>

import {Menu, MenuButton, MenuItem, MenuItems} from '@headlessui/vue';
import CardListItemCreateForm from '@/Pages/Boards/CardListItemCreateForm.vue';
import {ref} from "vue";
import CardListItem from "@/Pages/Boards/CardListItem.vue";

const listRef = ref();
const props = defineProps({
  list: Object
});

function onCardCreated() {
  listRef.value.scrollTop = listRef.value.scrollHeight;
}

</script>


<template>
  <div>
    <div class="flex items-center justify-between px-3 py-2">
      <h3 class="text-sm font-semibold text-gray-700">
        {{ list.name }}
      </h3>
      <!--ドロップダウンメニュー -->
      <Menu as="div" class="relative z-10">
        <MenuButton class="grid w-8 h-8 rounded-md hover:bg-gray-300 place-content-center">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
            <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm6 0a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm6 0a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" clip-rule="evenodd" />
          </svg>
        </MenuButton>

        <transition
          enter-active-class="transition duration-100 ease-out transform"
          enter-from-class="scale-90 opacity-0"
          enter-to-class="scale-100 opacity-100"
          leave-active-class="transition duration-100 ease-in transform"
          leave-from-class="scale-100 opacity-100"
          leave-to-class="scale-90 opacity-0"
          >
          <MenuItems class="absolute left-0 w-40 mt-2 overflow-hidden origin-top-left bg-white border rounded-md shadow-lg focus:outline-none">
            <MenuItem v-slot="{active}">
              <a href="#" :class="{'bg-gray-100': active}" class="block px-4 py-2 text-sm text-gray-700">カードの作成</a>
            </MenuItem>
            <MenuItem v-slot="{active}">
              <a href="#" :class="{'bg-gray-100': active}" class="block px-4 py-2 text-sm text-red-600">カードの削除</a>
            </MenuItem>
          </MenuItems>
        </transition>
      </Menu>
    </div>
    <div class="flex flex-col pb-3 overflow-hidden">
      <div ref="listRef" class="flex-1 px-3 overflow-y-auto">
        <ul class="space-y-3">
          <CardListItem
            v-for="card in list.cards"
            :key="card.id"
            :card="card"
            class="relative p-3 bg-white border-b border-gray-300 rounded-md shadow group hover:bg-gray-50"/>
        </ul>
      </div>

      <div class="px-3 mt-3">
        <CardListItemCreateForm
          :list="list"
          @created="onCardCreated()"
          />
      </div>
    </div>
  </div>
</template>
