<template>
    <div>
        <h1>Page utilisateur</h1>
        <h2>Liste des cours</h2>
        <ol>
            <li v-for="cours in coursList" :key="cours.titre">
                {{ cours.titre }}
            </li>
        </ol>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                userId: null,
                url: null,
                coursList: []
            }
        },
        mounted() {
            axios
                .get('http://localhost:8000/api/cours?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9')
                .then(response => (this.coursList = response.data))
                .catch(error => console.log(error))
        }
    }
</script>