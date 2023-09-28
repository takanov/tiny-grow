<script setup>

import {Menu, MenuButton, MenuItem, MenuItems} from '@headlessui/vue';
import CardListItemCreateForm from '@/Pages/Boards/CardListItemCreateForm.vue';
import {ref, watch} from "vue";
import CardListItem from "@/Pages/Boards/CardListItem.vue";
import Draggable from 'vuedraggable';
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
  list: Object,
  boardId: Number  // boardIdをpropsから受け取る
});
console.log(props.board);
const listRef = ref();
const cards = ref(props.list.cards);

watch(() => props.list.cards, (newCards) => cards.value = newCards);


function onCardCreated() {
  listRef.value.scrollTop = listRef.value.scrollHeight;
}

function onChange(e) {
  let item = e.added || e.moved;

  if (!item) return;

  let index = item.newIndex;
  let prevCard = cards.value[index - 1];
  let nextCard = cards.value[index + 1];
  let card = cards.value[index];

  let position = card.position;

  if (prevCard && nextCard) {
    position = (prevCard.position + nextCard.position) / 2;
  } else if (prevCard) {
    position = prevCard.position + (prevCard.position / 2);
  } else if (nextCard) {
    position = nextCard.position / 2;
  }

  Inertia.put(route('cards.move', {card: card.id}), {
    position: position,
    cardListId: props.list.id
  });
}

function deleteCard(cardListId) {
    const boardId = props.boardId;
    console.log(boardId);  // ここでboardIdをログ出力
    if (confirm('このカードを削除してもよろしいですか？')) {
        Inertia.delete(route('cardLists.destroy', {board: boardId, cardList: cardListId}));
    }
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
            <!-- <MenuItem v-slot="{active}">
              <a href="#" :class="{'bg-gray-100': active}" class="block px-4 py-2 text-sm text-gray-700">カードの作成</a>
            </MenuItem>-->
            <MenuItem v-slot="{active}">
              <a
              href="#"
              :class="{'bg-gray-100': active}"
              class="block px-4 py-2 text-sm text-red-600"
              @click.prevent="deleteCard(list.id)"
              >
              カードの削除</a>
            </MenuItem>
          </MenuItems>
        </transition>
      </Menu>
    </div>
    <div class="flex flex-col pb-3 overflow-hidden">
      <div ref="listRef" class="flex-1 px-3 overflow-y-auto">
        <Draggable
          v-model="cards"
          group="cards"
          item-key="id"
          class="space-y-3"
          tag="ul"
          drag-class="drag"
          ghost-class="ghost"
          @change="onChange"
          >
          <template #item="{element}">
            <CardListItem :card="element"/>
          </template>
        </Draggable>
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
