<template>
  <v-app>
    <div class="home">
     <Navbar :check="check" :user="user"/>
      <v-container class="mt-5" style="background-color:#A6CB26">
        <div class="jumbotron text-center py-15 ">
          <h1>Flashsale</h1>
          <p>
            Kapalasar.id lahir dan hadir sebagai perantara antara para pedagang di
            pasar tradisional dengan konsumen yang ada di rumah.
          </p>
        </div>
      </v-container>

      <!-- Flashsale -->
      <div>
        <v-container>
          <div class="d-flex flex-wrap justify-center">
            <v-btn
              v-for="(filter, i) in filters"
              :key="i"
              x-large
              :large="$vuetify.breakpoint.sm ? true : false"
              class="mr-2 px-1 my-2"
              @click="filterByKategori(filter.name)"
              :color="filter.name == current ? '#a6cb26' : ''"
              :dark="filter.name == current ? true : false"
            >
              <v-img 
              max-height="25"
              max-width="25"
              :src="filter.src"
              ></v-img>
              <span class="mx-2">{{ filter.name }}</span>
            </v-btn>
          </div>
        </v-container>
      </div>
      <!-- Product -->
      <v-lazy>
        <v-container>
          <v-row justify="center">
            <v-col
              cols="6"
              sm="4"
              md="3"
              lg="2"
              v-for="(product, i) in filteredProducts"
              :key="i"
              class="ma-lg-2 v-lazy my-3"
            >
              <v-row justify="center">
                <ProductCard @getTotalPrice="getTotalPrice" :product="product" :all_products="all_products" />
              </v-row>
            </v-col>
          </v-row>
        </v-container>
      </v-lazy>
      <Footer />
      <div v-if="showCart" class="cart" style="z-index:999">
        <v-container>
          <v-row class="pa-3">
            <div>
              <div class="font-weight-medium">Total Harga</div>
              <div class="totalHarga font-weight-medium text-h5 align-center">
                {{ parseRupiah(totalPrice) }}
              </div>
            </div>
            <v-spacer></v-spacer>
            <div class="d-flex align-center">
              <inertia-link href="/checkout">
              <v-btn class="checkout" color="#A6CB26">
                Checkout
              </v-btn>
              </inertia-link>
            </div>
          </v-row>
        </v-container>
      </div>
    </div>
  </v-app>
</template>

<script>
// @ is an alias to /src
import ClientOnly from 'vue-client-only'
import Navbar from "../components/Navbar.vue";
import ProductCard from "../components/ProductCard.vue";
import Footer from "../components/Footer.vue";
import { filters, slides } from "../dummyData/dummy.js";
import Cookie from "../components/cookie";
export default {
  name: "Home",
  components: {
    Navbar,
    ProductCard,
    Footer,
    Cookie,
    ClientOnly
  },
  props: {
    check: Boolean,
    user: Object,
    all_products: Array
  },
  data() {
    return {
      optionsCarousel: {
        type: "slide",
        rewind: true,
        width: "100%",
        fixedHeight: this.$vuetify.breakpoint.xs ? 200 : 300,
        perPage: 1,
        gap: "1rem",
        autoplay: true,
        padding: {
          right: this.$vuetify.breakpoint.xs ? "" : "20rem",
          left: this.$vuetify.breakpoint.xs ? "" : "20rem"
        },
        cover: true,
        start: 2,
        autoWidth: true,
        heightRatio: 0.3
      },
      optionsFlashsale: {
        width: "90%",
        gap: "1rem",
        height: 300,
        perPage: this.$vuetify.breakpoint.xs ? 1 : 4,
        perMove: 1,
        pagination: false,
        autoWidth: true,
        heightRatio: 0.3
      },
      slides,
      filters,
      totalPrice: 0,
      showCart: false,
      notFlashsaleProducts: [],
      flashSaleProducts: [],
      filteredProducts: [],
      current: "semua"
    };
  },
  methods: {
    // Carousel Resize based on Screen Size
    onResize () {
        this.windowSize = { x: window.innerWidth, y: window.innerHeight }
      },
    // End of Carousel Resize based on Screen Size
    parseRupiah(strMoney) {
      return parseInt(strMoney).toLocaleString("id", {
        style: "currency",
        currency: "IDR"
      });
    },
    changeShowCart() {
      const price = this.$store.state.cart.totalPrice;
      if (price != 0) {
        this.totalPrice = price;
        this.showCart = true;
      } else {
        this.showCart = false;
      }
    },
    getTotalPrice(totalHarga) {
      this.totalPrice = totalHarga;
      if (this.totalPrice !== 0) {
        this.showCart = true;
      } else {
        this.showCart = false;
      }
    },
    filterFlashSale() {
      // this.flashSaleProducts = this.all_products.filter(product => product.flash_sale);
    },
    filterNotFlashSale() {
      this.notFlashsaleProducts = this.all_products.filter(product => product.flash_sale);
      this.filteredProducts = this.notFlashsaleProducts;
    },
    filterByKategori(by) {
      this.current = by;
      if (this.current === "sayur") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.category === "Sayuran"
        );
      } else if (this.current === "buah") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.category === "Buah"
        );
      } else if (this.current === "daging") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.category === "Daging"
        );
      } else if (this.current === "ikan") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.category === "Ikan"
        );
      } else if (this.current === "seafood") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.category === "Seafood"
        );
      } else if (this.current === "kapalasar organik") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.category === "Kapalasar Organik"
        );
      } else if (this.current === "bumbu") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.category === "Bumbu"
        );
      } else if (this.current === "bumbu giling") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.category === "Bumbu Giling"
        );
      } else if (this.current === "olahan kedelai") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.category === "Olahan Kedelai"
        );
      } else if (this.current === "siap masak") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.category === "Siap Masak"
        );
      } else if (this.current === "siap makan") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.category === "Siap Makan"
        );
      } else if (this.current === "promo") {
        this.filteredProducts = this.notFlashsaleProducts.filter(function(item){
          return item.price !== null;
        });
      } else {
        this.filteredProducts = this.notFlashsaleProducts;
      }
    },
  },
  created() {
    this.filterFlashSale();
    this.filterNotFlashSale();
    this.$store.commit("cart/REPLACE", []);
    this.$store.commit("cart/SET_TOTAL_PRICE", 0);
  },
  mounted() {
    this.changeShowCart();
        // console.log(this.real_products[0].products);

  }
};
</script>

<style scoped>
.carousel {
  background: #a6cb26;
  padding: 1.25rem 0;
}
.flashSale {
  margin-top: 0.625rem;
  padding: 0.625rem 0;
  background: #f99f39;
}
.totalHarga {
  color: #f99f39;
}
.checkout {
  color: white;
}
.cart {
  background-color: white;
  overflow: hidden;
  position: fixed;
  bottom: 0;
  width: 100%;
  -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
  box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
}
</style>
