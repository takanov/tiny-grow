<script setup>
import { useForm } from "@inertiajs/vue3";
import {nextTick, ref} from "vue";

const props = defineProps({
  board: {
    type: Object,
    default: () => ({})
  }
});

const isShowingForm = ref(false);
const inputNameRef = ref();
const formRef = ref();
const form = useForm({
  name:''
});

async function showForm() {
  isShowingForm.value = true;
  await nextTick();
  inputNameRef.value.focus();
}

function onSubmit() {
  form.post(route('cardLists.store', {board: props.board.id}),{
    onSuccess: () => {
      form.reset();
      inputNameRef.value.focus();
      formRef.value.scrollIntoView();
    }
  });

}

</script>


<template>
  <form
    ref="formRef"
    v-if = "isShowingForm"
    @submit.prevent="onSubmit"
    class="p-3 bg-gray-200 rounded-md"
    >
    <input
      v-model="form.name"
      ref="inputNameRef"
      class="block w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-400 focus:ring-blue-400"
      type="text"
      placeholder="Enter list name...."
    >
    <div class="mt-2 space-x-2">
      <button
        type="submit"
        class="px-4 py-2 text-sm font-medium text-white rounded-md shadow-sm bg-rose-600 hover:bg-rose-500 focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 focus:outline-none">Add list</button>
      <button
        type="button"
        @click="isShowingForm = false"
        class="px-4 py-2 text-sm font-medium text-gray-700 rounded-md shadow-sm focus:ring-2 hover:bg-gray-100 focus:ring-offset-2 focus:ring-gray-500 focus:outline-none">Cancel</button>
    </div>
  </form>


  <button
    v-if="!isShowingForm"
    @click="showForm()"
    class="flex items-center w-full p-2 text-sm font-medium text-white rounded-md bg-white/10 hover:bg-white/20">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 -ml-1">
      <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
    </svg>
    <span class="ml-1">Add another list</span>
  </button>
</template>
