<template>
<v-app>
  <div>
    <Navbar :check="check" :user="user"/>
    <v-container>
      <v-tabs class="v-tabs" vertical color="#a6cb26">
        <div class="d-flex flex-column justify-center">
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
          <!-- <v-btn text elevation="0" tile color="red">
            <v-icon>mdi-logout</v-icon>
            Keluar
          </v-btn> -->
        </div>
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
                    <div class="px-lg-16 px-sm-5 pt-8">
                      <span class="label font-weight-medium">Nama Lengkap</span>
                      <v-text-field
                        v-model="user.name"
                        :rules="[rules.required]"
                        placeholder="Nama Lengkap"
                        outlined
                        dense
                      ></v-text-field>
                      <span class="label font-weight-medium">Email</span>
                      <v-text-field
                        v-model="user.email"
                        :rules="[rules.required, rules.email]"
                        placeholder="Email"
                        outlined
                        dense
                      ></v-text-field>
                      <span class="label font-weight-medium"
                        >Nomor Telepon</span
                      >
                      <v-text-field
                        v-model="user.phone"
                        :rules="[rules.required, rules.onlyNum]"
                        placeholder="Nomor Telepon"
                        outlined
                        dense
                      ></v-text-field>
                      <span class="label font-weight-medium">Alamat</span>
                      <v-text-field
                        v-model="user.address"
                        :rules="[rules.required]"
                        placeholder="Alamat"
                        outlined
                        dense
                      ></v-text-field>
                      <!-- <span class="label font-weight-medium">Password</span>
                      <v-text-field
                        v-model="password"
                        :rules="[rules.required, rules.min]"
                        :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                        :type="show ? 'text' : 'password'"
                        hint="At least 8 characters"
                        @click:append="show = !show"
                        outlined
                        dense
                        placeholder="Password"
                      ></v-text-field> -->
                    </div>
                    <!-- <div class="pb-3 text-center">
                      <v-btn color="#a6cb26" dark>Simpan</v-btn>
                    </div> -->
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
                <TransactionList :transaction="item" :num="i" />
              </div>
            </v-container>
          </v-card>
        </v-tab-item>
      </v-tabs>
    </v-container>
    <Footer />
  </div>
</v-app>
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
  props: {
    check: Boolean,
    user: Object,
    real_products: Array,
    checkouts: Array
  },
  data() {
    return {
      show: false,
      name: "",
      email: "",
      telepon: "",
      usia: "",
      pekerjaan: "",
      alamat: "",
      kelurahan: "",
      kecamatan: "",
      password: "",
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
      },
      dataTransaction: []
    };
  },
  methods: {
    getTransactionData() {
      // this.dataTransaction = this.$store.state.transaction.listSuccessTransactions;
      const transactionData = this.$store.state.transaction
        .listSuccessTransactions;
      

      let dataProduct = [];
      let totalPrice = 0;

      // this.real_products.forEach(product => {

      //   transactionData.forEach(transaction => {
      //     totalPrice = transaction.totalPrice;
      //     transaction.cart.forEach(cart => {
      //       if (cart.id == product.id) {
      //         const list = {
      //           qty: cart.qty,
      //           ...product
      //         };
      //         dataProduct.push(list);
      //       }
      //     });
      //   });
      // });
      // this.dataTransaction.push({
        // dataProduct,
        // totalPrice: totalPrice
      // });
    }
  },
  mounted() {
    this.getTransactionData();
  }
};
</script>

<style scoped>
.label {
  color: #a6cb26;
}
.v-text-field--outlined >>> fieldset {
  border-color: #a6cb26;
}
.v-tabs {
  display: show;
}

@media only screen and (max-width: 540px) {
  .v-tabs {
    display: flex;
    flex-direction: column;
  }
}
</style>
