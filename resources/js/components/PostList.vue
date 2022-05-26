<template>
    <div>
        <h1>test</h1>
        <Post />
    </div>
</template>

<script>
import Post from './Post.vue';
export default {
    name: "PostList",
    data: function () {
    },
    components: { 
        Post,
    }
}
</script>

<style>

</style>