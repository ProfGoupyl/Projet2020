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
                    <tr v-for="value in cours" :key="value.id">
                        <td><a href="/cours" class="Cours" v-on:click="save(value.coursId)"> {{ value.titre }} </a></td>
                        <td><p id="cours"> {{ value.start_at }} </p></td>
                        <td><p id="cours"> {{ value.end_at }} </p></td>
                   </tr>
               </tbody>
           </table>
       </section>
    </div>
</template>

<script>
    const moment = require('moment')
    export default {
        name: 'user',
        props: ['userid'],
        data() {
            return {
                cours: [],
                userId: this.userid
            }
        },
        created() {
            axios
                .get(`http://localhost:8000/api/users/formations/${this.userId}?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9`)
                .then(response => {
                    let data = response.data
                    for(let i = 0; i < data.length; i++) {
                        if(moment().isBetween(moment(data[i].start_at), moment(data[i].end_at))) {
                            this.cours.push(data[i])
                        }
                    }
                })
                .catch(error => console.log(error))
        },
        methods: {
            save(coursid) {
                sessionStorage.setItem('coursid', coursid);
            },
        }
    }
</script>