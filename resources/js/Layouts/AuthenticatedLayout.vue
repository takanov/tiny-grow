<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';
import {Menu, MenuButton, MenuItem, MenuItems} from '@headlessui/vue';

</script>

<template>
  <div>
    <div class="flex flex-col h-screen">
      <nav class="flex justify-between px-4 py-3 bg-white border-b shrink-0">
        <a class="text-2xl font-black tracking-tight" :href="route('boards')">Tinygrow</a>
        <div class="flex items-center">
          <NavLink :href="route('child')">お子様用</NavLink>
          <NavLink :href="route('boards')">保護者用</NavLink>
          <Menu as="div" class="relative z-10 ml-3">
            <MenuButton class="rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue">
              <img class="inline rounded-full h-9 w-9" :src="$page.props.auth.user.avatar_url" :alt="$page.props.auth.user.name">
            </MenuButton>

            <transition
              enter-active-class="transition duration-100 ease-out transform"
              enter-from-class="scale-90 opacity-0"
              enter-to-class="scale-100 opacity-100"
              leave-active-class="transition duration-100 ease-in transform"
              leave-from-class="scale-100 opacity-100"
              leave-to-class="scale-90 opacity-0"
              >
              <MenuItems class="absolute right-0 w-48 mt-2 overflow-hidden origin-top-right bg-white border rounded-md shadow-lg focus:outline-none">
                <!--
                <MenuItem v-slot="{active}">
                  <a href="#" :class="{'bg-gray-100': active}" class="block px-4 py-2 text-sm text-gray-700">My Profile</a>
                </MenuItem>
                -->
                <MenuItem v-slot="{active}">
                  <Link :class="{'bg-gray-100': active}"
                    :href="route('logout')" method="post" as="button"
                    class="block w-full px-4 py-2 text-sm text-left text-gray-700 ">Log out
                  </Link>
                </MenuItem>
              </MenuItems>
            </transition>
          </Menu>
        </div>
      </nav>
      <!-- Page Heading -->
      <header class="bg-white shadow dark:bg-gray-800" v-if="$slots.header">
          <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
              <slot name="header" />
          </div>
      </header>

      <!-- Page Content -->
      <main class="flex-1 overflow-hidden">
          <slot />
      </main>
    </div>
  </div>
</template>
