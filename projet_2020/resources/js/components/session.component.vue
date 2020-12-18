<template>
    <div>
        <h1>coucou</h1>
        <h2>Liste des sessions</h2>
    
            <ol>
            <li v-for="module in moduleList" :key="module.titre">
               {{ module.titre }}
            </li>
        </ol>
        
    </div>
</template>
<script>
    export default {
        props: ['userid'],
        data() {
            return {
                userId: this.userid,
                moduleList: []
            }
        },
        mounted() {
            axios
                .get('http://localhost:8000/api/module?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9')
                .then(response => (this.moduleList = response.data))
                .catch(error => console.log(error))
        }
    }
</script>