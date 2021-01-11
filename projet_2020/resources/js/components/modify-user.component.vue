<template>
    <div>
        <section>
            <h1>Votre profil:</h1>
            <form v-on:submit.prevent="submit" method="patch" class="userProfil">
                <input type="hidden" name="_token" v-bind:value="token">
                <p>
                    <label for="firstname">First Name:</label>
                    <input type="text" name="firstname" v-model="userPrenom">
                </p>
                <p>
                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname" v-model="userName">
                </p>
                <p>
                    <label for="email">Email address:</label>
                    <input type="email" name="email" v-model="userEmail">
                </p>
                <p>
                    <label for="currentPicture">Current picture:</label>
                    <img src="" alt="" class="UserImage" width="50px" height="50px">
                </p>
                <p>
                    <label for="downloadPicture">New Picture</label>
                    <input type="text" placeholder="Download picture">
                </p>
                <button id="modifier" class="btn btn-primary" type="submit">Modifier</button>
            </form>

            <button class="btn btn-primary" type="submit">Annuler</button>

            <div v-if="send === true">
                <p>Modifications enregistrées</p>
            </div>
            <div v-if="send === false">
                <p>Erreur</p>
            </div>
        </section>
        <!--
        <h1>Modifier le profil </h1>
        <form v-on:submit.prevent="submit" method="patch">
            <input type="hidden" name="_token" v-bind:value="token">
            <div>
                <label for="name">Nom</label>
                <input v-model="userName" type="text" name="name" required>
            </div>
            <div>
                <label for="prenom">Prénom</label>
                <input v-model="userPrenom" type="text" name="prenom" required>
            </div>
            <div>
                <label for="email">E-mail</label>
                <input v-model="userEmail" type="email" name="email" required>
            </div>
            <div>
                <label for="pseudo">Pseudo</label>
                <input v-model="userPseudo" type="text" name="pseudo" required>
            </div>
            <div>
                <button type="submit">Modifier</button>
            </div>
            <div v-if="send">
                <p>Modifications enregistrées</p>
            </div>
        </form>
        -->
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                token: document.querySelector('#token').getAttribute('content'),
                userId: this.user.id,
                userName: this.user.name,
                userPrenom: this.user.prenom,
                userEmail: this.user.email,
                userPseudo: this.user.pseudo,
                send: null,
            }
        },
        methods: {
            submit() {
                axios.patch(`http://localhost:8000/api/users/${this.userId}/?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9`
                , {
                    name: this.userName,
                    prenom: this.userPrenom,
                    email: this.userEmail,
                    pseudo: this.userPseudo
                })
                .then(response => this.send = true)
                .catch(error => this.send = false)
            }
        }
    }
</script>