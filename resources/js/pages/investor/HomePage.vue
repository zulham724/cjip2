<template>
    <div>
        <v-app-bar dark app>
            <v-toolbar-title>Dashboard</v-toolbar-title>
        </v-app-bar>
        <v-container>
            <v-row justify="center" align="center">
                <v-col cols="8">
                    <v-card class="mt-5 mb-5" dark style="background-color:#15181C;border-color:grey;border-style:solid;border-width:thin">
                        <v-card-title>
                            <div class="title font-weight-bold">Profile anda</div>
                            <v-spacer></v-spacer>
                            <v-btn
                                rounded
                                outlined
                                :loading="loading"
                                :disabled="loading"
                                @click="updateProfile()"
                            >Submit</v-btn>
                        </v-card-title>
                        <v-divider></v-divider>
                        <v-card-text>
                            <v-form lazy-validation ref="form">
                                <v-row>
                                    <v-col cols="6">
                                        <v-text-field
                                            rounded
                                            outlined
                                            label="Nama"
                                            :rules="rule"
                                            v-model="
                                                auth.profile
                                                    .investor_name
                                            "
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field
                                            rounded
                                            outlined
                                            label="Position"
                                            :rules="rule"
                                            v-model="
                                                auth.profile.jabatan
                                            "
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field
                                            rounded
                                            outlined
                                            label="Company Name"
                                            :rules="rule"
                                            v-model="
                                                auth.profile
                                                    .nama_perusahaan
                                            "
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field
                                            rounded
                                            outlined
                                            label="Legal Entity Status"
                                            :rules="rule"
                                            v-model="
                                                auth.profile
                                                    .badan_hukum
                                            "
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field
                                            rounded
                                            outlined
                                            label="Phone"
                                            :rules="rule"
                                            v-model="
                                                auth.profile.phone
                                            "
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="6">
                                        <v-text-field
                                            rounded
                                            outlined
                                            label="Country"
                                            :rules="rule"
                                            v-model="
                                                auth.profile.country
                                            "
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <div class="caption grey--text">
                                            Bidang Usaha
                                        </div>
                                        <v-autocomplete
                                            rounded
                                            outlined
                                            :items="cjibf_sectors"
                                            item-text="name"
                                            item-value="name"
                                            :rules="rule"
                                            v-model="
                                                auth.profile
                                                    .bidang_usaha
                                            "
                                        ></v-autocomplete>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-textarea
                                            rounded
                                            outlined
                                            label="Company Address"
                                            :rules="rule"
                                            v-model="
                                                auth.profile.alamat
                                            "
                                        ></v-textarea>
                                    </v-col>
                                </v-row>
                            </v-form>
                        </v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn
                            rounded
                            outlined
                            :loading="loading"
                            :disabled="loading"
                            @click="updateProfile()"
                            >Submit</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
import { mapState } from "vuex";
import Swal from "sweetalert2";
export default {
    data() {
        return {
            loading: false,
            rule: [v => !!v || "Harus diisi"],
            cjibf_sectors: [],
            auth: null
        };
    },
    computed: {
        ...mapState(["AuthModule"])
    },
    created() {
        this.auth = this.AuthModule.auth
        this.auth.profile ? null : this.auth.profile = {}
        this.cjibf_sectors.length == 0 ? this.getCjibfSectors() : null
    },
    mounted() {},
    methods: {
        getCjibfSectors() {
            this.$store
                .dispatch("getCjibfSectors")
                .then(res => {
                    this.cjibf_sectors = res.data;
                })
                .catch(err => {});
        },
        updateProfile() {
            if (this.$refs.form.validate()) {
                this.loading = true;
                this.$store
                    .dispatch("updateProfile", this.auth)
                    .then(res => {
                        this.loading = false;
                        Swal.fire("Oke", "Berhasil diubah", "success");
                    })
                    .catch(err => {
                        this.loading = false;
                        Swal.fire("Aduh", "Terjadi kesalahan", "error");
                    });
            }
        }
    }
};
</script>

<style></style>
