<template>
    <div>
        <h1>Page utilisateur</h1>
        <h2>Liste des cours</h2>
        <p>Ici on ne récupère que l'id des cours, malheureusement pour le moment</p>
        <ol>
            <li v-for="cours in coursList" :key="cours.id">
                Cours ID: <a href='/cours'> {{ cours.cours_id }} </a> |
                Débute le: {{ cours.start_at }} |
                Termine le: {{ cours.end_at }}
            </li>
        </ol>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                coursList: [],
            }
        },
        beforeMount() {
            axios
                .get('http://localhost:8000/api/users_cours?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9')
                .then(response => (this.coursList = response.data))
                .catch(error => console.log(error))
        }
    }
</script>