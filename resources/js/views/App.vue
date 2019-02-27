<template>
    <div>
        <h1>My Test App</h1>

        <nav>
            <router-link :to="{name: 'home'}">Home</router-link>
            <router-link :to="{name: 'hello'}">Hello</router-link>
        </nav>

        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
export default {
    
}
</script>
