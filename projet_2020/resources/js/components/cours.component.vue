<template>
    <div>
        <header>
            <figure>
                <a href="/profile" class="UserName">
                    <img src="" alt="" class="UserImage" height="80px" width="80px">
                </a>
            </figure>
            <nav class="navPrincipale">
                <ul class="navigation">
                    <li>
                        <a href="/user">Cours</a>
                    </li>
                    <li>
                        <a href="/faq">FAQ</a>
                    </li>
                    <li>
                        <a href="/logout">Logout</a>
                    </li>
                </ul>
            </nav>
        </header>
        <section>
            <aside>
                <nav class="navSecondaire">
                    <ul>
                        <li v-for="names in coursNames" :key="names.id"> 
                            
                            <span>Cours ID: <a href='/cours'> {{ coursId }} </a>

                            Cours : {{ names.titre }}
                            <ul v-for="module in moduleList" :key="module.titre">
                                <li v-show="coursId === module.cours_id">
                                   <a href="/cours" class="Modules" v-on:click="save(module.id)"> {{ module.titre }} </a>
                                </li>
                            </ul>
                            </span>

                        </li>
                    </ul>
                </nav>
            </aside>
            <div>
                <article>
                    <Session></Session>
                </article>
            </div>
        </section>
        <!--
        <h1>page COURS</h1>
        <h2>Liste des modules dispo pour le cours</h2>
        <ul>
            <li v-for="cours in filterCours" :key="cours.id"> 
                <div v-for="names in coursNames" :key="names.id">

                <span v-show="cours.cours_id === names.id"> Cours ID: <a href='/cours'> {{ cours.cours_id }} </a>

                Cours : {{ names.titre }}
                <ul v-for="module in moduleList" :key="module.titre">
                    <li v-show="names.id === module.cours_id">
                        {{ module.titre }}
                    </li>
                </ul>
                </span>
                </div>
            </li>
        </ul>
        -->
    </div>
</template>

<script>
    import Session from './session.component'
    export default {
        components: {
            Session
        },
        props: ['userid'],
        data() {
            return {
                userId: 37,
                coursId: JSON.parse(sessionStorage.getItem('coursid')),
                moduleList: [],
                coursNames: []
            }
        },
        created() {
            axios
                .get('http://localhost:8000/api/module?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9')
                .then(response => (this.moduleList = response.data))
                .catch(error => console.log(error))
        
            axios
                .get(`http://localhost:8000/api/users/formations/${this.userId}?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9`)
                .then(response => (this.coursNames = response.data))
                .catch(error => console.log(error))
            
        },
        methods: {
            save(moduleid) {
                sessionStorage.setItem('moduleid', moduleid)
            }
        }
        
    }
</script>