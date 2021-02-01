<template>
  <div class="commentaire">
    <section>
      <form v-on:submit.prevent="postData" method="post">
        <input
          type="area"
          name="text"
          placeholder="Tapez votre commentaire ici"
          v-model="comment"
        />
        <br />
        <button type="submit">Envoyer</button>
      </form>
    </section>
  </div>
</template>

<script>
export default {
  props: ["userInfos"],

  data() {
    return {
      userId: this.userInfos.user_id,
      apiToken: this.userInfos.api_token,
      url: document.querySelector("#envUrl").getAttribute("content"),
      comment: "",
    };
  },

  methods: {
    postData() {
      axios.post("postData", { text: this.comment }).then((response) => {
        console.log(response);
      });
    },
  },
};
</script>