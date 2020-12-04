<template>
    <div>
        <h1>Accueil</h1>
        <div>
            <h2>Connexion</h2>
            <form action="" method="post" v-on:submit.prevent>
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
                    <button type="submit" v-on:click="api()">Connexion</button>
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
            usersCheck: null
        }
    },
    mounted() {
        console.log('Composant Home monté')
        // Récupération des users
        axios
            .get('http://localhost:8000/api/user')
            .then(response => (this.usersCheck = response.data))
            .catch(error => console.log(error))
    },
    methods: {
        api() {
            for (let i = 0; i < this.usersCheck.length; i++) {
                if (this.email === this.usersCheck[i].email) {
                    this.connexion = true
                    if (this.usersCheck[i].admin === 1) {
                        console.log('admin')
                    } else {
                        console.log('student')
                    }
                }
            }

            if (this.connexion === null) {
                this.connexion = false
            }
        },
        // Check connexion
        auth() {
            if ( ((this.email === this.emailCheck) && (this.password === this.passwordCheck)) || (this.code === this.codeCheck) ) {
                this.connexion = true
                if (this.admin === 1) {
                    // Accès admin
                    console.log("Accès admin")
                } else {
                    // Accès étudiant
                    console.log("Accès étudiant")
                }
            } else {
                this.connexion = false
            }
        },
    }
}
</script>