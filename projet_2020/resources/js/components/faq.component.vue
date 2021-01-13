<template>
    <div>
        <section>
            <h1>FAQ</h1>
                <ul class="faq">
                    <li v-for="question in filterFaq" :key="question.id">
                        <button><h3> {{ question.question }} </h3></button>
                        <p class="hidden"> {{ question.reponse }} </p>
                    </li>
                </ul>
        </section>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                faqList: [],
                moduleId: JSON.parse(sessionStorage.getItem('moduleid')),
            }
        },
        created() {
            axios
                .get('http://localhost:8000/api/faq?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9')
                .then(response => (this.faqList = response.data))
                .catch(error => console.log(error))
        },
        computed: {
            filterFaq: function() {
                return this.faqList.filter(modules => modules.id === this.moduleId)
            }
        },
    }
</script>