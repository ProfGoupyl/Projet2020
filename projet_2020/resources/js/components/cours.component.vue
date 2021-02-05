<template>
    <div>
        <section class="section_page_cours">
            <aside class="aside_page_cours">
                <h2 class="navSecondaire_coursName">
                    {{ coursName }}
                </h2>
                <nav class="navSecondaire">
                    <ul>
                        <li v-for="module in moduleList" :key="module.id">
                                <a href="/cours" class="Modules" v-on:click.prevent="save(module.id), forceRerender()">
                                    {{ module.titre }}
                                </a>
                        </li>
                    </ul>
                </nav>
            </aside>
            <article v-if="moduleId">
                <Session :key="componentKey" :user-infos="this.userInfos" :module="this.moduleId"></Session>
                <div>
                    <button v-on:click.prevent="onPrevious(), forceRerender()" v-if="handleButton === 1 || handleButton === 3">
                        Précédent
                    </button>
                    <button v-on:click.prevent="onNext(), forceRerender()" v-if="handleButton === 2 || handleButton === 3">
                        Suivant
                    </button>
                </div>
            </article>
        </section>
    </div>
</template>

<script>
import Session from "./session.component";

export default {
    components: {
        Session,
    },
    props: ["userInfos"],
    data() {
        return {
            moduleId: null,
            coursId: JSON.parse(sessionStorage.getItem("coursid")),
            moduleList: [],
            coursName: null,
            componentKey: 0,
            handleButton: 2,
            url: document.querySelector("#envUrl").getAttribute("content"),
        };
    },
    created() {
        axios
            .get(`${this.url}/api/module?api_token=${this.userInfos.api_token}`)
            .then((response) => {
                let temp
                let first
                temp = _.orderBy(response.data, "ordre", "asc")
                this.moduleList = temp.filter((module) => module.cours_id === this.coursId)
                first = temp.filter((module) => module.cours_id === this.coursId)
                this.moduleId = first[0].id
            })
            .catch((error) => console.log(error));

        axios
            .get(`${this.url}/api/cours?api_token=${this.userInfos.api_token}`)
            .then((response) => {
                let temp = response.data
                let tab
                tab = temp.filter((name) => name.id === this.coursId)
                this.coursName = tab[0].titre
            })
            .catch((error) => console.log(error));
    },
    methods: {
        save(moduleid) {
            this.moduleId = moduleid;
        },
        forceRerender() {
            this.componentKey += 1;

            let current
            const max = this.moduleList.length - 1

            for (let i = 0; i < this.moduleList.length; i++) {
                if (this.moduleId === this.moduleList[i].id) {
                current = i
                }
            }

            if(current === 0) {
                this.handleButton = 2
            } else if(current === max ) {
                this.handleButton = 1
            } else {
                this.handleButton = 3
            }
        },
        
        // Gestion du bouton précédent
        onPrevious: function () {
            let current;

            for (let i = 0; i < this.moduleList.length; i++) {
                if (this.moduleId === this.moduleList[i].id) {
                current = i;
                }
            }

            if (this.moduleId === this.moduleList[0].id) {
                this.moduleId = this.moduleId;
            } else {
                this.moduleId = this.moduleList[current - 1].id;
            }

            if (this.moduleId === this.moduleList[0].id) {
                this.handleButton = 2;
            } else {
                this.handleButton = 3;
            }
        },

        // Gestion du bouton suivant
        onNext: function () {
            let current;
            const max = this.moduleList.length - 1;

            for (let i = 0; i < this.moduleList.length; i++) {
                if (this.moduleId === this.moduleList[i].id) {
                current = i;
                }
            }

            if (this.moduleId === this.moduleList[max].id) {
                this.moduleId = this.moduleId;
                this.handleButton = 1;
            } else {
                this.moduleId = this.moduleList[current + 1].id;
                this.handleButton = 3;
            }

            if (this.moduleId === this.moduleList[max].id) {
                this.handleButton = 1;
            } else {
                this.handleButton = 3;
            }
        }
    },
};
</script>