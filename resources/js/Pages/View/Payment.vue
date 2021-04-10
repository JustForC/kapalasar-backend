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
                  >Pembayaran</span
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
                <span class="text-h6 font-weight-medium" style="color: #54595f">
                  Proses Pembayaran
                </span>
                <div class="mx-md-16">
                  <v-container>
                    <v-timeline align-top dense>
                      <v-timeline-item color="#F99F39" fill-dot small>
                        <v-row class="pt-1">
                          <v-col>
                            <strong
                              class="label text-md-h6 text-subtitle-1 font-weight-medium"
                            >
                              Segera lakukan pembayaran dan kirim bukti pembayaran
                              sebelum pukul :
                            </strong>
                            <div class="text-h5 font-weight-bold mt-3">
                              15 : 00
                            </div>
                          </v-col>
                        </v-row>
                      </v-timeline-item>
                      <v-timeline-item color="#F99F39" fill-dot small>
                        <v-row class="pt-1">
                          <v-col>
                            <strong
                              class="label text-md-h6 text-subtitle-1 font-weight-medium"
                            >
                              Silahkan lakukan pembayaran melalui transfer ke :
                            </strong>
                            <v-row>
                              <v-col cols="12" md="2">
                                <v-img
                                  class="my-md-2"
                                  src="../assets/atm.png"
                                  max-width="65"
                                ></v-img>
                              </v-col>
                              <v-col>
                                <strong
                                  class="label text-md-h6 text-subtitle-1 font-weight-medium "
                                  >Nomor Rekening :
                                </strong>
                                <div
                                  class="text-md-h6 text-subtitle-1 font-weight-bold"
                                >
                                  755X XXX XXX
                                </div>
                              </v-col>
                            </v-row>
                          </v-col>
                        </v-row>
                        <v-row class="pt-1">
                          <v-col>
                            <strong
                              class="label text-md-h6 text-subtitle-1 font-weight-medium"
                            >
                              Nama Pemilik Rekening :
                            </strong>
                            <div
                              class="text-md-h6 text-subtitle-1 font-weight-bold"
                            >
                              Kapalasar
                            </div>
                          </v-col>
                        </v-row>
                        <v-row class="pt-1">
                          <v-col>
                            <strong
                              class="label text-md-h6 text-subtitle-1 font-weight-medium"
                            >
                              Total Pembayaran :
                            </strong>
                            <div
                              class="text-md-h6 text-subtitle-1 font-weight-bold"
                            >
                              {{ parseRupiah(totalPrice) }}
                            </div>
                          </v-col>
                        </v-row>
                      </v-timeline-item>
                      <v-timeline-item color="#F99F39" fill-dot small>
                        <v-row class="pt-1">
                          <v-col>
                            <strong
                              class="label text-md-h6 text-subtitle-1 font-weight-medium"
                            >
                              Jika Sudah Membayar Silahkan Upload Bukti Pembayaran
                            </strong>
                            <div class="mt-3">
                              <v-btn
                                color="#A6CB26"
                                class="text-none"
                                depressed
                                dark
                                :loading="isSelecting"
                                @click="onButtonClick"
                              >
                                <v-icon left>
                                  mdi-upload
                                </v-icon>
                                {{ buttonText }}
                              </v-btn>
                              <input
                                ref="uploader"
                                class="d-none"
                                type="file"
                                accept="image/*"
                                @change="onFileChanged"
                              />
                            </div>
                          </v-col>
                        </v-row>
                      </v-timeline-item>
                    </v-timeline>
                  </v-container>
                </div>
              </v-container>
            </v-alert>
            <!-- Final Cart List -->
            <v-alert
              class="my-5"
              border="top"
              colored-border
              color="#F99F39"
              elevation="2"
            >
              <v-container>
                <span class="text-h6 font-weight-medium" style="color: #54595f"
                  >Pesanan Anda</span
                >
                <div class="mx-md-16">
                  <div v-for="(product, i) in listFinalCart" :key="i">
                    <ProductFinalList :listFinalCart="product" />
                    <v-divider class="mt-4"></v-divider>
                  </div>
                </div>
              </v-container>
            </v-alert>
            <div class="text-center">
              <v-btn color="#a6cb26" dark @click="finishPayment">
                Selesai
              </v-btn>
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
    real_products: Array,
    real_vouchers: Array
  },
  data() {
    return {
      Inertia,
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      defaultButtonText: "Upload Bukti Transfer",
      selectedFile: null,
      isSelecting: false,
      listFinalCart: [],
      totalPrice: 0
    };
  },
  computed: {
    buttonText() {
      return this.selectedFile
        ? this.selectedFile.name
        : this.defaultButtonText;
    }
  },
  methods: {
    parseRupiah(strMoney) {
      return parseInt(strMoney).toLocaleString("id", {
        style: "currency",
        currency: "IDR"
      });
    },
    getProductList() {
      const state = this.$store.state.cart.listCarts;
      const tempState = this.$store.state.cart.tempCart;

      this.real_products.forEach(product => {
        state.forEach(item => {
          if (item.id == product.id) {
            const cart = {
              qty: item.qty,
              ...product
            };
            // console.log(cart);

            tempState.forEach(item => {
              if (item == cart.id) {
                this.listFinalCart.push(cart);
              }
              // console.log(this.listFinalCart);
            });
          }
        });
      });
    },
    getTotalPrice() {
      this.totalPrice = this.$store.state.cart.totalPrice;
    },
    onButtonClick() {
      this.isSelecting = true;
      window.addEventListener(
        "focus",
        () => {
          this.isSelecting = false;
        },
        { once: true }
      );

      this.$refs.uploader.click();
    },
    onFileChanged(e) {
      this.selectedFile = e.target.files[0];

    },
    finishPayment() {
      const cart = this.$store.state.cart.listCarts;
      // this.$store.commit("cart/REPLACE", []);

      const totalPrice = this.$store.state.cart.totalPrice;
      // this.$store.commit("cart/SET_TOTAL_PRICE", 0);

      const userData = this.$store.state.user.userInfo;
      // this.$store.commit("user/ADD", []);

      // const transaction = {
      //   cart: cart,
      //   totalPrice: totalPrice,
      //   user: userData
      // };

      // this.$store.commit("transaction/ADD", transaction);

      Inertia.post('/finish', {
        method: 'post',
        _token: this.csrf,
        name: userData.name,
        phone: userData.phone,
        address: userData.address,
        cart: cart,
        price: totalPrice,
      });
      // Inertia.visit('/');
      // this.$router.push("/");
    }
  },
  mounted() {
    this.getProductList();
    this.getTotalPrice();
  }
};
</script>

<style scoped>
.label {
  color: #c4c4c4;
}
</style>
