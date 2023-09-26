<script setup>
import { useForm } from "@inertiajs/vue3";
import {nextTick, ref, computed} from "vue";
import {store} from "@/store";


const props = defineProps({
  card: Object
});

const inputTitleRef = ref();
const isShowingForm = computed(() => props.card.id === store.value.editingCardId);
const form = useForm({
  title: props.card.title,
});

async function showForm() {
  store.value.editingCardId = props.card.id;
  await nextTick();
  inputTitleRef.value.focus();
}

function onSubmit() {
  form.put(route('cards.update', {card: props.card.id}), {
    onSuccess: () => store.value.editingCardId = null
  });

}


</script>


<template>
  <li>
    <div class="relative p-2 bg-white border-b border-gray-300 rounded-md shadow group hover:bg-gray-50">
      <form
      @keydown.esc="isShowingForm = null"
      v-if = "isShowingForm"
      @submit.prevent="onSubmit"
      >
      <textarea
        ref="inputTitleRef"
        v-model="form.title"
        rows="3"
        @keydown.enter.prevent="onSubmit()"
        class="block w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-400 focus:ring-blue-400"
        placeholder="Enter card title..."
      ></textarea>


      <div class="mt-2 space-x-2">
        <button
          type="submit"
          class="px-4 py-2 text-sm font-medium text-white rounded-md shadow-sm bg-rose-600 hover:bg-rose-500 focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 focus:outline-none">Save card</button>
        <button
          type="button"
          @click="store.editingCardId = null"
          class="px-4 py-2 text-sm font-medium text-gray-700 rounded-md shadow-sm focus:ring-2 hover:bg-gray-100 focus:ring-offset-2 focus:ring-gray-500 focus:outline-none">Cancel</button>
      </div>
      </form>

      <template v-if="!isShowingForm">
          <a href="#" class="text-sm">{{ card.title }}</a>
          <button
            @click="showForm()"

            class="absolute hidden w-8 h-8 text-gray-600 rounded-md top-1 right-1 bg-gray-50 group-hover:grid place-content-center hover:text-black hover:bg-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
              <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
            </svg>
          </button>
      </template>
    </div>
  </li>
</template>

<style scoped>
  .drag > div {
    transform: rotate(5deg);
  }

  .ghost {
    background: lightgray;
    border-radius: 6px;
  }
  .ghost > div {
    visibility: hidden;
  }
</style>
