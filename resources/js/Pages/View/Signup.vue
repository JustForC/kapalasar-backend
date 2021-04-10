<template>
  <v-app>
  <div>
    <Navbar />
    <div class="my-3">
      <v-container>
        <v-card>
          <v-img src="../assets/pasar.svg" height="100%" width="100%">
            <v-container fluid class="fill-height pa-0">
              <v-row class="fill-height">
                <v-col cols="5" class="bg-msg d-none d-md-block">
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
                <v-col cols="12" md="7" class="bg-form">
                  <v-container class="">
                    <div class="px-md-16 py-5">
                      <h3 class="title text-md-h3 text-h4 text-center">
                        Daftar Di Kapalasar
                      </h3>
                      <div class="pt-5">


                        <!-- <v-form action="/register" method="post"> -->
                        <form @submit.prevent="submit">
                        <input type="hidden" name="_token" :value="csrf">
                          <div>
                            <span class="label font-weight-medium">Nama Lengkap</span>
                            <v-text-field
                              v-model="form.name"
                              :rules="[rules.required]"
                              placeholder="Nama Lengkap"
                              name = "name"
                              outlined
                              dense
                            ></v-text-field>
                            <!-- <div v-if="form.errors.name">{{ form.errors.name }}</div>
                            <v-alert
                              v-if="form.errors.name"
                            >{{form.errors.name}}
                            </v-alert> -->
                            <span class="label font-weight-medium">Email</span>
                            <v-text-field
                              v-model="form.email"
                              :rules="[rules.required, rules.email]"
                              placeholder="Email"
                              name = "email"
                              outlined
                              dense
                            ></v-text-field>
                            <!-- <v-alert
                              v-if="form.errors.email"
                            >asdsada{{form.errors.email}}
                            </v-alert> -->
                            <span class="label font-weight-medium"
                              >Nomor Telepon</span
                            >
                            <v-text-field
                              v-model="form.phone"
                              :rules="[rules.required, rules.onlyNum]"
                              placeholder="Nomor Telepon"
                              name = "phone"
                              outlined
                              dense
                            ></v-text-field>
                            <v-row>
                            </v-row>
                            <span class="label font-weight-medium"
                              >Password</span
                            >
                            <v-text-field
                              v-model="form.password"
                              :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                              :rules="[rules.required, rules.min]"
                              :type="show ? 'text' : 'password'"
                              hint="At least 8 characters"
                              @click:append="show = !show"
                              outlined
                              name = "password"
                              dense
                              placeholder="Password"
                            ></v-text-field>
                          </div>
                          <div class="pb-3 text-center">
                            <v-btn type="submit" color="#a6cb26" dark>Daftar</v-btn>
                          </div>
                        </form>
                        <!-- </v-form> -->
                        <div class="">
                          Punya akun?
                          <a href="/login">
                            <span class="label font-weight-medium">Masuk</span>
                          </a>
                        </div>
                      </div>
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
  props: {
    name: String,
    email: String,
    phone: String,
    password: String,
    // errors: Object
  },
  props: ['errors'],
  data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      form: this.$inertia.form({
          name: '',
          email: '',
          phone: '',
          password: '',
      }),
      show: false,
      rules: {
        required: value => !!value || "Harus diisi",
        min: v => v.length >= 8 || "Minimal 8 karakter",
        email: value => {
          const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return pattern.test(value) || "Penulisan email tidak sesuai";
        },
        onlyNum: value => {
          const pattern = /^[0-9]*$/;
          return pattern.test(value) || "Harus Angka";
        }
      }
    };
  },
  methods: {
    submit() {
      this.form.post(this.route('register'), {
        preserveScroll: true,
      });
      // console.log(this.form.errors);
      // console.log(this.props.form.errors);
    }
  },
  // mounted() {
  //   console.log(this.name);
  // }
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
