<template>
    <div>
        <nav>
            <ul>
                <li><a href="../../views/pages/profile.blade.php">Profil</a></li>
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
                userid: null,
                url: null
            }
        },
        mounted() {
            this.url = window.location.pathname
        }
    }
</script>