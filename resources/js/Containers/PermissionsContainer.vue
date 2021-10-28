<template>
    <h2><slot /></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Type</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="permission in permissions" :key="permission.id">
                <th scope="row">{{permission.id}}</th>
                <td>{{permission.type}}</td>
                <td>{{permission.created_at}}</td>
                <td>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" v-if="update" type="button">Edit</button>
                        <button class="btn btn-warning" v-if="remove" type="button">Remove</button>
                    </div>                                                
                </td>
            </tr>
        </tbody>                                    
    </table>
</template>

<script>
export default {
    props: ['permissions', 'create', 'update', 'remove']
}
</script>
