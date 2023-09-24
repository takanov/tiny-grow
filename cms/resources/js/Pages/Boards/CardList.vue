<script setup>

import {Menu, MenuButton, MenuItem, MenuItems} from '@headlessui/vue';

  const props = defineProps({
    list: Object
  });


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
      <div class="flex-1 px-3 overflow-y-auto">
        <ul class="space-y-3">
          <li
            v-for="card in list.cards"
            :key="card.id"
            class="relative p-3 bg-white border-b border-gray-300 rounded-md shadow group hover:bg-gray-50">
            <a href="#" class="text-sm">{{ card.title }}</a>
            <button class="absolute hidden w-8 h-8 m-1 text-gray-600 rounded-md top-1 right-1 bg-gray-50 group-hover:grid place-content-center hover:text-black hover:bg-gray-200">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
              </svg>
            </button>
          </li>
          <li class="relative p-3 bg-white border-b border-gray-300 rounded-md shadow group hover:bg-gray-50">
            <a href="#" class="items-center text-sm">card item</a>
            <button class="absolute hidden w-8 h-8 m-1 text-gray-600 rounded-md top-1 right-1 bg-gray-50 group-hover:grid place-content-center hover:text-black hover:bg-gray-200">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
              </svg>
            </button>
          </li>
        </ul>
      </div>

      <div class="px-3 mt-3">
        <button class="flex items-center w-full p-2 text-sm font-medium text-gray-600 rounded-md hover:text-black hover:bg-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
            <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
          </svg>
          <span class="ml-1">Add card</span>
        </button>
      </div>
    </div>
  </div>
</template>
