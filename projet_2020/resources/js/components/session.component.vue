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
      </div>
    </div>
    <article v-if="faq === true">
      <Faq :user-infos="this.userInfos" :module="this.moduleId"></Faq>
    </article>
    <article>
      <Comment :user-infos="this.userInfos" :module="this.moduleId"></Comment>
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
  props: ["userInfos", "module"],
  data() {
    return {
      moduleList: [],
      moduleId: this.module,
      faqList: [],
      faq: null,
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

    // Récupération de la liste FAQ
    axios
      .get(`${this.url}/api/faq?api_token=${this.userInfos.api_token}`)
      .then((response) => {
        this.faqList = response.data
        
        // Gestion de l'affichage de la FAQ au démarrage
        let temp
        temp = this.faqList.filter((item) => item.module_id === this.moduleId)

        if(temp.length === 0) {
          this.faq = false
        } else {
          this.faq = true
        }
      })
      .catch((error) => console.log(error));
  },
  updated() {
    // Gère l'affichage de la FAQ à chaque mise à jour du composant
    let temp
    temp = this.faqList.filter((item) => item.module_id === this.moduleId)

    if(temp.length === 0) {
      this.faq = false
    } else {
      this.faq = true
    }
  },
}
</script>