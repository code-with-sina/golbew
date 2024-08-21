<script setup>
import { ref, watch } from 'vue'

const props = defineProps({
  modelValue: {
    type: Array,
    default: () => []
  }
})

const emit = defineEmits(['update:modelValue'])

const tags = ref([...props.modelValue])
const newTag = ref('')

watch(() => props.modelValue, (newValue) => {
  tags.value = [...newValue]
})

const addTag = () => {
  if (newTag.value.trim() !== '' && !tags.value.includes(newTag.value)) {
    tags.value.push(newTag.value)
    emit('update:modelValue', tags.value)
    newTag.value = ''
  }
}

const removeTag = (index) => {
  tags.value.splice(index, 1)
  emit('update:modelValue', tags.value)
}
</script>
<template>
    <div>
    <div class="tags-container">
      <span v-for="(tag, index) in tags" :key="index" class="tag">
        {{ tag }}
        <button type="button" @click="removeTag(index)">x</button>
      </span>
    </div>
    <input
      v-model="newTag"
      @keyup.ctrl.space="addTag"
      placeholder="Add a tag and press 'ctrl and spaceBar'"
      class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded h-54"
    />
  </div>
</template>
<style scoped>
    .tags-container {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 10px;
    }
    .tag {
        background-color: #e0e0e0;
        border-radius: 3px;
        padding: 5px;
        margin-right: 5px;
        margin-bottom: 5px;
    }
    .tag button {
        margin-left: 5px;
        border: none;
        background: none;
        cursor: pointer;
    }

</style>