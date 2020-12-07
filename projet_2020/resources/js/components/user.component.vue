<template>
    <div>
        <nav>
            <ul>
                <li><a v-bind:href="`../../views/pages/profile.blade.php?id=${this.userId}`">Profil</a></li>
                <li><a href="../../views/pages/faq.blade.php">FAQ</a></li>
                <li>Se déconnecter</li>
            </ul>
        </nav>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                userId: 5,
                url: null
            }
        },
        mounted() {
            this.url = window.location.pathname
        }
    }
</script>