<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: String,
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        ref="input"
        class="focus:border-rose-500 shadow-sm"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        style="background-color:#F5F5F5;border-color:rgba(255,255,255,0)"
    >
</template>
