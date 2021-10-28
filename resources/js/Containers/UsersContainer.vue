<template>
    <h2><slot /></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Date Created</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in users" :key="user.id">
                <th scope="row">{{user.id}}</th>
                <td>{{user.name}}</td>
                <td>{{user.created_at}}</td>
                <td>{{user.email}}                                  
                </td>
            </tr>
        </tbody>                                    
    </table>
</template>

<script>
export default {
    props: ['users', 'create', 'update', 'remove']

}
</script>
