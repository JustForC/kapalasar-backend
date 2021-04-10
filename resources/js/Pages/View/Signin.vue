<template>
  <v-app>
  <div>
    <Navbar/>
    <div class="my-3">
      <v-container>
        <v-card>
          <v-img src="../assets/pasar.svg" max-height="721" width="100%">
            <v-container fluid class="fill-height pa-0">
              <v-row class="fill-height">
                <v-col md="6" class="bg-form">
                  <v-container class="">
                    <div class="pa-md-16 py-5">
                      <h3 class="title text-md-h3 text-h4 text-center">
                        Masuk ke akunmu
                      </h3>
                      <div class="pt-md-16 pt-8 px-md-16 px-10">
                        <v-form action = '/login' method = 'post'>
                        <input type="hidden" name="_token" :value="csrf">
                          <div>
                            <span class="label font-weight-medium">Email</span>
                            <v-text-field
                              v-model="email"
                              name="email"
                              placeholder="Email"
                              outlined
                              dense
                              :error-messages="$page.errors.email[0]"
                              v-if="$page.errors.email"
                            ></v-text-field>
                            <v-text-field
                              v-model="email"
                              name="email"
                              placeholder="Email"
                              outlined
                              dense
                              v-else
                            ></v-text-field>
                          </div>
                          <div>
                            <span class="label font-weight-medium">
                              Password
                              </span>
                            <v-text-field
                              v-model="password"
                              :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                              :type="show ? 'text' : 'password'"
                              hint="At least 8 characters"
                              @click:append="show = !show"
                              outlined
                              name = "password"
                              dense
                              placeholder="Password"
                              :error-messages="$page.errors.password[0]"
                              v-if="$page.errors.password"
                            ><v-icon></v-icon></v-text-field>
                            <v-text-field
                              v-model="password"
                              :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                              :type="show ? 'text' : 'password'"
                              hint="At least 8 characters"
                              @click:append="show = !show"
                              outlined
                              name = "password"
                              dense
                              placeholder="Password"
                              v-else
                            ><v-icon></v-icon></v-text-field>
                          </div>
                          <div class="font-weight-medium grey--text">
                            Lupa Password?
                          </div>
                          <div class="pt-5 text-center">
                            <v-btn type="submit" color="#a6cb26" dark>Masuk</v-btn>
                          </div>
                        </v-form>
                        <div class="pt-5">
                          Tidak punya akun?
                          <a href="/register">
                            <span class="label font-weight-medium">Daftar</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </v-container>
                </v-col>
                <v-col md="6" class="bg-msg d-none d-md-block">
                  <v-container class="fill-height">
                    <div class="px-14">
                      <h4 class="text-h4 white--text ">
                        Memenuhi Kebutuhan Memasak Harianmu!
                      </h4>
                      <v-divider class="mt-2"></v-divider>
                      <p class="white--text text-body-1 mt-2">
                        Memberikan produk pilihan terbaik dan segar yang kami
                        ambil dari pasar tradisional. Pesan hari ini, besok pagi
                        kami antar langsung ke rumah.
                      </p>
                    </div>
                    <div class="d-flex align-self-end mx-auto py-3">
                      <v-img
                        src="../assets/kapalasar-1024x250.png"
                        max-width="200px"
                        class="mx-auto"
                      ></v-img>
                    </div>
                  </v-container>
                </v-col>
              </v-row>
            </v-container>
          </v-img>
        </v-card>
      </v-container>
    </div>
    <Footer />
  </div>
  </v-app>
</template>

<script>
import Footer from "../components/Footer.vue";
import Navbar from "../components/Navbar.vue";

export default {
  components: { Navbar, Footer },
  data() {
    return {
      show: false,
      email: "",
      password: "",
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      }
    }
};
</script>

<style scoped>
.title {
  color: #a6cb26;
}
.label {
  color: #a6cb26;
}
.v-text-field--outlined >>> fieldset {
  border-color: #a6cb26;
}
.bg-form {
  background: white;
}
.bg-msg {
  background: rgba(0, 0, 0, 0.7);
}
.v-divider {
  border-color: #a6cb26;
  border-width: 3px 0 0 0;
  max-width: 50%;
}
</style>
