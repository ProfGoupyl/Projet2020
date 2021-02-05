<template>
  <div class="commentaire">
    <section>
      <form v-on:submit.prevent="postData" method="post" enctype="multipart/form-data" id="formCommentaire">
        <input type="area" name="text" placeholder="Tapez votre commentaire ici" v-model="comment">
        <br>
        <button type="submit">Envoyer</button>
      </form>
      <p v-if="messageSent === true">
        Votre message a été envoyé !
      </p>
      <p v-if="messageSent === false">
        Impossible d'envoyé votre message pour le moment.
      </p>
    </section>
  </div>
</template>

<script>
export default {
  props: ['userInfos', 'module'],

  data() {
    return {
      url: document.querySelector("#envUrl").getAttribute("content"),
      comment: "",
      messageSent: null,
      coursId: JSON.parse(sessionStorage.getItem("coursid")),
    };
  },
  methods: {
    postData() {
      axios
        .post(`${this.url}/api/commentaires/?api_token=${this.userInfos.api_token}`, {
          text: this.comment,
          user_id: this.userInfos.id,
          module_id: this.module,
          cours_id: this.coursId,
        })
        .then((response) => {
          if(response.statusText === 'OK') {
            this.messageSent = true
          } else {
            this.messageSent = false
          }
        })
        .catch((error) => {
          if(error) {
            this.messageSent = false
          }
        })
    },
  },
};
</script>