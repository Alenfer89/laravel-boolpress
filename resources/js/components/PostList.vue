<template>
    <div class="row justify-content-between align-items-center">
        
        <Post 
        v-for="(post, index) in posts"
        :key="index"
        :post='post'
        />

    </div>
</template>

<script>
import Axios from 'axios';
import Post from './Post.vue';
export default {
    name: "PostList",
    components: { 
        Post,
    },
    data: function () {
        return{
            posts: []
        }
    },
    methods:{
        getPosts(){
            Axios.get('http://127.0.0.1:8000/api/posts')
                .then((result) =>{
                    //console.log(result.data);
                    //console.log(result.data.results);
                    //console.log(result.data.results.data);
                    this.posts = result.data.results.data;
                    console.log(this.posts);
                })
                .catch((error) =>{
                    console.warn(error)
                })
        }
    },
    created(){
        this.getPosts();
    }
}
</script>

<style>

</style>