<template>
  <div>
    <section class="prof">
      <h1>Votre profil:</h1>
      <form v-on:submit.prevent="submit" method="patch" class="userProfil">
        <input type="hidden" name="_token" v-bind:value="token">
        <div>
          <p>
            <label for="prenom">First Name:</label>
            <input type="text" name="prenom" v-model="userPrenom">
          </p>
          <p>
            <label for="name">Last Name:</label>
            <input type="text" name="name" v-model="userName">
          </p>
          <p>
            <label for="email">Email address:</label>
            <input type="email" name="email" v-model="userEmail">
          </p>
        </div>
        <div>
          <p>
            <label for="currentPicture">Photo de profil actuelle:</label>
            <img :src="`${url}/images/users/user${userId}.png`" alt="Photo de profil" class="UserImage" width="50px" height="50px">
          </p>
          <label for="userPhoto">Type de fichier accepté: PNG<br>Volume maximum autorisé: 50 ko</label>
          <input type="file" accept="image/png" name="userPhoto" id="userPhoto" v-on:change="selectImage">
        </div>
        <div>
          <p v-if="(fSend === true && iSend === true)">
            Modifications enregistrées
          </p>
          <p v-if="(fSend === false || iSend === false)">
            Impossible d'enregistrer les modifications
          </p>
        </div>
        <button v-on:click="submitFile()" id="modifier" class="btn btn-primary" type="submit">
          <i class="fas fa-arrow-circle-down fa-lg"></i>
        </button>
        <button><a href="/user">Annuler</a></button>
      </form>
    </section>
  </div>
</template>

<script>
export default {
  props: ["userInfos"],
  data() {
    return {
      token: document.querySelector("#token").getAttribute("content"),
      url: document.querySelector("#envUrl").getAttribute("content"),
      userId: this.userInfos.id,
      userName: this.userInfos.name,
      userPrenom: this.userInfos.prenom,
      userEmail: this.userInfos.email,
      userPseudo: this.userInfos.pseudo,
      userPhoto: null,
      fSend: null,
      iSend: null,
    };
  },
  methods: {
    submit() {
      axios
        .patch(
          `${this.url}/api/users/${this.userInfos.id}/?api_token=${this.userInfos.api_token}`,
          {
            name: this.userName,
            prenom: this.userPrenom,
            email: this.userEmail,
            pseudo: this.userPseudo,
          }
        )
        .then(this.fSend = true)
        .catch(function(error) {
          console.log(error)
          this.fSend = false
        });
    },

    submitFile() {
      const fd = new FormData();
      fd.append("image", this.userPhoto);

      axios
        .post("uploadImage", fd, {
          headers: { "content-type": "multipart/form-data" },
        })
        .then(this.iSend = true)
        .catch(function(error) {
          console.log(error)
          this.iSend = false
        });
    },
    selectImage(event) {
      if(event.target.files[0].size > 50000) {
        $('#userPhoto').val('')
        alert('Fichier trop volumineux ! Maximum 50 Ko')
      } else {
        const id = this.userId
        const fileExt = event.target.files[0].name.split('.').pop(1)
        const newFile = new File([event.target.files[0]], 'user' + id + '.' + fileExt)
        this.userPhoto = newFile
      }

      // Prévisualisation de l'image

      let preview = event.target.files[0]

      if(preview) {
        let reader = new FileReader()
        reader.onload = () => {
          $('.UserImage').attr('src', reader.result)
        }
        reader.readAsDataURL(preview)
      }
    },
  },
};
</script>