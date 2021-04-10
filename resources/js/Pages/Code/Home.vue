<template>
  <v-app>
    <div class="home">
      <Navbar :code="code" :check="check" :user="user"/>
      <!-- Carousel -->
      <div class="carousel d-flex justify-center align-center">
        <splide :options="optionsCarousel">
          <splide-slide v-for="(slide, i) in slides" :key="i">
            <div class="rounded">
              <v-img class="responsive" :src="slide.src" />
            </div>
          </splide-slide>
        </splide>
      </div>

      <!-- Flash Sale -->
      <div class="flashSale">
        <v-container>
          <div class="d-flex align-center mb-4">
            <v-img
              src="../assets/flashsale.svg"
              height="40"
              width="40"
              class="flex-shrink-0 flex-grow-0"
            ></v-img>
            <div
              class="d-flex flex-wrap flashsale-text"
              style="width:100%;justify-content:space-between;cursor:pointer "
            >
              <span class="white--text ml-4 text-h5">Flash Sale</span>
              <inertia-link href="/flash_sale">
                <span class="white--text ml-4 text-h5">Lihat Selengkapnya</span>
              </inertia-link>
              <!-- <router-link style="text-decoration:none" to="/flashsale"> -->
              <!-- </router-link> -->
            </div>
          </div>
          <div class="d-flex justify-center align-center">
            <splide :options="optionsFlashsale">
              <splide-slide v-for="(product, i) in flashSaleProducts" :key="i">
                <ProductCard @getTotalPrice="getTotalPrice" :product="product" />
              </splide-slide>
            </splide>
          </div>
        </v-container>
      </div>
      <!-- Filter -->
      <div>
        <v-container>
          <div>
            <span class="text-h6">Filter</span>
          </div>
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
              <v-img :src="filter.src"></v-img>
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
                <ProductCard @getTotalPrice="getTotalPrice" :product="product" />
              </v-row>
            </v-col>
          </v-row>
        </v-container>
      </v-lazy>
      <div class="carousel d-flex justify-center align-center">
        <splide :options="optionsCarousel">
          <splide-slide v-for="(slide, i) in slides" :key="i">
            <div class="rounded">
              <v-img class="responsive" :src="slide.src" />
            </div>
          </splide-slide>
        </splide>
      </div>

      <!-- <client-only>
        <Cookie />
      </client-only> -->
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
              <inertia-link :href="route('code.checkout', code)">
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
import "@splidejs/splide/dist/css/themes/splide-default.min.css";
import { Splide, SplideSlide } from "@splidejs/vue-splide";

import Navbar from "./Components/Navbar.vue";
import Footer from "../components/Footer.vue";
import ProductCard from "../components/ProductCard.vue";
import cookie from "../components/cookie";

import { filters, slides } from "../dummyData/dummy.js";

export default {
  name: "Home",
  components: {
    Navbar,
    Splide,
    SplideSlide,
    ProductCard,
    Footer,
    cookie
  },
  props: {
    code: String,
    check: Boolean,
    user: Object,
    real_products: Array
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
        start: 0,
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
      // this.flashSaleProducts = products.filter(product => product.flashSale);
      this.flashSaleProducts = this.real_products;      
    },
    filterNotFlashSale() {
      // this.notFlashsaleProducts = products.filter(
      //   product => !product.flashSale
      // );
      this.notFlashsaleProducts = this.real_products;
      this.filteredProducts = this.notFlashsaleProducts;
    },
    filterByKategori(by) {
      this.current = by;
      if (this.current === "sayur") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.categories.name === "Sayur"
        );
      } else if (this.current === "buah") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.categories.name === "Buah"
        );
      } else if (this.current === "daging") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.categories.name === "Daging"
        );
      } else if (this.current === "bumbu") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.categories.name === "Bumbu"
        );
      } else if (this.current === "promo") {
        this.filteredProducts = this.notFlashsaleProducts.filter(function(item){
          return item.price !== null;
        });
      } else {
        this.filteredProducts = this.notFlashsaleProducts;
      }
    }
  },
  created() {
    this.filterFlashSale();
    this.filterNotFlashSale();
  },
  mounted() {
    this.changeShowCart();
    // console.log(this.real_products);
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
