<template>
    <div>
        <div v-for="modules in filterModules" :key="modules.id">
            <div>
                <h2> {{ modules.titre }} </h2>
                <p> {{ modules.description }} </p>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['userid'],
        data() {
            return {
                userId: this.userid,
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
        beforeDestroy() {
            this.moduleId = null
            sessionStorage.removeItem('moduleid')
        }
    }
</script>