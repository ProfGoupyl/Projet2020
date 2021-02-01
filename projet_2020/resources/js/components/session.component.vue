<template>
  <div class="session">
    <div v-for="modules in filterModules" :key="modules.id">
      <div>
        <h2>{{ modules.titre }}</h2>
        <p>{{ modules.description }}</p>
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
          <button v-on:click.prevent="onPrevious()">Précédent</button>
          <button v-on:click.prevent="onNext()">Suivant</button>
        </div>
      </div>
    </div>
    <article>
      <Faq v-bind:user-infos="this.userInfos"></Faq>
    </article>
    <article>
      <Comment v-bind:user-infos="this.userInfos"></Comment>
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
      moduleId: JSON.parse(sessionStorage.getItem("moduleid")),
      url: document.querySelector("#envUrl").getAttribute("content"),

      hasPrevious: false,
      hasNext: true,
    };
  },
  computed: {
    filterModules: function () {
      return this.moduleList.filter((modules) => modules.id === this.moduleId);
    },
  },
  created() {
    axios
      .get(`${this.url}/api/module?api_token=${this.userInfos.api_token}`)
      .then((response) => (this.moduleList = response.data))
      .catch((error) => console.log(error));
  },
  // permet de clear l'id du module
  updated() {
    sessionStorage.removeItem("moduleid");
  },
  methods: {
    onPrevious: function () {
     let current

     for(let i = 0; i < this.modules.length; i++) {
       if(this.moduleId === this.modules[i]) {
         current = i
       }
     }

     if(this.moduleId === this.modules[0]) {
       this.moduleId = this.moduleId
     } else {
       this.moduleId = this.modules[current - 1]
     }
    },

    onNext: function () {
     let current
     const max = this.modules.length - 1

     for(let i = 0; i < this.modules.length; i++) {
       if(this.moduleId === this.modules[i]) {
         current = i
       }
     }

     if(this.moduleId === this.modules[max]) {
       this.moduleId = this.moduleId
     } else {
       this.moduleId = this.modules[current + 1]
     }
    },
  },
};
</script>