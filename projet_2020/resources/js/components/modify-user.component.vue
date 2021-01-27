<template>
  <div>
    <section class="prof">
      <h1>Votre profil:</h1>
      <form v-on:submit.prevent="submit" method="patch" class="userProfil">
        <input type="hidden" name="_token" v-bind:value="token" />
        <div>
          <p>
            <label for="prenom">First Name:</label>
            <input type="text" name="prenom" v-model="userPrenom" />
          </p>
          <p>
            <label for="name">Last Name:</label>
            <input type="text" name="name" v-model="userName" />
          </p>
          <p>
            <label for="email">Email address:</label>
            <input type="email" name="email" v-model="userEmail" />
          </p>
        </div>
        <div>
          <p>
            <label for="currentPicture">Photo de profil actuelle:</label>
            <img src="" alt="" class="UserImage" width="50px" height="50px" />
          </p>

          <input type="file" name="userPhoto" v-on:change="selectImage" />
        </div>
        <button
          v-on:click="submitFile()"
          id="modifier"
          class="btn btn-primary"
          type="submit"
        >
          <i class="fas fa-pen fa-lg"></i>
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
      send: null,
      uploadSucces: false,
      uploadFail: false,
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
        .then((response) => console.log(response))
        .catch((error) => console.log(error));
    },

    submitFile() {
      let currentObj = this;

      const fd = new FormData();
      fd.append("image", this.userPhoto);

      axios
        .post("uploadImage", fd, {
          headers: { "content-type": "multipart/form-data" },
        })
        .then(function (response) {
          currentObj.uploadSucces = response.data.success;
        })
        .catch(function (error) {
          currentObj.uploadFail = error;
        });
    },
    selectImage(event) {
      this.userPhoto = event.target.files[0];
    },
  },
};
</script>