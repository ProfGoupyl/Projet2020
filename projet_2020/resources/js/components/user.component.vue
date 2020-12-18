<template>
    <div>
        <h1>Page utilisateur</h1>
        <h2>Liste des cours</h2>
        <h3>User ID: {{ userId }}</h3>
        <ul>
            <li v-for="cours in coursList" :key="cours.id">
                Cours ID: <a href='/cours'> {{ cours.cours_id }} </a> |
                Débute le: {{ cours.start_at }} |
                Termine le: {{ cours.end_at }}
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
                userId: this.userid
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
            for(let i = 0; i < this.coursList.length; i++) {
                for(let x = 0; x < this.coursNames.length; i++) {
                    if(this.coursList[i].cours_id === this.coursNames[x].id) {
                        console.log(this.coursNames[x].titre)
                    }
                }
            }
        }
    }
</script>