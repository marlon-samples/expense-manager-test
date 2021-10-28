<template>
    <Head title="Settings" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Settings {{roles}}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-4">
                                <div class="list-group">
                                    <a href="#" @click="btnRoles" class="list-group-item list-group-item-action" v-bind:class="{ active: isRoles }" aria-current="true">
                                        Roles
                                    </a>
                                    <a href="#" @click="btnPermissions" class="list-group-item list-group-item-action" v-bind:class="{ active: isPermissions }">Permissions</a>
                                    <a href="#" @click="btnCategory" class="list-group-item list-group-item-action" v-bind:class="{ active: isCategory }">Category</a>
                                </div>
                                </div>
                                <div class="col-8">
                                    <BreezeRolesContainers v-if="isRoles" v-bind:roles="roleList" :create="canCreate" :update="canUpdate" :remove="canDelete">
                                        <BreezeButton :type="text" data-bs-toggle="modal" v-if="roles = admin" @click="btnNewRoles" data-bs-target="#staticBackdrop"> + New Roles</BreezeButton>
                                    </BreezeRolesContainers>
                                    <BreezePermissionsContainers v-if="isPermissions" v-bind:permissions="permissionList" :create="canCreate" :update="canUpdate" :remove="canDelete">
                                        <BreezeButton :type="text" data-bs-toggle="modal" v-if="roles = admin" data-bs-target="#staticBackdrop"> + New Permission</BreezeButton>
                                    </BreezePermissionsContainers>
                                    <BreezeCategoryContainers v-if="isCategory" v-bind:categories="categoryList" :create="canCreate" :update="canUpdate" :remove="canDelete">
                                        <BreezeButton :type="text" data-bs-toggle="modal" v-if="roles = admin" data-bs-target="#staticBackdrop"> + New Category</BreezeButton>
                                    </BreezeCategoryContainers>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">
                                            <p v-if="isRoles">New Role</p>
                                            <p v-if="isPermissions">New Permissions</p>
                                            <p v-if="isCategory">New Category</p>
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <BreezeRoleForm v-if="isRoles" v-model="role" :isAlert="isAlertR" v-bind:permissions="permissionList"></BreezeRoleForm>
                                        <div v-if="isRoles">
                                            <div class="form-check" v-for="permission in permissionList" :key="permission.id">
                                                <input :id="permission.slug" :value="permission.slug" name="permission" type="checkbox" v-model="checkedPermissions" />
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    {{permission.type}}
                                                </label>
                                            </div>
                                        </div>
                                        <BreezePermissionForm v-if="isPermissions" v-model="permission" :isAlert="isAlertP"></BreezePermissionForm>
                                        <BreezeCategoryForm v-if="isCategory" v-model="category"></BreezeCategoryForm>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" @click="btnClose" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" @click="btnSubmit(isClass)" class="btn btn-primary">Submit</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BreezeRolesContainers from '@/Containers/RolesContainer.vue';
import BreezePermissionsContainers from '@/Containers/PermissionsContainer.vue';
import BreezeCategoryContainers from '@/Containers/CategoryContainer.vue';
import BreezeRoleForm from '@/Forms/RoleForm.vue';
import BreezePermissionForm from '@/Forms/PermissionForm.vue';
import BreezeCategoryForm from '@/Forms/CategoryForm.vue';
import { Head } from '@inertiajs/inertia-vue3';
import BreezeButton from '@/Components/Button.vue';
import { Inertia } from '@inertiajs/inertia';
import BreezeCheckbox from '@/Components/Checkbox.vue';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeRolesContainers,
        BreezePermissionsContainers,
        BreezeCategoryContainers,
        BreezeButton,
        BreezeRoleForm,
        BreezePermissionForm,
        BreezeCategoryForm,
        BreezeCheckbox,
        Head,
    },
    props: {
        isRoles: Boolean,
        isPermissions: Boolean,
        isCategory: Boolean,
        isClass: String,
        isAlertR: Boolean,
        isAlertP: Boolean,
        isAlertC: Boolean,
        permissionList: Array,
        categoryList: Array, 
        toggle: Array,
        roleList: Array,
        roles: String,
        canCreate: Boolean,
        canUpdate: Boolean,
        canDelete: Boolean,

    },
    data() {
        return {
            isRoles: true,
            isPermissions: false,
            isAlertR: false,
            isAlertP: false,
            isAlertC: false,
            isCategory: false,
            isClass: 'isRoles',
            role: null, 
            permission: null, 
            category: null, 
            roleInput: null,
            permissionList: [],
            categoryList: [],
            checkedPermissions: [],
            roleList: [],
        }
    },
    methods: {
        btnRoles: function() {
            this.isRoles = true;
            this.isPermissions = false;
            this.isCategory = false;
            this.isClass = 'isRoles';
            axios.get('/roles').then((response)=>{
                console.log(response.data)
                this.roleList = response.data;
            }).catch((error)=>{
                console.log(error.response.data)
            });
        },
        btnPermissions: function() {
            this.isAlertP = false;
            this.isRoles = false;
            this.isPermissions = true;
            this.isCategory = false;
            this.isClass = 'isPermissions';
            axios.get('/permissions').then((response)=>{
                console.log(response.data)
                this.permissionList = response.data;
            }).catch((error)=>{
                console.log(error.response.data)
            });
        },
        btnCategory: function() {
            this.isRoles = false;
            this.isPermissions = false;
            this.isCategory = true;
            this.isClass = 'isCategory';
            axios.get('/category').then((response)=>{
                console.log(response.data)
                this.categoryList = response.data;
            }).catch((error)=>{
                console.log(error.response.data)
            });            
        },
        btnSubmit: function(event) {
            if(event == 'isRoles') {
                this.isAlertR = true;                
                axios.post('/role/new',
                {
                    name: this.role,
                    permissions: this.checkedPermissions,
                }
                ).then((response)=>{
                    console.log(response.data)
                }).catch((error)=>{
                    console.log(error.response.data)
                });
            } else if(event == 'isPermissions') {
                this.isAlertP = true;                
                axios.post('/permission/new',
                {
                    type: this.permission
                }
                ).then((response)=>{
                    console.log(response)
                }).catch((error)=>{
                    console.log(error.response.data)
                });
            } else {
                this.isAlertC = true;                
                axios.post('/category/new',
                {
                    name: this.category
                }
                ).then((response)=>{
                    console.log(response)
                }).catch((error)=>{
                    console.log(error.response.data)
                });
            }
        },
        btnClose: function() {
            this.isAlertP = false;
        },
        btnNewRoles: function() {
            axios.get('/permissions').then((response)=>{
                console.log(response.data)
                this.permissionList = response.data;
            }).catch((error)=>{
                console.log(error.response.data)
            });
        }
    }
}
</script>
