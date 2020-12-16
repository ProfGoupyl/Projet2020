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
        name: 'user',
        props: ['message'],
        data() {
            return {
                coursList: [],
                coursNames: []
            }
        },
        beforeMount() {
            axios
                .get('http://localhost:8000/api/users_cours?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9')
                .then(response => (this.coursList = response.data))
                .catch(error => console.log(error))
            axios
                .get('http://localhost:8000/api/cours?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9')
                .then(response => (this.coursNames = response.data))
                .catch(error => console.log(error))
        },
        mounted() {
            for(let i = 0; i < this.coursList; i++) {
                if(this.coursList[i].cours_id === this.coursNames[i].id) {
                    console.log(this.coursNames.titre)
                }
            }
        }
    }
</script>