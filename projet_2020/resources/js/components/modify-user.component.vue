<template>
    <div>
        <h1>Modifier le profil </h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Pseudo</th>
            </tr>
            
            <tbody v-for="(users, info) in userList" v-bind:id="users.id" :key="info">
            
            <td>
                {{ users.id }}
            </td>
            <td>
                {{ users.nom }}
            </td>
            <td>
                {{ users.prenom }}
            </td>
            <td>
                {{ users.email }}
            </td>
            <td>
                {{ users.pseudo }}
            </td>
        
        </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                id: 1,
                url: null,
                userList: []
            }
        },
        mounted() {
            axios
                .get('http://localhost:8000/api/users?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9')
                .then(response => (this.userList = response.data))
                .catch(error => console.log(error))
        }
    }
</script>