<template>
    <div>
        <!-- Page title -->
        <div class="page-title parallax parallax1" style="padding: 10px 0 30px">
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
                                    ><a href="#" @click="$router.push('/')">Home</a>
                                </li>
                                <li>{{TranslateModule.contents.menu5}}</li>
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

        <!-- Services Details -->
        <section class="flat-row services-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="item-wrap">
                            <div class="item item-details">
                                <div class="featured-item">
                                        <img
                                            style="width:100%"
                                            :src="
                                                `http://cjip.jatengprov.go.id/storage/${post.image}`
                                            "
                                            alt="image"
                                        />
                                </div>
                                <!-- /.feature-post -->
                                <div class="content-item">
                                    <h2 class="title-item">{{ post.title }}</h2>
                                    <div v-html="post.body"></div>
                                </div>
                                <!-- /.content-item -->
                            </div>
                            <!-- /.item -->
                        </div>
                        <!-- /.item-wrap -->
                    </div>
                    <!-- /.Col-lg-9 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <v-overlay :value="loading">
            <v-progress-circular indeterminate size="64"></v-progress-circular>
        </v-overlay>
    </div>
</template>

<script>
export default {
    props: {
        postId: null
    },
    data() {
        return {
            post: null,
            loading: false
        };
    },
    mounted() {
        this.getPost();
    },
    methods: {
        getPost() {
            return new Promise((resolve, reject) => {
                this.loading = true
                axios
                    .get(`/api/v1/post/${this.postId}`)
                    .then(res => {
                        this.post = res.data;
                        this.loading = false
                        resolve(res);
                    })
                    .catch(err => {
                        this.loading = false
                        reject(err);
                    });
            });
        }
    }
};
</script>

<style></style>
