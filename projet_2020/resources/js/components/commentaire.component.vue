<template>
    <div>
        <section>
            <form @submit="postData" method="post">
                <input type="area" name="comment" placeholder="Tapez votre commentaire ici" v-model="posts.text"> <br>
                <button type="submit"> Envoyer </button>
            </form> 
        </section>
    </div>
</template>

<script>
    
    export default {
        name: "CommentaireComponent",
        
        data() {
            return {
                posts: { text: null}
            }
        },
        
        methods: {
            postData(e)
            {
                this.axios.post(`http://localhost:8000/commentaires`, this.posts)
                .then((result)=>{
                    console.warn(result)
                })
                e.preventDefault();
            }
        }
    }
</script>