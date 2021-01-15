<template>
    <div>
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
                    <tr v-for="names in coursNames" :key="names.id">
                        <td><a href="/cours" class="Cours" v-on:click="save(names.coursId)"> {{ names.titre }} </a></td>
                        <td><p id="cours"> {{ names.start_at }} </p></td>
                        <td><p id="cours"> {{ names.end_at }} </p></td>
                   </tr>
               </tbody>
           </table>
       </section>
    </div>
</template>

<script>
    export default {
        name: 'user',
        props: ['userid'],
        data() {
            return {
                coursNames: [],
                userId: this.userid
            }
        },
        created() {
            axios
                .get(`http://localhost:8000/api/users/formations/${this.userId}?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9`)
                .then(response => (this.coursNames = response.data))
                .catch(error => console.log(error))
        },
        methods: {
            save(coursid) {
                sessionStorage.setItem('coursid', coursid);
                
            }
        }
    }
</script>