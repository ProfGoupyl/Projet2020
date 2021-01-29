<template>
    <div>
        <section class="section_page_cours" >
            <aside class="aside_page_cours">
                <h2 v-for="cours in filterCours" :key="cours.id" class="navSecondaire_coursName">{{ cours.titre }}</h2>
                <nav class="navSecondaire">
                    <ul>
                        <li v-for="module in moduleList" :key="module.id">
                            <span v-if="cours[0].id === module.cours_id">
                                <a href="/cours" class="Modules" v-on:click.prevent="save(module.id), forceRerender()"> {{ module.titre }} </a>
                            </span>
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
                cours: null,
                componentKey: 0,
                url: document.querySelector('#envUrl').getAttribute('content'),
            }
        },
        created() {
            axios
                .get(`${this.url}/api/module?api_token=${this.userInfos.api_token}`)
                .then(response => (this.moduleList = _.orderBy(response.data, 'ordre', 'asc')))
                .catch(error => console.log(error))
        
            axios
                .get(`${this.url}/api/cours?api_token=${this.userInfos.api_token}`)
                .then(response => (this.coursNames = response.data))
                .catch(error => console.log(error))
        },
        updated() {
            // Afficher le premier module au chargement du composant
            let module = []
            for (let i = 0; i < this.moduleList.length; i++) {
                if(this.coursId === this.moduleList[i].cours_id) {
                    module.push(this.moduleList[i].id)
                }
            }
            this.moduleId = module[0]
            sessionStorage.setItem('moduleid', this.moduleId)
        },
        methods: {
            save(moduleid) {
                sessionStorage.setItem('moduleid', moduleid)
                this.moduleId = moduleid
            },
            forceRerender() {
                this.componentKey += 1
            },
        },
        computed: {
            filterCours() {
                return this.cours = this.coursNames.filter((names) => names.id === this.coursId)
            }
        },
    }
</script>