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
            <tr v-for="category in categories" :key="category.id">
                <th scope="row">{{category.id}}</th>
                <td>{{category.name}}</td>
                <td>{{category.created_at}}</td>
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
    props: ['categories', 'create', 'update', 'remove']
}
</script>
