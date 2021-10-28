<template name="role-form">
    <div class="mb-3">
        <label for="category" class="form-label">Category Name</label>
        <input type="text" class="form-control" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
    </div>
</template>

<script>

export default {
    props: ['modelValue'],

    emits: ['update:modelValue'],

    methods: {
        focus() {
            this.$refs.input.focus()
        }
    }

}
</script>
