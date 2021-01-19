<template>
<section class="v6">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section text-center">
                    <h1 class="title">Berita terbaru</h1>
                </div>
            </div>
        </div>

        <div class="blog-carosuel-wrap" v-if="posts != null">
            <div class="row">
                <article class="col-md-4 entry border-shadow clearfix" v-for="post in posts.data" :key="post.id">
                    <div class="entry-border clearfix">
                        <div class="featured-post">
                            <a href="#" @click="$router.push(`/post/${post.id}`)">
                                <img
                                    :src="`http://cjip.jatengprov.go.id/storage/${post.image}`"
                                    alt="image"
                            /></a>
                        </div>
                        <!-- /.feature-post -->

                        <div class="container">
                            <span class="category" v-if="post.category">{{post.category.name}}</span>

                            <h4>
                                <a href="#" @click="$router.push(`/post/${post.id}`)"
                                    >{{post.title}}</a
                                >
                            </h4>

                            <p>{{post.excerpt}}</p>

                            <div class="meta-data style2 clearfix">
                                <ul class="meta-post clearfix">
                                    <li class="day-time">
                                        <span>{{ post.created_at | moment("LLLL") }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.contetn-post -->
                    </div>
                    <!-- /.entry-border -->
                </article>
                <v-pagination
                    color="#F2C21A"
                    v-model="posts.current_page"
                    :length="posts.last_page"
                    @next="nextPage"
                    @previous="prevPage"
                    @input="inputPage"
                ></v-pagination>
            </div>
        </div>
    </div>
</section>
</template>

<script>
import moment from 'moment'
export default {
    data(){
        return {
            posts: null,
        }
    },
    mounted(){
        this.posts == null ? this.getPosts() : null
    },
    methods:{
        moment,
        getPosts(){
            return new Promise((resolve,reject)=>{
                axios.get('/api/v1/post').then(res=>{
                    this.posts = res.data
                    resolve(res)
                }).catch(err=>{
                    reject(err)
                })
            })
        },
        nextPage(){
            return new Promise((resolve,reject)=>{
                axios.get(this.posts.next_page_url).then(res=>{
                    this.posts = res.data
                    resolve(res)
                }).catch(err=>{
                    reject(err)
                })
            })
        },
        prevPage(){
            return new Promise((resolve,reject)=>{
                axios.get(this.posts.prev_page_url).then(res=>{
                    this.posts = res.data
                    resolve(res)
                }).catch(err=>{
                    reject(err)
                })
            })
        },
        inputPage(page){
            return new Promise((resolve,reject)=>{
                axios.get(`/api/v1/post?page=${page}`).then(res=>{
                    this.posts = res.data
                    resolve(res)
                }).catch(err=>{
                    reject(err)
                })
            })
        }
    }
}
</script>

<style>

</style>
