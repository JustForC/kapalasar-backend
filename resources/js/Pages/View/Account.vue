<template>
  <div>
    <navbar />
    <v-container>
      <v-tabs vertical color="#a6cb26">
        <v-tab>
          <v-icon left>
            mdi-account
          </v-icon>
          Profile
        </v-tab>
        <v-tab>
          <v-icon left>
            mdi-history
          </v-icon>
          Riwayat Transaksi
        </v-tab>
        <v-btn text elevation="0" tile color="red">
          <v-icon>mdi-logout</v-icon>
          Keluar
        </v-btn>
        <v-tab-item>
          <v-card color="#fafafa" tile>
            <v-card color="#a6cb26" tile elevation="0">
              <v-container>
                <span class="white--text text-h6 font-weight-medium"
                  >Profile</span
                >
              </v-container>
            </v-card>
            <v-container>
              <v-row>
                <v-col>
                  <v-form>
                    <div class="px-16 pt-8">
                      <span class="label font-weight-medium">Nama Lengkap</span>
                      <v-text-field
                        v-model="name"
                        placeholder="Nama Lengkap"
                        outlined
                        dense
                      ></v-text-field>
                      <span class="label font-weight-medium">Email</span>
                      <v-text-field
                        v-model="email"
                        placeholder="Email"
                        outlined
                        dense
                      ></v-text-field>
                      <span class="label font-weight-medium"
                        >Nomor Telepon</span
                      >
                      <v-text-field
                        v-model="telepon"
                        placeholder="Nomor Telepon"
                        outlined
                        dense
                      ></v-text-field>
                      <v-row>
                        <v-col class="">
                          <span class="label font-weight-medium">Usia</span>
                          <v-text-field
                            v-model="usia"
                            placeholder="Usia"
                            outlined
                            dense
                          ></v-text-field>
                        </v-col>
                        <v-col class="">
                          <span class="label font-weight-medium"
                            >Pekerjaan</span
                          >
                          <v-text-field
                            v-model="pekerjaan"
                            placeholder="Pekerjaan"
                            outlined
                            dense
                          ></v-text-field>
                        </v-col>
                      </v-row>
                      <span class="label font-weight-medium">Alamat</span>
                      <v-text-field
                        v-model="alamat"
                        placeholder="Alamat"
                        outlined
                        dense
                      ></v-text-field>
                      <v-row>
                        <v-col class="">
                          <span class="label font-weight-medium"
                            >Kelurahan</span
                          >
                          <v-select
                            v-model="kelurahan"
                            placeholder="Kelurahan"
                            dense
                            outlined
                            menu-props="auto"
                          ></v-select>
                        </v-col>
                        <v-col class="">
                          <span class="label font-weight-medium"
                            >Kecamatan</span
                          >
                          <v-select
                            v-model="kecamatan"
                            placeholder="Kecamatan"
                            dense
                            outlined
                            menu-props="auto"
                          ></v-select>
                        </v-col>
                      </v-row>
                      <span class="label font-weight-medium">Password</span>
                      <v-text-field
                        v-model="password"
                        hint="At least 8 characters"
                        outlined
                        dense
                        placeholder="Password"
                      ></v-text-field>
                    </div>
                    <div class="pb-3 text-center">
                      <v-btn color="#a6cb26" dark>Simpan</v-btn>
                    </div>
                  </v-form>
                </v-col>
              </v-row>
            </v-container>
          </v-card>
        </v-tab-item>
        <v-tab-item>
          <v-card color="#fafafa" tile min-height="700">
            <v-card color="#a6cb26" tile elevation="0">
              <v-container>
                <span class="white--text text-h6 font-weight-medium"
                  >Riwayat Transaksi</span
                >
              </v-container>
            </v-card>
            <v-container>
              <div v-for="(item, i) in dataTransaction" :key="i">
                <transaction-list :transaction="item" :num="i" />
              </div>
            </v-container>
          </v-card>
        </v-tab-item>
      </v-tabs>
    </v-container>
    <Footer />
  </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import Footer from "../components/Footer.vue";
import TransactionList from "../components/TransactionList.vue";

export default {
  components: {
    Navbar,
    Footer,
    TransactionList
  },
  
};
</script>

<style scoped>
@import 'vuetify/dist/vuetify.min.css';
.label {
  color: #a6cb26;
}
.v-text-field--outlined >>> fieldset {
  border-color: #a6cb26;
}
</style>
