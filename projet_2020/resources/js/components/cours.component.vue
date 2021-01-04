<template>
    <div>
        <h1>page COURS</h1>
        <h2>Liste des sessions dispo pour le cours</h2>
        <ul>
            <li v-for="session in sessionList" :key="session.id"> 
                <span>
                Cours : {{ session.titre }}
                <ul v-for="module in moduleList" :key="module.titre">
                    <li v-show="session.id === module.cours_id">
                        {{ module.titre }}
                    </li>
                </ul>
                </span>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['userid'],
        data() {
            return {
                userId: this.userid,
                moduleList: [],
                sessionList: []
            }
        },
        created() {
            axios
                .get('http://localhost:8000/api/module?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9')
                .then(response => (this.moduleList = response.data))
                .catch(error => console.log(error))
        
            axios
                .get('http://localhost:8000/api/cours?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9')
                .then(response => (this.sessionList = response.data))
                .catch(error => console.log(error))
        },
    }
</script>