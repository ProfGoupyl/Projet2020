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
        props: ['userInfos'],
        data() {
            return {
                url: document.querySelector('#envUrl').getAttribute('content'),
                cours: [],
            }
        },
        created() {
            axios
                .get(`${this.url}/api/users/formations/${this.userInfos.id}?api_token=${this.userInfos.api_token}`)
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