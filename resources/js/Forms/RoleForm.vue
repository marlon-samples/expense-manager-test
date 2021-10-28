import BreezeCheckbox from '@/Components/Checkbox.vue';
<template name="role-form">
    <div class="alert alert-success alert-dismissible fade show" role="alert" v-if="isAlert">
        <strong>New Role!</strong> You added a new role.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Role Name</label>
        <input type="text" class="form-control" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
    </div>
</template>

<script>

import BreezeCheckbox from '@/Components/Checkbox.vue';

export default {
    components:{
        BreezeCheckbox,
    },
    props: ['modelValue','isAlert'],

    emits: ['update:modelValue'],

    data(){
        return { 
            checked:{
                data: this.checked,
            }
        }
    },

    methods: {
        focus() {
            this.$refs.input.focus()
        }
    }

}
</script>
