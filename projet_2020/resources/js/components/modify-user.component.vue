<template>
    <div>
        <h1>Modifier le profil </h1>
        <form action="" method="post">
            <div>
                <label for="name">Nom</label>
                <input v-model="userName" type="text" name="name">
            </div>
            <div>
                <label for="prenom">Prénom</label>
                <input v-model="userPrenom" type="text" name="prenom">
            </div>
            <div>
                <label for="email">E-mail</label>
                <input v-model="userEmail" type="email" name="email">
            </div>
            <div>
                <label for="pseudo">Pseudo</label>
                <input v-model="userPseudo" type="text" name="pseudo">
            </div>
            <div>
                <input type="number" v-model="userId" hidden>
            </div>
            <div>
                <button type="submit">Modifier</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                userId: this.user.id,
                userName: this.user.name,
                userPrenom: this.user.prenom,
                userEmail: this.user.email,
                userPseudo: this.user.pseudo
            }
        }
    }
</script>