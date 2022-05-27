<template>

    <div class="container-fluid px-5">
        <div class="row justify-content-between align-items-center p-5">
            <div class="col-12 pb-5">
                <h1 class="pb-5">
                    Some Awesome Posts
                </h1>
            </div>
            <div class="col-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item" v-if="pagination.currentPage !== 1" @click="getPosts(1)">
                            <a class="page-link">
                                First
                            </a>
                        </li>
                        <li class="page-item disabled" v-else>
                            <a class="page-link">
                                First
                            </a>
                        </li>
                        <li class="page-item" v-if="pagination.currentPage > 1" @click="getPosts(pagination.currentPage - 1)">
                            <a class="page-link">
                                Previous
                            </a>
                        </li>
                        <li class="page-item disabled" v-else>
                            <a class="page-link">
                                Previous
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link">
                                {{ pagination.currentPage }}
                            </a>
                        </li>
                        <li class="page-item" v-if="pagination.currentPage < pagination.lastPage" @click="getPosts(pagination.currentPage + 1)">
                            <a class="page-link">
                                Next
                            </a>
                        </li>
                        <li class="page-item disabled" v-else>
                            <a class="page-link">
                                Next
                            </a>
                        </li>
                        <li class="page-item" v-if="pagination.currentPage !== pagination.lastPage" @click="getPosts(pagination.lastPage)">
                            <a class="page-link">
                                Last
                            </a>
                        </li>
                        <li class="page-item disabled" v-else>
                            <a class="page-link">
                                Last
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <Post 
            v-for="(post, index) in posts"
            :key="index"
            :post='post'
            />

            <div class="col-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item" v-if="pagination.currentPage !== 1" @click="getPosts(1)">
                            <a class="page-link">
                                First
                            </a>
                        </li>
                        <li class="page-item disabled" v-else>
                            <a class="page-link">
                                First
                            </a>
                        </li>
                        <li class="page-item" v-if="pagination.currentPage > 1" @click="getPosts(pagination.currentPage - 1)">
                            <a class="page-link">
                                Previous
                            </a>
                        </li>
                        <li class="page-item disabled" v-else>
                            <a class="page-link">
                                Previous
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link">
                                {{ pagination.currentPage }}
                            </a>
                        </li>
                        <li class="page-item" v-if="pagination.currentPage < pagination.lastPage" @click="getPosts(pagination.currentPage + 1)">
                            <a class="page-link">
                                Next
                            </a>
                        </li>
                        <li class="page-item disabled" v-else>
                            <a class="page-link">
                                Next
                            </a>
                        </li>
                        <li class="page-item" v-if="pagination.currentPage !== pagination.lastPage" @click="getPosts(pagination.lastPage)">
                            <a class="page-link">
                                Last
                            </a>
                        </li>
                        <li class="page-item disabled" v-else>
                            <a class="page-link">
                                Last
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
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
            posts: [],
            pagination: {},
        }
    },
    methods:{
        getPosts(page){
            Axios.get('http://127.0.0.1:8000/api/posts?page=' + page)
                .then((result) =>{
                    console.log(result.data);
                    console.log(result.data.results);
                    console.log(result.data.results.data);
                    this.posts = result.data.results.data;
                    const { current_page , last_page } = result.data.results;
                    console.log( { current_page , last_page });
                    this.pagination = { currentPage : current_page , lastPage : last_page };
                    console.log(this.posts);
                    console.log(this.pagination);
                    console.log(this.pagination.lastPage);
                })
                .catch((error) =>{
                    console.warn(error)
                })
        }
    },
    created(){
        this.getPosts(1);
    }
}
</script>

<style>

</style>