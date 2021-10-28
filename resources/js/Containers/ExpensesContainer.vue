<template>
    <h2><slot /></h2>
    <br>
    <button class="btn btn-primary me-md-2" v-if="create" type="button">Create New</button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="expense in expenses" :key="expense.id">
                <th scope="row">{{expense.id}}</th>
                <td>{{expense.user.name}}</td>
                <td>{{expense.description}}</td>
                <td>{{expense.category.name}}</td>
                <td>{{expense.amount}}</td>
                <td>{{expense.created_at}}</td>
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
    props: ['expenses', 'create', 'update', 'remove']
}
</script>
