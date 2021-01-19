<template>
<div v-if="profile != null">
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title">{{profile.kabkota.namakota[0].nama}}</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a>Home</a></li>
                            <li><a>Projek</a></li>
                            <li>Detail Profile Kabupaten</li>
                        </ul>
                    </div><!-- /.breadcrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.page-title -->

    <!-- Blog posts -->
    <section class="flat-row project-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-post">
                        <div class="single-text1">
                            <h2>{{profile.kabkota.namakota[0].nama}}</h2>
                            <p>{{profile.desc_profil}}</p>
                            <div class="project-info">
                                <h4>Ringkasan</h4>
                                <ul>
                                    <li><span class="name">Luas Kab/Kota</span>:<span>{{profile.luas}}</span></li>
                                    <li><span class="name">Jarak ke Semarang</span>:<span>{{profile.jarak_ke_smg}}</span></li>
                                    <li><span class="name">RTRW</span>:<span>{{profile.rtrw}}</span></li>
                                    <li><span class="name">Pendapatan Perkapita</span>:<span>{{profile.grdp}}</span></li>
                                    <li><span class="name">Pertumbuhan Ekonomi</span>:<span>{{profile.pert_ekonomi}}</span></li>
                                    <li><span class="name">Tingkat Inflasi</span>:<span>{{profile.inflasi}}</span></li>
                                    <li><span class="name">Total Populasi</span>:<span>{{profile.populasi}}</span></li>
                                    <li><span class="name">Ketersediaan Angkatan Kerja</span>:<span>{{profile.angk_kerja}}</span></li>
                                    <li><span class="name">UMK</span>:<span>{{profile.umr}}</span></li>
                                    <li><span class="name">Komposisi Usia</span>:<span>{{profile.komp_usia}}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-md-6 -->
                <div class="col-lg-6">
                    <div class="featured-single">

                        <img :src="`${AuthModule.storageUrl}/${profile.foto}`" alt="image" class="img1">
                    </div>
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
</div>
</template>

<script>
import {mapState} from 'vuex'
export default {
    props: {
        profilKabupatenId: null
    },
    data(){
        return {
            profile: null
        }
    },
    computed:{
        ...mapState(['AuthModule'])
    },
    mounted(){
        this.profile == null ? this.getProfile() : null
    },
    methods:{
        getProfile(){
            this.$store.dispatch('ProfileKabupatenModule/getProfile',this.profilKabupatenId).then(res=>{
                this.profile = res.data
            })
        }
    }
}
</script>

<style>

</style>
