<template>
  <div>
    <Navbar />
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
                            <!-- {{ parseRupiah(totalPrice) }} -->
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
                            >
                              <v-icon left>
                                mdi-upload
                              </v-icon>
                              <!-- {{ buttonText }} -->
                            </v-btn>
                            <input
                              ref="uploader"
                              class="d-none"
                              type="file"
                              accept="image/*"
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
            <!-- <v-container>
              <span class="text-h6 font-weight-medium" style="color: #54595f"
                >Pesanan Anda</span
              >
              <div class="mx-md-16">
                <div v-for="(product, i) in listFinalCart" :key="i">
                  <product-final-list :listFinalCart="product" />
                  <v-divider class="mt-4"></v-divider>
                </div>
              </div>
            </v-container> -->
          </v-alert>
          <div class="text-center">
            <v-btn color="#a6cb26" dark >
              Selesai
            </v-btn>
          </div>
        </v-container>
      </div>
    </v-content>
    <Footer />
  </div>
</template>

<script>
import Footer from "../components/Footer.vue";
import Navbar from "../components/Navbar.vue";
import ProductFinalList from "../components/ProductFinalList.vue";


export default {
  components: { Navbar, Footer, ProductFinalList },
  
};
</script>

<style scoped>
@import 'vuetify/dist/vuetify.min.css';
.label {
  color: #c4c4c4;
}
</style>
