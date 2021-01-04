<template>
    <div>
        <h1>Page FAQ</h1>
        <div>
            <h2>Questions & Réponses:</h2>
            <ol>
                <li v-for="question in faqList" :key="question.id">
                    <a href='/faq'> {{ question.question }} </a>
                   <div>  {{ question.reponse }}  </div>
                </li>
            </ol>
        </div>
        
    </div>
</template>

<script>
    export default {
        data() {
            return {
                faqList: [],
            }
        },
        mounted() {
            axios
                .get('http://localhost:8000/api/faq?api_token=sxSVzOnXPDZRk0UFuDMKhaMV2TC5accFVar9epV5nkxiIigOJ08AkFFs5HmkwxIYZ10e1cj1dZGDZIxFg6p4s9a0B8oS2c0bU3o9')
                .then(response => (this.faqList = response.data))
                .catch(error => console.log(error))
        }
    }
</script>