<template>
    <div>
        <a style="color:orange" v-if="AuthModule.auth" href="#" @click="logout()" :loading="dialog.logout.loading" :disabled="dialog.logout.loading">{{TranslateModule.contents.logout}}</a>
        <a style="color:orange" v-else href="#" @click="dialog.login.display = true">{{TranslateModule.contents.login}}</a>
        <!-- Login form  -->
        <v-dialog v-model="dialog.login.display" style="z-index:10000" width="500">
            <v-card>
                <v-card-title class="headline primary darken-4 white--text" primary-title>
                    {{TranslateModule.contents.login}}
                </v-card-title>

                <v-card-text>
                    <v-form lazy-validation ref="loginform">
                        <v-text-field :label="TranslateModule.contents.email" v-model="form.login.email" :rules="form.rule.common"></v-text-field>
                        <v-text-field :label="TranslateModule.contents.password" type="password" v-model="form.login.password" :rules="form.rule.common"></v-text-field>
                    </v-form>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-btn text class="caption grey--text" @click="dialog.login.display = false;dialog.register.display = true">{{TranslateModule.contents.doesnthaveaccount}}</v-btn>
                    <v-spacer></v-spacer>
                    <v-tooltip top style="z-index:100000">
                        <template v-slot:activator="{ on }">
                            <v-btn v-on="on" icon href="/login/google"><v-icon>mdi-google</v-icon></v-btn>
                        </template>
                        <span>{{TranslateModule.contents.login_google}}</span>
                    </v-tooltip>
                    <v-btn color="primary" text @click="login()" :loading="dialog.login.loading" :disabled="dialog.login.loading">
                        {{TranslateModule.contents.login}}
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
        <!-- register form  -->
        <v-dialog v-model="dialog.register.display" style="z-index:10000" width="500">
            <v-card>
                <v-card-title class="headline primary darken-4 white--text" primary-title>
                    {{TranslateModule.contents.register}}
                </v-card-title>

                <v-card-text>
                    <v-form lazy-validation ref="registerform">
                        <v-text-field :label="TranslateModule.contents.name" v-model="form.register.name" :rules="form.rule.common"></v-text-field>
                        <v-text-field :label="TranslateModule.contents.email" v-model="form.register.email" :rules="form.rule.common"></v-text-field>
                        <v-text-field :label="TranslateModule.contents.password" type="password" v-model="form.register.password" :rules="form.rule.common"></v-text-field>
                        <v-text-field :label="TranslateModule.contents.confirm_password" type="password" v-model="form.register.password_confirmation" :rules="form.rule.password_confirmation"></v-text-field>
                    </v-form>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-btn text class="grey--text" @click="dialog.login.display = true;dialog.register.display = false">{{TranslateModule.contents.haveaccount}}</v-btn>
                    <v-spacer></v-spacer>
                    <v-btn color="primary" text @click="register()" :loading="dialog.register.loading" :disabled="dialog.register.loading">
                        {{TranslateModule.contents.register}}
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
import Swal from 'sweetalert2'
import {mapState} from 'vuex'
export default {
    data() {
        return {
            form:{
                rule:{
                    common:[v => !!v || this.TranslateModule.contents.required],
                    password_confirmation: [v => v == this.form.register.password || this.TranslateModule.contents.confirm_password_desc]
                },
                login:{
                    email: null,
                    password: null,
                },
                register:{
                    name: null,
                    email: null,
                    password: null,
                    password_confirmation: null
                }
            },
            dialog: {
                login: {
                    display: false,
                    loading: false
                },
                register: {
                    display: false,
                    loading: false
                },
                logout:{
                    loading: false
                }
            }
        };
    },
    computed:{
        ...mapState(['AuthModule','TranslateModule'])
    },
    mounted(){

    },
    methods:{
        login(){
            if(this.$refs.loginform.validate()){
                this.dialog.login.loading = true
                const access = {
                    ...this.form.login
                }
                this.$store.dispatch('login',access).then(res=>{
                    this.dialog.login.loading = this.dialog.login.display = false
                    Swal.fire(this.TranslateModule.contents.alert_ok,this.TranslateModule.contents.alert_login,'success')
                    window.location.href="/panel-investor"
                }).catch(err=>{
                    this.dialog.login.loading = false
                })
            }
        },
        register(){
            if(this.$refs.registerform.validate()){
                this.dialog.register.loading = true
                const access = {
                    ...this.form.register
                }
                this.$store.dispatch('register',access).then(res=>{
                    this.dialog.register.loading = this.dialog.register.display = false
                    Swal.fire(this.TranslateModule.contents.alert_ok,this.TranslateModule.contents.alert_register,'success')
                    window.location.href="/panel-investor"
                }).catch(err=>{
                    this.dialog.register.loading = false
                })
            }
        },
        logout(){
            this.dialog.logout.loading = true
            this.$store.dispatch('logout').then(res=>{
                this.dialog.logout.loading = false
                Swal.fire(this.TranslateModule.contents.alert_ok,this.TranslateModule.contents.alert_logout,'success')
                window.location.reload()
            })
        }
    }
};
</script>

<style></style>
