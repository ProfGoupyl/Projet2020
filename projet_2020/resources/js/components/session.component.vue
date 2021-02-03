<template>
  <div class="session">
    <div v-for="modules in filterModules" :key="modules.id">
      <div>
        <h2>{{ modules.titre }}</h2>
        <p v-html="modules.description"></p>
        <iframe
          width="560"
          height="315"
          :src="modules.url_video"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen
        ></iframe>
        <!-- {{ modules.url_video }} -->
        <div>
          <button
            v-on:click.prevent="onPrevious()"
            v-if="handleButton === 1 || handleButton === 3"
          >
            Précédent
          </button>
          <button
            v-on:click.prevent="onNext()"
            v-if="handleButton === 2 || handleButton === 3"
          >
            Suivant
          </button>
        </div>
      </div>
    </div>
    <article>
      <Faq :user-infos="this.userInfos" :module="this.moduleId"></Faq>
    </article>
    <article>
      <Comment :user-infos="this.userInfos"></Comment>
    </article>
  </div>
</template>
<script>
import Faq from "./faq.component";
import Comment from "./commentaire.component";

export default {
  components: {
    Faq,
    Comment,
  },
  props: ["userInfos", "modules"],
  data() {
    return {
      moduleList: [],
      handleButton: 2,
      moduleId: JSON.parse(sessionStorage.getItem("moduleid")),
      url: document.querySelector("#envUrl").getAttribute("content"),
    };
  },
  computed: {
    // Récupération du module qui a le même id que moduleId
    filterModules: function () {
      return this.moduleList.filter((modules) => modules.id === this.moduleId);
    },
  },
  created() {
    // Récupération de la liste des modules
    axios
      .get(`${this.url}/api/module?api_token=${this.userInfos.api_token}`)
      .then((response) => (this.moduleList = response.data))
      .catch((error) => console.log(error));
  },
  // Permet de clear l'id du module
  updated() {
    sessionStorage.removeItem("moduleid");
  },
  methods: {
    // Gestion du bouton précédent
    onPrevious: function () {
      let current;

      for (let i = 0; i < this.modules.length; i++) {
        if (this.moduleId === this.modules[i]) {
          current = i;
        }
      }

      if (this.moduleId === this.modules[0]) {
        this.moduleId = this.moduleId;
      } else {
        this.moduleId = this.modules[current - 1];
      }

      if (this.moduleId === this.modules[0]) {
        this.handleButton = 2;
      } else {
        this.handleButton = 3;
      }
    },

    // Gestion du bouton suivant
    onNext: function () {
      let current;
      const max = this.modules.length - 1;

      for (let i = 0; i < this.modules.length; i++) {
        if (this.moduleId === this.modules[i]) {
          current = i;
        }
      }

      if (this.moduleId === this.modules[max]) {
        this.moduleId = this.moduleId;
        this.handleButton = 1;
      } else {
        this.moduleId = this.modules[current + 1];
        this.handleButton = 3;
      }

      if (this.moduleId === this.modules[max]) {
        this.handleButton = 1;
      } else {
        this.handleButton = 3;
      }
    },
  },
};
</script>