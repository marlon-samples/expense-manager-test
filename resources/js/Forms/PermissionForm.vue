<template name="role-form">
    <div class="alert alert-success alert-dismissible fade show" role="alert" v-if="isAlert">
        <strong>New Permission!</strong> You added new permission.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="mb-3">
        <label for="permission" class="form-label">Permission Type</label>
        <input type="text" class="form-control" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
    </div>
</template>

<script>

export default {
    props: ['modelValue', 'isAlert'],

    emits: ['update:modelValue'],

    methods: {
        focus() {
            this.$refs.input.focus()
        }
    }

}
</script>
