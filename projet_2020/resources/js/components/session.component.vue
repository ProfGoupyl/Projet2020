<template>
    <div>
        <div v-for="modules in filterModules" :key="modules.id">
            <div>
                <h2> {{ modules.titre }} </h2>
                <p> {{ modules.description }} </p>
                <p> ex de video : <iframe width="560" height="315" src="https://www.youtube.com/embed/nhBVL41-_Cw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  </p>
                 <!-- {{ modules.url_video }} -->
            </div>
        </div>
        <article>
            <Faq v-bind:user-infos="this.userInfos"></Faq>
        </article>
        <article>
            <Comment v-bind:user-infos="this.userInfos"></Comment>
        </article>
    </div>
</template>
<script>
    import Faq from './faq.component'
    import Comment from './commentaire.component'
    export default {
        components: {
            Faq,
            Comment
        },
        props: ['userInfos'],
        data() {
            return {
                moduleList: [],
                moduleId: JSON.parse(sessionStorage.getItem('moduleid')),
            }
        },
        computed: {
            filterModules: function() {
                return this.moduleList.filter(modules => modules.id === this.moduleId)
            }
        },
        created() {
            axios
                .get(`http://localhost:8000/api/module?api_token=${this.userInfos.api_token}`)
                .then(response => (this.moduleList = response.data))
                .catch(error => console.log(error))
        },
        // permet de clear l'id du module
        updated() {
            sessionStorage.removeItem('moduleid');
        }
    }
</script>