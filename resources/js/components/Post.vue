<template>
    <div class="col-4">
        <div class="card mb-4">
            <img :src="post.image_url" class="card-img-top" :alt="`Image of post` + post.title">
            <div class="card-body">
                <h5 class="card-title">
                    {{ post.title }}
                </h5>
                <p class="class-subtitle">
                    by: {{ post.user.name }}
                </p>
                <p class="card-text">
                    {{ post.content.substring(0, 100) + ".." }}
                </p>
                <a class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Post',
    components:{

    },
    props: ['post']
}
</script>

<style lang="scss" scoped>
div.card{
    //height: 80vh;
    //overflow: scroll;
    p.card-text{
        max-height: 4rem;
        font-size: 0.7rem;
    }
}
</style>