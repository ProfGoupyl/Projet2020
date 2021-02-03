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
  props: ["userInfos", "modules"],

  data() {
    return {
      userId: this.userInfos.user_id,
      apiToken: this.userInfos.api_token,
      url: document.querySelector("#envUrl").getAttribute("content"),
      comment: "",
      userId: this.userInfos.id,
      moduleId: JSON.parse(sessionStorage.getItem("moduleid")),
      coursId: JSON.parse(sessionStorage.getItem("coursid")),
    };
  },
  computed: {
    filterModules: function () {
      return this.moduleList.filter((modules) => modules.id === this.moduleId);
    },
  },

  methods: {
    postData() {
      axios
        .post("postData", {
          text: this.comment,
          user_id: this.userId,
          module_id: this.moduleId,
          cours_id: this.coursId,
        })
        .then((response) => {
          console.log(response);
        });
    },
  },
};
</script>