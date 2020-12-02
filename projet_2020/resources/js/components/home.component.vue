<template>
    <div>
        <h1>Accueil</h1>
        <div>
            <h2>Connexion</h2>
            <form action="" method="post" v-on:submit.prevent>
                <p>
                    <label for="email">Adresse e-mail:</label>
                    <input v-model="email" type="email" name="email" id=""><br>
                    email: {{ email }}
                </p>
                <p>
                    <label for="pwd">Mot de passe:</label>
                    <input v-model="password" type="text" name="pwd" id=""><br>
                    pwd: {{ password }}
                </p>
                <p>
                    <label for="code">Code d'inscription:</label>
                    <input v-model="code" type="text" name="code" id=""><br>
                    code: {{ code }}
                </p>
                <p>
                    <button type="submit">Connexion</button>
                </p>
            </form>
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
        }
    },
    mounted() {
        console.log('Composant Home monté')
    }
}
</script>

<style>

</style>