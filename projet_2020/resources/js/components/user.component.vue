<template>
    <div>
        <h1>Page utilisateur</h1>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                userId: null,
                url: null
            }
        },
        mounted() {
            this.url = window.location.pathname
        }
    }
</script>