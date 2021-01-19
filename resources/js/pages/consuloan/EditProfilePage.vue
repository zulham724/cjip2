<template>
<div>
    <v-container>
        <v-row justify="center" align="center">
            <v-col cols="8">
                <v-form lazy-validation ref="form">
                    <v-row>
                        <v-col cols="6">
                            <v-text-field label="Nama" :rules="rule" v-model="auth.profile.investor_name"></v-text-field>
                        </v-col>
                        <v-col cols="6">
                            <v-text-field label="Position" :rules="rule" v-model="auth.profile.jabatan"></v-text-field>
                        </v-col>
                        <v-col cols="6">
                            <v-text-field label="Company Name" :rules="rule" v-model="auth.profile.nama_perusahaan"></v-text-field>
                        </v-col>
                        <v-col cols="6">
                            <v-text-field label="Legal Entity Status" :rules="rule" v-model="auth.profile.badan_hukum"></v-text-field>
                        </v-col>
                        <v-col cols="6">
                            <v-text-field label="Phone" :rules="rule" v-model="auth.profile.phone"></v-text-field>
                        </v-col>
                        <v-col cols="6">
                            <v-text-field label="Country" :rules="rule" v-model="auth.profile.country"></v-text-field>
                        </v-col>
                        <v-col cols="12">
                            <div class="caption grey--text">Bidang Usaha</div>
                            <v-autocomplete :items="cjibf_sectors" item-text="name" item-value="name" :rules="rule" v-model="auth.profile.bidang_usaha"></v-autocomplete>
                        </v-col>
                        <v-col cols="12">
                            <v-textarea label="Company Address" :rules="rule" v-model="auth.profile.alamat"></v-textarea>
                        </v-col>
                    </v-row>
                    <v-row justify="end" align="center">
                        <v-btn color="warning" :loading="loading" :disabled="loading" @click="updateProfile()">Submit</v-btn>
                    </v-row>
                </v-form>
            </v-col>
        </v-row>
    </v-container>
</div>
</template>

<script>
import {mapState} from 'vuex'
import Swal from 'sweetalert2'
export default {
    data(){
        return {
            loading: false,
            rule:[v => !!v || 'Harus diisi'],
            cjibf_sectors:[],
            auth: null
        }
    },
    computed:{
        ...mapState(['AuthModule'])
    },
    created(){
        this.auth = this.AuthModule.auth
        this.auth.profile ? null : this.auth.profile = {}
        this.cjibf_sectors.length == 0 ? this.getCjibfSectors() : null
    },
    mounted(){
    },
    methods:{
        getCjibfSectors(){
            this.$store.dispatch('getCjibfSectors').then(res=>{
                this.cjibf_sectors = res.data
            }).catch(err=>{

            })
        },
        updateProfile(){
            if(this.$refs.form.validate()){
                this.loading = true
                this.$store.dispatch('updateProfile',this.auth).then(res=>{
                    this.loading = false
                    Swal.fire('Oke','Berhasil diubah','success')
                }).catch(err=>{
                    this.loading = false
                    Swal.fire('Aduh','Terjadi kesalahan','error')
                })
            }
        }
    }
}
</script>

<style>

</style>
