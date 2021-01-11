<template>
    <div>
       <header>
           <figure>
               <a href="/profile" class="UserName">
                    <img src="" alt="" class="UserImage" height="80px" width="80px">
               </a>
           </figure>
           <nav class="navPrincipale">
               <ul class="navigation">
                   <li>
                       <a href="/cours">Cours</a>
                   </li>
                   <li>
                       <a href="/faq">FAQ</a>
                   </li>
                   <li>
                       <a href="/logout">Logout</a>
                   </li>
               </ul>
           </nav>
       </header>
       <section>
           <h1>Liste des cours</h1>
           <table class="listecours">
               <thead>
                    <tr>
                        <th>Nom du cours</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                    </tr>
               </thead>
               <tbody>
                   <tr v-for="cours in filterCours" :key="cours.id">
                       <div v-for="names in coursNames" :key="names.id">
                           <div v-if="cours.cours_id === names.id">
                                <td><a href="/cours" class="Cours" v-on:click="save(cours.cours_id)"> {{ names.titre }} </a></td>
                                <td><p id="cours"> {{ cours.start_at }} </p></td>
                                <td><p id="cours"> {{ cours.end_at }} </p></td>
                           </div>
                       </div>
                   </tr>
               </tbody>
           </table>
       </section>
        <!--
        <h1>Page utilisateur</h1>
        <h2>Liste des cours</h2>
        <h3>User ID: {{ userId }}</h3>
        <ul>
            <li v-for="cours in filterCours" :key="cours.id">
                <div v-for="names in coursNames" :key="names.id">
                    <span v-if="cours.cours_id === names.id">
                        Cours ID: <a href='/cours'> {{ cours.cours_id }} </a> | 
                        Cours : {{ names.titre }} |
                        Début: {{ cours.start_at }} | 
                        Fin: {{ cours.end_at }} | 
                    </span>
                </div>
            </li>
        </ul>
        -->
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
                userId: 37
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
            axios
                .get(`http://localhost:8000/api/users/formations/${this.userId}?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9`)
                .then(response => console.log(response.data))
                .catch(error => console.log(error))
        },
        computed: {
            filterCours: function() {
                return this.coursList.filter(cours => cours.user_id === this.userId)
            }
        },
        methods: {
            save(coursid) {
                sessionStorage.setItem('coursid', coursid)
            }
        }
    }
</script>