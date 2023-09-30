<script setup>
import { useForm } from "@inertiajs/vue3";
import {nextTick, ref, computed} from "vue";
import {store} from "@/store";

const props = defineProps({
  list: {
    type: Object,
    default: () => ({})
  }
});

const emit = defineEmits(['created']);
const inputTitleRef = ref();
const isShowingForm = computed(() => props.list.id === store.value.listCreatingCardId);
const form = useForm({
  title: '',
  card_list_id: props.list.id,
  board_id: props.list.board_id
});

async function showForm() {
  store.value.listCreatingCardId = props.list.id;
  await nextTick();
  inputTitleRef.value.focus();
}



let recognition; //音声認識のインスタンスを管理するために、外部の変数を作成
function startSpeechRecognition() {
  recognition = new window.webkitSpeechRecognition();//関数で、音声認識のインスタンスを初期化
  recognition.lang = 'ja-JP'; // 言語を日本語に設定
  recognition.interimResults = true;
  recognition.continuous = true;

  recognition.onresult = (event) => {
    for (let i = event.resultIndex; i < event.results.length; ++i) {
      if (event.results[i].isFinal) {
        form.title += event.results[i][0].transcript; // form.titleを更新
      }
    }
  };

  recognition.start();
}

function onSubmit() {
  form.post(route('cards.store'), {
    onSuccess: () => {
      form.reset();
      inputTitleRef.value.focus();
      emit('created');
    }
  });

}
// ボタンのテキストを管理するrefを作成します。
const buttonText = ref('きもちをはなす');

// ボタンがクリックされたときに呼ばれる関数です。
function handleButtonClick() {
  if (buttonText.value === 'きもちをはなす') {
    buttonText.value = 'きもちをとどける';
    startSpeechRecognition();
  } else {
    buttonText.value = 'きもちをはなす';
    if (recognition) {
      recognition.stop();
    }
    // フォームの送信
    onSubmit();
  }
}




</script>


<template>
  <form
    @keydown.esc="store.listCreatingCardId = null"
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
        @click="handleButtonClick"
        class="px-4 py-2 text-sm font-medium text-white rounded-md shadow-sm bg-rose-600 hover:bg-rose-500 focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 focus:outline-none">
        {{ buttonText }}
      </button>
      <button
        type="button"
        @click="store.listCreatingCardId = null"
        class="px-4 py-2 text-sm font-medium text-gray-700 rounded-md shadow-sm focus:ring-2 hover:bg-gray-100 focus:ring-offset-2 focus:ring-gray-500 focus:outline-none">Cancel</button>
    </div>
  </form>

  <button
    @click="showForm()"
    v-if="!isShowingForm"
    class="flex items-center w-full p-2 text-sm font-medium text-gray-600 rounded-md hover:text-black hover:bg-gray-300">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
      <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
    </svg>
    <span class="ml-1">Add card</span>
  </button>
</template>
