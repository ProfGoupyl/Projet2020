<template>
    <div>
        <section>
            <h1>Votre profil:</h1>
            <form v-on:submit.prevent="submit" method="patch" class="userProfil">
                <input type="hidden" name="_token" v-bind:value="token">
                <div>
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
                </div>
                <div>
                <p>
                    <label for="currentPicture">Photo de profil actuelle:</label>
                    <img src="" alt="" class="UserImage" width="50px" height="50px">
                </p>
                <p>
                    <label for="downloadPicture">Nouvelle photo de profil:</label>
                    <input type="file" accept="image/jpeg, image/png" @change="uploadImage($event)">
                </p>
                </div>
                <button id="modifier" class="btn btn-primary" type="submit"><i class="fas fa-pen fa-lg"></i></button>
                <button><a href="/user">Annuler</a></button>
            </form>

            <div v-if="send === true">
                <p>Modifications enregistrées</p>
            </div>
            <div v-if="send === false">
                <p>Erreur</p>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        props: ['userInfos'],
        data() {
            return {
                token: document.querySelector('#token').getAttribute('content'),
                userId: this.userInfos.id,
                userName: this.userInfos.name,
                userPrenom: this.userInfos.prenom,
                userEmail: this.userInfos.email,
                userPseudo: this.userInfos.pseudo,
                userPhoto: null,
                send: null,
            }
        },
        methods: {
            submit() {
                axios.patch(`http://localhost:8000/api/users/${this.userInfos.id}/?api_token=${this.userInfos.api_token}`
                , {
                    name: this.userName,
                    prenom: this.userPrenom,
                    email: this.userEmail,
                    pseudo: this.userPseudo,
                })
                .then(response => this.send = true)
                .catch(error => this.send = false)
            },
            uploadImage(event) {
                if(event.target.files[0]) {
                    console.log('ok')
                }
                this.userPhoto = event.target.files[0]
                console.log(this.userPhoto)

                const data = new FormData()
                data.append(`user${this.userId}`, this.userPhoto)
            }
        }
    }
</script>