<template>
    <div>
        <section>
            <aside>
                <nav class="navSecondaire">
                    <ul>
                        <li> 
                            <div v-for="names in coursNames" :key="names.id">
                                <span v-show="coursId === names.id">
                                    Cours : {{ names.titre }}
                                    <ul v-for="module in moduleList" :key="module.titre">
                                        <li v-show="names.id === module.cours_id">
                                            <a href="/cours" class="Modules" v-on:click.prevent="save(module.id), forceRerender()"> {{ module.titre }} </a>
                                        </li>
                                    </ul>
                                </span>
                            </div>
                        </li>
                    </ul>
                </nav> 
            </aside>
            <div>
                <article v-if="moduleId">
                    <Session :key="componentKey"></Session>
                </article>
            </div>
        </section>
    </div>
</template>

<script>
    import Session from './session.component'
    export default {
        components: {
            Session
        },
        props: ['userid'],
        data() {
            return {
                userId: 99,
                moduleId: false,
                coursId: JSON.parse(sessionStorage.getItem('coursid')),
                moduleList: [],
                coursList: [],
                coursNames: [],
                componentKey: 0,
            }
        },
        created() {
            axios
                .get('http://localhost:8000/api/module?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9')
                .then(response => (this.moduleList = _.orderBy(response.data, 'ordre', 'asc')))
                .catch(error => console.log(error))
        
            axios
                .get('http://localhost:8000/api/cours?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9')
                .then(response => (this.coursNames = response.data))
                .catch(error => console.log(error))
            axios
                .get('http://localhost:8000/api/users_cours?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9')
                .then(response => (this.coursList = response.data))
                .catch(error => console.log(error))
        },
        methods: {
            save(moduleid) {
                sessionStorage.setItem('moduleid', moduleid)
                this.moduleId = moduleid
            },
            forceRerender() {
                this.componentKey += 1
            },
        }
    }
</script>