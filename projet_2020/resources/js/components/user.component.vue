<template>
    <div>
        <h1>Page utilisateur</h1>
        <h2>Liste des cours</h2>
        <h3>User ID: {{ userId }}</h3>
        <ul>
            <li v-for="cours in filterCours" :key="cours.id">
                <div v-for="names in coursNames" :key="names.id">
                
                <span v-show="cours.cours_id === names.id"> Cours ID: <a href='/cours'> {{ cours.cours_id }} </a> |
                Débute le: {{ cours.start_at }} | 
                Termine le: {{ cours.end_at }} | Cours : {{ names.titre }} </span>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: 'user',
        props: ['userid'],
        data() {
            return {
                coursList: [],
                coursNames: [],
                userId: 44
            }
        },
        created() {
            axios
                .get('http://localhost:8000/api/users_cours?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9')
                .then(response => (this.coursList = response.data))
                .catch(error => console.log(error))
            axios
                .get('http://localhost:8000/api/cours?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9')
                .then(response => (this.coursNames = response.data))
                .catch(error => console.log(error))
        },
        computed: {
            filterCours: function() {
                return this.coursList.filter(cours => cours.user_id === this.userId)
            }
        }
    }
</script>