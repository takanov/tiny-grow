<script setup>
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref, watch } from 'vue';

const props = defineProps({
  board: Object
});

const form = useForm({
  name: props.board.name || "Default Board Name"
});

const heading = ref();
const input = ref();
const isEditing = ref(false);

function resize() {
  input.value.style.width = `${heading.value.offsetWidth + 2}px`;

}

watch(() => form.name, async () => {
  await nextTick();
  resize();
});

async function edit() {
  isEditing.value = true;
  await nextTick();
  input.value.select();
  resize();
}

function onSubmit() {
  isEditing.value = false;
  form.put(route('boards.update', {board: props.board.id}), {
    onError: () => form.reset()
  });
}

</script>

<template>
  <div class="flex flex-col items-start max-w-full ">
    <h1
      @click="edit()"
      :class="[isEditing ? 'absolute -left-[1000rem]': '']"
      ref="heading"
      class="px-3 text-2xl font-bold text-white hover:bg-white/20 py-1.5 rounded-md cursor-pointer border border-transparent whitespace-pre-wrap break-all">
      {{ form.name ? form.name: '' }}
    </h1>
    <form
      v-show="isEditing"
      @submit.prevent="onSubmit"
      @focusout="onSubmit"
      class="w-full"
    >
      <input
        ref="input"
        v-model="form.name"
        type="text"
        placeholder="Board name"
        class="hover:bg-white/20 whitespace-pre-wrap max-w-full break-all border border-transparent rounded-md cursor-pointer px-3 py-1.5 text-2xl text-black font-bold"
      >
    </form>
  </div>
</template>
