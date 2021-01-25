<template>
    <div>
        <section>
            <h1>FAQ</h1>
                <ul class="faq">
                    <li v-for="module in filterFaq" :key="module.id">
                        <details>
                        <summary class="faq_question"> {{ module.question }}<a></a> </summary>
                        <p class="faq_question_hidden"> {{ module.reponse }}<a></a></p>
                        </details>
                    </li>
                </ul>
        </section>
    </div>
</template>

<script>
    export default {
        props: ['userInfos'],
        data() {
            return {
                faqList: [],
                moduleId: JSON.parse(sessionStorage.getItem('moduleid')),
            }
        },
        created() {
            axios
                .get(`http://localhost:8000/api/faq?api_token=${this.userInfos.api_token}`)
                .then(response => (this.faqList = response.data))
                .catch(error => console.log(error))
        },
        computed: {
            filterFaq: function() {
                return this.faqList.filter(module => module.module_id === this.moduleId)
            }
        },
    }
</script>