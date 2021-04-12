<template>
  <v-app>
    <div class="home">
     <Navbar :check="check" :user="user"/>
      <v-container class="mt-5" style="background-color:#A6CB26">
        <div class="img-thumbnail">
          <img :src="advertisement.image" />
        </div>
      </v-container>

      <!-- TNC -->
      <div>
        <v-container>
          <div class="d-flex flex-wrap justify-center">
            <div class="" v-html="advertisement.tnc">
            </div>
          </div>
        </v-container>
      </div>

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
                <ProductCard @getTotalPrice="getTotalPrice" :product="product" :all_products="all_products"/>
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
    advertisement: Object,
    tnc: String,
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
  filters: {
    pretty: function(value) {
      return JSON.stringify(JSON.parse(value), null, 2);
    }
  },
  methods: {
    htmlToText(html) {
      return html.replace(/</g, '&lt;').replace(/>/g, '&gt;')
    },
    decode (value) {
      return he.decode(value)
    },
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
    //   this.flashSaleProducts = this.real_products.map(products => {
        // console.log(products.newPrice);
          // newPrice = products.new_price;
        //   return products.products;
    //   })
    },
    filterNotFlashSale() {
      // this.notFlashsaleProducts = products.filter(
      //   product => !product.flashSale
      // );
      this.notFlashsaleProducts = this.all_products;
    //   this.notFlashsaleProducts = this.real_products.forEach(products => {
    //       return products.products;
    //   })
      console.log(this.notFlashsaleProducts);
      // console.log(this.notFlashsaleProducts);
      this.filteredProducts = this.notFlashsaleProducts;
      // console.log(this.filteredProducts);
    },
    filterByKategori(by) {
      this.current = by;
      if (this.current === "sayur") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.categories_id === 2
        );
      } else if (this.current === "buah") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.categories_id === 1
        );
      } else if (this.current === "daging dan ikan") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.categories_id === 3
        );
      } else if (this.current === "yoghurt") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.categories_id === 4
        );
      } else if (this.current === "ladanglima") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.categories_id === 5
        );
      } else if (this.current === "gula merah") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.categories_id === 6
        );
      } else if (this.current === "bumbu giling") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.categories_id === 7
        );
      } else if (this.current === "olahan kacang kedelai") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.categories_id === 8
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
.img-thumbnail {
  width: 100%;
  cursor: pointer;
}
.img-thumbnail img {
  width: 100%;
  max-height: 400px;
}
</style>
