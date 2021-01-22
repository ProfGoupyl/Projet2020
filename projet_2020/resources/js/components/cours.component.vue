<template>
    <div>
        <section class="section_page_cours" >
            <aside class="aside_page_cours">
                <nav class="navSecondaire">
                    <ul>
                        <li> 
                            <div v-for="names in coursNames" :key="names.id" class="navSecondaire_coursName">
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
            <article v-if="moduleId">
                <Session :key="componentKey" v-bind:user-infos="this.userInfos"></Session>
            </article>
        </section>
    </div>
</template>

<script>
    import Session from './session.component'
    export default {
        components: {
            Session
        },
        props: ['userInfos'],
        data() {
            return {
                moduleId: false,
                coursId: JSON.parse(sessionStorage.getItem('coursid')),
                moduleList: [],
                coursNames: [],
                componentKey: 0,
            }
        },
        created() {
            axios
                .get(`http://localhost:8000/api/module?api_token=${this.userInfos.api_token}`)
                .then(response => (this.moduleList = _.orderBy(response.data, 'ordre', 'asc')))
                .catch(error => console.log(error))
        
            axios
                .get(`http://localhost:8000/api/cours?api_token=${this.userInfos.api_token}`)
                .then(response => (this.coursNames = response.data))
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