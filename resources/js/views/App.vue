<template>
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <h1>
                    GUEST (NOT LOGGED) HOMEPAGE
                </h1>
            </div>
            <section class="col-12">
                <PostList />
            </section>
            <div class="col-6 mx-auto d-flex justify-content-between">
                <a href="/admin">
                    <button class="btn btn-primary" >
                        back
                    </button> 
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import PostList from '../components/PostList.vue'
export default {
    name: 'App',
    components: {
        PostList,
    },
}
</script>

<style>

</style>