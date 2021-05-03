<template>
  <v-app>
    <div>
      <Navbar :check="check" :user="user"/>
      <!-- Alur Pembayaran -->
      <v-content>
        <div>
          <v-container>
            <v-card color="#a6cb26">
              <v-container>
                <span class="white--text text-h6 font-weight-medium"
                  >Terimakasih atas kepercayaan Anda</span
                >
              </v-container>
            </v-card>
            <v-alert
              class="my-5"
              border="top"
              colored-border
              color="#F99F39"
              elevation="2"
            >
              <v-container>
                <span class="text-h6 font-weight-medium text-center" style="color: #54595f">
                  Transaksi Anda sedang diproses, jika ada yang ingin ditanyakan hubungi: <br>
                  +62 859 4722 4853
                </span>
                <div class="mx-md-16">
                  <v-container>
                    
                  </v-container>
                </div>
              </v-container>
            </v-alert>
            <div class="text-center">
              <inertia-link href="/">
               <v-btn color="#a6cb26" dark>
                Selesai
              </v-btn>
              </inertia-link>
            </div>
          </v-container>
        </div>
      </v-content>
      <Footer />
    </div>
  </v-app>
</template>

<script>
import Footer from "../components/Footer.vue";
import Navbar from "../components/Navbar.vue";
import ProductFinalList from "../components/ProductFinalList.vue";
import { Inertia } from '@inertiajs/inertia'

export default {
  components: { Navbar, Footer, ProductFinalList },
  props: {
    check: Boolean,
    user: Object,
    real_vouchers: Array,
    all_products: Array
  },
  data() {
    return {
      Inertia,
    };
  },
  computed: {
  },
  methods: {
    
  },
  mounted() {
  }
};
</script>

<style scoped>
.label {
  color: #c4c4c4;
}
</style>
