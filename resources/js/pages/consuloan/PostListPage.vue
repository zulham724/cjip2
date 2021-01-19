<template>
    <div>
        <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="section-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">{{TranslateModule.contents.menu5}}</h1>
                        </div>
                        <!-- /.page-title-captions -->
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home">
                                    <i class="fa fa-home"></i
                                    ><a href="/home#/">Home</a>
                                </li>
                                <li><a>{{TranslateModule.contents.menu5}}</a></li>
                            </ul>
                        </div>
                        <!-- /.breadcrumbs -->
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.page-title -->
        <!-- Blog posts -->
        <section class="flat-row blog-grid" v-if="posts != null">
            <div class="container">
                <div class="post-wrap post-grid wrap-column clearfix">
                    <transition-group name="fadeLeft">
                    <article class="entry border-shadow flat-column3 clearfix" style="height:500px" v-for="post in posts.data" :key="post.id">
                        <div class="entry-border clearfix">
                            <div class="featured-post">
                                <a :href="`/berita/${post.slug}`">
                                    <img
                                        style="height:200px;width:100%"
                                        :src="`http://cjip.jatengprov.go.id/storage/${post.image}`"
                                        alt="image"
                                /></a>
                            </div>
                            <!-- /.feature-post -->
                            <div class="content-post">
                                <span class="category" v-if="post.category">{{post.category.name}}</span>
                                <h3 class="title-post">
                                    <a :href="`/berita/${post.slug}`" v-if="post.title">{{post.title.substring(0,50)}}{{post.title.length > 50 ? '...' : null}}</a
                                    >
                                </h3>
                                <div class="caption grey--text" v-if="post.excerpt">{{post.excerpt.substring(0,200)}}{{post.excerpt.length > 200 ? '...' : null}}</div>
                                <div class="meta-data style2 clearfix">
                                    <ul class="meta-post clearfix" style="padding-left:0">
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
                    </transition-group>
                </div>
                <v-pagination
                    color="#F2C21A"
                    v-model="posts.current_page"
                    :length="posts.last_page"
                    @next="nextPage"
                    @previous="prevPage"
                    @input="inputPage"
                ></v-pagination>
            </div>
            <!-- /.container -->
        </section>
    </div>
</template>

<script>
import moment from 'moment'
import {mapState} from 'vuex'
export default {
    data(){
        return {
            posts: null,
        }
    },
    mounted(){
        this.posts == null ? this.getPosts() : null
    },
    computed: {
        ...mapState(['TranslateModule'])
    },
    watch: {
        'TranslateModule.to': {
            handler: function(){
                this.inputPage(this.posts.current_page)
            },
            deep: true
        }
    },
    methods:{
        moment,
        getPosts(){
            return new Promise((resolve,reject)=>{
                axios.get('/api/v1/post').then(res=>{
                    let posts = res.data.data.map(item=>{
                        this.$store.dispatch('TranslateModule/translate',item.title).then(res=>{
                            item.title = res.text[0]
                        })

                        this.$store.dispatch('TranslateModule/translate',item.excerpt).then(res=>{
                            item.excerpt = res.text[0]
                        })

                        item.category ? this.$store.dispatch('TranslateModule/translate',item.category.name).then(res=>{
                            item.category.name = res.text[0]
                        }) : null

                        return item
                    })

                    this.posts = {...res.data, data: posts}
                    resolve(res)
                }).catch(err=>{
                    reject(err)
                })
            })
        },
        nextPage(){
            return new Promise((resolve,reject)=>{
                axios.get(this.posts.next_page_url).then(res=>{
                    let posts = res.data.data.map(item=>{
                        this.$store.dispatch('TranslateModule/translate',item.title).then(res=>{
                            item.title = res.text[0]
                        })

                        this.$store.dispatch('TranslateModule/translate',item.excerpt).then(res=>{
                            item.excerpt = res.text[0]
                        })

                        item.category ? this.$store.dispatch('TranslateModule/translate',item.category.name).then(res=>{
                            item.category.name = res.text[0]
                        }) : null

                        return item
                    })

                    this.posts = {...res.data, data: posts}
                    resolve(res)
                }).catch(err=>{
                    reject(err)
                })
            })
        },
        prevPage(){
            return new Promise((resolve,reject)=>{
                axios.get(this.posts.prev_page_url).then(res=>{
                    let posts = res.data.data.map(item=>{
                        this.$store.dispatch('TranslateModule/translate',item.title).then(res=>{
                            item.title = res.text[0]
                        })

                        this.$store.dispatch('TranslateModule/translate',item.excerpt).then(res=>{
                            item.excerpt = res.text[0]
                        })

                        item.category ? this.$store.dispatch('TranslateModule/translate',item.category.name).then(res=>{
                            item.category.name = res.text[0]
                        }) : null

                        return item
                    })

                    this.posts = {...res.data, data: posts}
                    resolve(res)
                }).catch(err=>{
                    reject(err)
                })
            })
        },
        inputPage(page){
            return new Promise((resolve,reject)=>{
                axios.get(`/api/v1/post?page=${page}`).then(res=>{
                    let posts = res.data.data.map(item=>{
                        this.$store.dispatch('TranslateModule/translate',item.title).then(res=>{
                            item.title = res.text[0]
                        })

                        this.$store.dispatch('TranslateModule/translate',item.excerpt).then(res=>{
                            item.excerpt = res.text[0]
                        })

                        item.category ? this.$store.dispatch('TranslateModule/translate',item.category.name).then(res=>{
                            item.category.name = res.text[0]
                        }) : null

                        return item
                    })

                    this.posts = {...res.data, data: posts}
                    resolve(res)
                }).catch(err=>{
                    reject(err)
                })
            })
        }
    }
}
</script>

<style></style>
