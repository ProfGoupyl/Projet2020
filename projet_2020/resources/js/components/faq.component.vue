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
            <h1>FAQ</h1>
                <ul class="faq">
                    <li v-for="question in faqList" :key="question.id">
                        <button><h3> {{ question.question }} </h3></button>
                        <p class="hidden"> {{ question.reponse }} </p>
                    </li>
                </ul>
        </section>
    </div>
    <!--
    <section class="GeneralSectionUserPageFAQ">
        <h1>FAQ</h1>
        <ul class="faq">
                <li v-for="question in faqList" :key="question.id">
                   <button><h3> {{ question.question }} </h3></button>
                   <p class="hidden" >  {{ question.reponse }}  </p> 
                </li>
        </ul>
    </section>
    -->
</template>

<script>
    export default {
        data() {
            return {
                faqList: [],
            }
        },
        created() {
            axios
                .get('http://localhost:8000/api/faq?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9')
                .then(response => (this.faqList = response.data))
                .catch(error => console.log(error))
        }
    }
</script>