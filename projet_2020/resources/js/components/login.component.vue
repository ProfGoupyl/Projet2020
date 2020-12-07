<template>
    <div>
        <h1>Accueil</h1>
        <div>
            <h2>Connexion</h2>
            <form action="" method="post">
                <p>
                    <label for="email">Adresse e-mail:</label>
                    <input v-model="email" type="email" name="email">
                </p>
                <p>
                    <label for="pwd">Mot de passe:</label>
                    <input v-model="password" type="password" name="pwd">
                </p>
                <p>
                    <button type="submit">Connexion</button>
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
            connexion: null
        }
    }
}
</script>