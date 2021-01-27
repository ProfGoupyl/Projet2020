<template>
  <div class="commentaire">
    <section>
      <form @submit="postData" method="post">
        <input
          type="area"
          name="text"
          placeholder="Tapez votre commentaire ici"
          v-model="posts.text"
        />
        <br />
        <button type="submit">Envoyer</button>
      </form>
    </section>
  </div>
</template>

<script>
export default {
  name: "CommentaireComponent",
  props: ["userInfos"],

  data() {
    return {
      posts: { text: null },
      userId: this.userInfos.id,
      apiToken: this.userInfos.api_token,
      url: document.querySelector("#envUrl").getAttribute("content"),
    };
  },

  methods: {
    postData(e) {
      axios.post("postData", this.posts).then(
        function (response) {
          console.log(response.data);
        },
        function (response) {
          console.log(response.data);
        }
      );
      e.preventDefault();
    },
  },
};
</script>