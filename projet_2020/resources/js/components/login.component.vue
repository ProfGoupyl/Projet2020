<template>
    <div>
        <h1>Accueil</h1>
        <div>
            <h2>Connexion</h2>
            <form action="" method="get" v-on:submit.prevent>
                <p>
                    <label for="email">Adresse e-mail:</label>
                    <input v-model="email" type="email" name="email">
                </p>
                <p>
                    <label for="pwd">Mot de passe:</label>
                    <input v-model="password" type="password" name="pwd">
                </p>
                <p>
                    <label for="code">Code d'inscription:</label>
                    <input v-model="code" type="text" name="code">
                </p>
                <p>
                    <button type="submit" v-on:click="auth()">Connexion</button>
                </p>
            </form>
        </div>
        <div v-if="connexion === true">
            <p style="color: green">Connexion réussie</p>
        </div>
        <div v-if="connexion === false">
            <p style="color: red">Connexion échouée</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: null,
            password: null,
            code: null,
            connexion: null,
            userCheck: [],
            userId: null,
            userAdmin: null
        }
    },
    mounted() {
        console.log('Composant Home monté')
        // Récupération des users
        axios
            .get('http://localhost:8000/api/user?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9')
            .then(response => (this.userCheck = response.data))
            .catch(error => console.log(error))
    },
    methods: {
        // Vérification du user avec l'API
        auth() {
            for (let i = 0; i < this.userCheck.length; i++) {
                if (this.connexion === true) {
                    break
                }
                if ((this.email === this.userCheck[i].email) && (this.password === this.userCheck[i].password)) {
                    this.connexion = true
                    this.userId = this.userCheck[i].id
                    this.userAdmin = this.userCheck[i].admin
                }
            }
            if (this.connexion !== true) {
                this.connexion = false
            }
        }
    }
}
</script>