<template>
    <div class="mb-4">
      <label v-if="label" :for="id" class="block text-sm font-medium text-gray-700">{{ label }}</label>
      <input
        :type="type"
        :id="id"
        :name="name"
        :value="modelValue"
        :placeholder="placeholder"
        :class="['mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md', inputClass]"
        :readonly="readonly"
        @input="$emit('update:modelValue', $event.target.value)"
        v-bind="attributes"
      />
      <p v-if="error" class="mt-2 text-sm text-red-600">{{ error }}</p>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      modelValue: [String, Number],
      type: {
        type: String,
        default: 'text'
      },
      id: String,
      name: String,
      label: String,
      placeholder: String,
      inputClass: String,
      error: String,
      attributes: Object,
      readonly: {
        type: Boolean,
        default: false
      }
    },
    emits: ['update:modelValue']
  }
  </script>
  
  <style scoped>
  /* Tidak perlu styling tambahan karena semua menggunakan Tailwind */
  </style>
  