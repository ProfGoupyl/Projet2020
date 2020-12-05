<template>
    <div>
        <h1>Accueil</h1>
        <div>
            <h2>Connexion</h2>
            <p>email : test@mail.com</p>
            <p>password: pwd</p>
            <p>code: 123</p>
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
        <div>
            {{ users }}
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
            emailCheck: 'test@mail.com',
            passwordCheck: 'pwd',
            codeCheck: '123',
            admin: 1,
            connexion: null,
            users: null
        }
    },
    mounted() {
        console.log('Composant Home monté')
        axios
            .get('http://localhost/Projet2020/projet_2020/public/api/user')
            .then(response => (this.users = response))
            .catch(error => console.log(error))
        console.log(this.users)
    },
    methods: {
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