<template>
    <div>
        <h1>Accueil</h1>
        <div>
            <form action="" method="post">
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
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            students: [
                { firstname: 'Jean', lastname: 'Delatour' },
                { firstname: 'Pierre', lastname: 'Tombale' },
                { firstname: 'Sarah', lastname: 'Croche' },
            ],
            email: null,
            password: null,
            code: null,
        }
    },
    mounted() {
        console.log('Hello')
    }
}
</script>

<style>
    h1 {
        font-size: 3em;
    }
</style>