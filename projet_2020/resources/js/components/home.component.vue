<template>
    <div>
        <h1>Accueil</h1>
        <div>
            <h2>Connexion</h2>
            <p>email : test@mail.com</p>
            <p>password: pwd</p>
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
                    <button type="submit" v-on:click="auth()">Connexion</button>
                </p>
            </form>
        </div>
        <div v-if="connexion">
            <p style="color: green">Connexion réussie</p>
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
            emailTrue: 'test@mail.com',
            passwordTrue: 'pwd',
            connexion: false,
        }
    },
    mounted() {
        console.log('Composant Home monté')
    },
    methods: {
        auth() {
            if ( (this.email === this.emailTrue) && (this.password === this.passwordTrue) ) {
                this.connexion = true
            }
        },
    }
}
</script>