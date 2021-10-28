<template>
    <h2><slot /></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="role in roles" :key="role.id">
                <th scope="row">{{role.id}}</th>
                <td>{{role.name}}</td>
                <td>{{role.created_at}}</td>
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
    props: ['roles', 'create', 'update', 'remove']
}
</script>
