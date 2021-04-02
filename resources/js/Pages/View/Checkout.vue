<template>
  <div>
    <Navbar />
    <div>
      <v-container>
        <v-card color="#a6cb26">
          <v-container>
            <span class="white--text text-h6 font-weight-medium"
              >Kantong Belanja</span
            >
          </v-container>
        </v-card>
        <!-- Form Data User -->
        <v-alert
          class="my-5"
          border="top"
          colored-border
          color="#F99F39"
          elevation="2"
        >
          <v-container>
            <span
              class="label text-h6 font-weight-medium"
              style="color: #54595f"
              >Informasi Pembeli</span
            >
            <div class="mx-md-16 mt-md-10 mt-2">
              <v-form>
                <div>
                  <span class="label font-weight-bold">Nama</span>
                  <v-text-field
                    placeholder="Masukan Nama Anda"
                    single-line
                    outlined
                    dense
                  ></v-text-field>
                </div>
                <div>
                  <span class="label font-weight-bold">Nomor Telepon</span>
                  <v-text-field
                    placeholder="Masukan Nomor Telepon Anda"
                    outlined
                    single-line
                    dense
                  ></v-text-field>
                </div>
                <div>
                  <span class="label font-weight-bold">Alamat Pengiriman</span>
                  <v-textarea
                    placeholder="Masukan Alamat Anda"
                    outlined
                    rows="2"
                    auto-grow
                  ></v-textarea>
                </div>
              </v-form>
            </div>
          </v-container>
        </v-alert>
        <!-- Data User (Logged In) -->
        <v-alert
          class="my-5"
          border="top"
          colored-border
          color="#F99F39"
          elevation="2"
        >
          <v-container>
            <span
              class="label text-h6 font-weight-medium"
              style="color: #54595f"
              >Informasi Pembeli</span
            >
            <div class="mx-md-16 mt-md-10 mt-2">
              <div>
                <div class="label font-weight-regular">Nama</div>
                <div>
                  <v-divider></v-divider>
                </div>
              </div>
              <div class="mt-md-3 mt-1 text-subtitle-1">
                <!-- {{ user.name }} -->
              </div>
              <div class="mt-md-4 mt-2">
                <div class="label font-weight-regular">
                  Nomor Telepon
                </div>
                <div>
                  <v-divider></v-divider>
                </div>
              </div>
              <div class="mt-md-3 mt-1 text-subtitle-1">
                <!-- {{ user.telepon }} -->
              </div>
              <div class="mt-md-4 mt-2">
                <div class="label font-weight-regular">Alamat</div>
                <div>
                  <v-divider></v-divider>
                </div>
              </div>
              <div class="mt-md-3 mt-1 text-subtitle-1">
                <!-- {{ user.alamat }} -->
              </div>
            </div>
          </v-container>
        </v-alert>
        <!-- Voucher -->
        <v-alert
          class="my-5"
          border="top"
          colored-border
          color="#F99F39"
          elevation="2"
        >
          <v-container>
            <span
              class="label text-h6 font-weight-medium"
              style="color: #54595f"
              >Voucher</span
            >
            <v-row class="pt-3" >
              <v-col cols="8" md="6">
                <v-text-field
                  placeholder="Kode Voucher"
                  outlined
                  single-line
                  dense
                ></v-text-field>
              </v-col>
              <v-col cols="4" md="6">
                <v-btn color="#a6cb26" dark >
                  Pakai
                </v-btn>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="6" class="mt-5">
                <v-sheet color="white" elevation="1" rounded>
                  <v-row align="center" justify="center">
                    <v-col cols="2">
                      <v-icon class="ml-5" color="#a6cb26">
                        mdi-sale
                      </v-icon>
                    </v-col>
                    <v-col cols="8" class="text-body2 font-weight-medium">
                      <div>
                        Anda Mendapat Potongan Sebesar
                        <!-- <span class="mr-2">{{
                          parseRupiah(voucherInUse.disc)
                        }}</span> -->
                      </div>
                      <div class="text-caption">
                        Voucher " <span>
                          <!-- {{ voucherInUse.name }} -->
                          </span> " aktif
                      </div>
                    </v-col>
                    <v-col cols="2 px-0 px-md-8">
                      <v-btn depressed fab small >
                        <v-icon color="#54595f">
                          mdi-close
                        </v-icon>
                      </v-btn>
                    </v-col>
                  </v-row>
                </v-sheet>
              </v-col>
            </v-row>
          </v-container>
        </v-alert>
        <!-- List Cart -->
        <v-alert
          class="my-5"
          border="top"
          colored-border
          color="#F99F39"
          elevation="2"
        >
          <v-container>
            <span
              class="label text-h6 font-weight-medium"
              style="color: #54595f"
              >Produk</span
            >
            <div class="mx-md-16">
              <div>
                <v-row>
                  <v-col cols="2" md="1">
                    <v-checkbox
                      color="#a6cb26"
                    ></v-checkbox>
                  </v-col>
                  <v-col>
                    <div>
                      <v-row class="mt-5">
                        <span class="label font-weight-medium pl-1">
                          Pilih Semua Produk</span
                        >
                      </v-row>
                    </div>
                  </v-col>
                </v-row>
              </div>
              <div >
                <v-row>
                  <v-col cols="2" md="1">
                    <v-checkbox
                      color="#a6cb26"
                    ></v-checkbox>
                  </v-col>
                  <!-- <v-col>
                    <product-cart-list
                      @getTotalPrice="getTotalPrice(product.id)"
                      :listCart="product"
                    />
                  </v-col> -->
                </v-row>
                <v-divider class="mt-3"></v-divider>
              </div>
            </div>
            <div class="mt-6 mx-md-16">
              <v-row class="mx-1" >
                <div class="label text-subtitle-1">Potongan Harga</div>
                <v-spacer></v-spacer>
                <div class="totalPrice text-subtitle-1">
                  <!-- {{ parseRupiah(voucherInUse.disc) }} -->
                </div>
              </v-row>
              <v-row class="mx-1">
                <div class="label text-h6">Total Belanja</div>
                <v-spacer></v-spacer>
                <div class="totalPrice text-h6">
                  <!-- {{ parseRupiah(totalPrice) }} -->
                </div>
              </v-row>
            </div>
          </v-container>
        </v-alert>
        <div class="text-center">
          <v-btn color="#a6cb26" dark >
            Lanjut Pembayaran
          </v-btn>
        </div>
      </v-container>
    </div>
    <Footer />
  </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import Footer from "../components/Footer.vue";
import ProductCartList from "../components/productCartList";

export default {
  components: {
    Navbar,
    Footer,
    ProductCartList
  },
  
};

Navbar;
</script>

<style scoped>
@import 'vuetify/dist/vuetify.min.css';
.label {
  color: #54595f;
}
.totalPrice {
  color: #f99f39;
}
</style>
