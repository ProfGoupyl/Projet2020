<template>
    <div>
        <div v-for="modules in filterModules" :key="modules.id">
            <div>
                <h2> {{ modules.titre }} </h2>
                <p> {{ modules.description }} </p>
            </div>
        </div>
        <article>
            <Faq></Faq>
        </article>
    </div>
</template>
<script>
    import Faq from './faq.component'
    export default {
        components: {
            Faq
        },
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
                .get('http://localhost:8000/api/module?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9')
                .then(response => (this.moduleList = response.data))
                .catch(error => console.log(error))
        },
        // permet de clear l'id du module
        updated() {
            sessionStorage.removeItem('moduleid');
        }
    }
</script>