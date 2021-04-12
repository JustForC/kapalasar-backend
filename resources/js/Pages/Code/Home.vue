<template>
  <v-app>
    <div class="home">
      <v-row justify="center">
      <v-dialog v-model="dialog" persistent max-width="500">
        <v-card>
          <v-card-title class="headline font-weight-bold">
                <v-icon class="mr-1" color="orange darken-2">mdi-sale</v-icon> PROMO HARI INI!
          </v-card-title>
          <v-img else class="responsive" :contain="true" :src="popUp.image" />
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn class="font-weight-bold" color="green darken-1" text @click="dialog = false">
              BELANJA SEKARANG!
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-row>
      <Navbar :code="code" :check="check" :user="user"/>
      <!-- Carousel -->
      <div class="carousel d-flex justify-center align-center">
        <v-carousel
          v-if="windowSize.x > 600" 
          cycle
          :show-arrows="false"
          hide-delimiter-background
          delimiter-icon="mdi-circle"
          :options="optionsCarousel">
          <v-carousel-item v-for="(slide, i) in banners" :key="i">
            <a class="rounded" :href="route('banner', slide.path)">
              <v-img v-show="windowSize.x > 600" class="responsive" :contain="true" aspect-ratio="2.5" :src="slide.image" />
              <v-img v-show="windowSize.x < 600" class="responsive" :contain="true" :src="slide.image" />
              <!-- <v-img v-if="windowSize.x > 600" class="responsive" :contain="true" aspect-ratio="2.5" :src="slide.src" />
              <v-img else class="responsive" :contain="true" :src="slide.src" /> -->
            </a>
          </v-carousel-item>
        </v-carousel>
        <!-- Conditional Rendering < 600px -->
        <v-carousel
          v-else 
          cycle
          :show-arrows="false"
          hide-delimiter-background
          delimiter-icon="mdi-circle"
          height="150" :options="optionsCarousel">
          <v-carousel-item v-for="(slide, i) in banners" :key="i">
            <a class="rounded" :href="route('banner', slide.path)">
              <v-img v-show="windowSize.x > 600" class="responsive" :contain="true" aspect-ratio="2.5" :src="slide.image" />
              <v-img v-show="windowSize.x < 600" class="responsive" :contain="true" :src="slide.image" />
              <!-- <v-img v-if="windowSize.x > 600" class="responsive" :contain="true" aspect-ratio="2.5" :src="slide.src" />
              <v-img else class="responsive" :contain="true" :src="slide.src" /> -->
            </a>
          </v-carousel-item>
        </v-carousel>
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
              <span class="white--text ml-4 text-h5 font-weight-bold">Flash Sale</span>
              <inertia-link href="/flash_sale">
                <v-btn class="white--text ml-4 subtitle-2" outlined>Lihat Selengkapnya</v-btn>
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
          <div class="d-flex flex-wrap justify-center">
            <v-slide-group
                multiple
                show-arrows
              >
                <v-slide-item
                  v-for="(filter, i) in filters"
                  :key="i"
                >
                  <v-btn
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
                </v-slide-item>
              </v-slide-group>
          </div>
          <v-card-text>
          <v-toolbar
            flat
            color="transparent"
          >
            <v-text-field
              v-model="search"
              v-on:change="filterbySearch"
              append-icon="mdi-magnify"
              label="Pencarian"
              single-line
              color="green"
            ></v-text-field>
          </v-toolbar>
        </v-card-text>
        </v-container>
      </div>
      <!-- Product -->
      <v-lazy>
        <v-container>
          <!-- Product Page 1-->
          <v-row justify="center">
            <v-col
              cols="6"
              sm="4"
              md="3"
              lg="2"
              v-for="(product, i) in filteredProducts.slice(0,8)"
              :key="i"
              class="ma-lg-2 v-lazy my-3"
            >
              <v-row justify="center">
                <ProductCard @getTotalPrice="getTotalPrice" :product="product" />
              </v-row>
            </v-col>
          </v-row>
          <!-- End of Product Page 1-->
          <!-- Banner Page 1-->
            <div class="carousel d-flex justify-center align-center">
              <v-carousel
                v-if="windowSize.x > 600" 
                cycle
                :show-arrows="false"
                hide-delimiter-background
                delimiter-icon="mdi-circle"
                :options="optionsCarousel">
                <v-carousel-item >
                  <a class="rounded" :href="route('banner', banners[1].path)">
                    <v-img v-show="windowSize.x > 600" class="responsive" :contain="true" aspect-ratio="2.5" :src="banners[1].image" />
                    <v-img v-show="windowSize.x < 600" class="responsive" :contain="true" :src="banners[1].image" />
                    <!-- <v-img v-if="windowSize.x > 600" class="responsive" :contain="true" aspect-ratio="2.5" :src="banners[1].image" />
                    <v-img else class="responsive" :contain="true" :src="banners[1].image" /> -->
                  </a>
                </v-carousel-item>
              </v-carousel>
              <!-- Conditional Rendering < 600px -->
              <v-carousel
                v-else 
                cycle
                :show-arrows="false"
                hide-delimiter-background
                delimiter-icon="mdi-circle"
                height="150" :options="optionsCarousel">
                <v-carousel-item >
                  <a class="rounded" :href="route('banner', banners[1].path)">
                    <v-img v-show="windowSize.x > 600" class="responsive" :contain="true" aspect-ratio="2.5" :src="banners[1].image" />
                    <v-img v-show="windowSize.x < 600" class="responsive" :contain="true" :src="banners[1].image" />
                    <!-- <v-img v-if="windowSize.x > 600" class="responsive" :contain="true" aspect-ratio="2.5" :src="banners[1].image" />
                    <v-img else class="responsive" :contain="true" :src="banners[1].image" /> -->
                  </a>
                </v-carousel-item>
              </v-carousel>
            </div>
            <!-- End Banner Page 1-->
            <!-- Product Page 2-->
            <v-row justify="center">
              <v-col
                cols="6"
                sm="4"
                md="3"
                lg="2"
                v-for="(product, i) in filteredProducts.slice(9,18)"
                :key="i"
                class="ma-lg-2 v-lazy my-3"
              >
                <v-row justify="center">
                  <ProductCard @getTotalPrice="getTotalPrice" :product="product" />
                </v-row>
              </v-col>
            </v-row>
          <!-- End of Product Page 2-->
          <!-- Banner Page 2-->
            <div class="carousel d-flex justify-center align-center">
              <v-carousel
                v-if="windowSize.x > 600" 
                cycle
                :show-arrows="false"
                hide-delimiter-background
                delimiter-icon="mdi-circle"
                :options="optionsCarousel">
                <v-carousel-item >
                  <a class="rounded" :href="route('banner', banners[2].path)">
                    <v-img v-show="windowSize.x > 600" class="responsive" :contain="true" aspect-ratio="2.5" :src="banners[2].image" />
                    <v-img v-show="windowSize.x < 600" class="responsive" :contain="true" :src="banners[2].image" />
                    <!-- <v-img v-if="windowSize.x > 600" class="responsive" :contain="true" aspect-ratio="2.5" :src="banners[2].image" />
                    <v-img else class="responsive" :contain="true" :src="banners[2].image" /> -->
                  </a>
                </v-carousel-item>
              </v-carousel>
              <!-- Conditional Rendering < 600px -->
              <v-carousel
                v-else 
                cycle
                :show-arrows="false"
                hide-delimiter-background
                delimiter-icon="mdi-circle"
                height="150" :options="optionsCarousel">
                <v-carousel-item >
                  <a class="rounded" :href="route('banner', banners[2].path)">
                    <v-img v-show="windowSize.x > 600" class="responsive" :contain="true" aspect-ratio="2.5" :src="banners[2].image" />
                    <v-img v-show="windowSize.x < 600" class="responsive" :contain="true" :src="banners[2].image" />
                    <!-- <v-img v-if="windowSize.x > 600" class="responsive" :contain="true" aspect-ratio="2.5" :src="banners[2].image" />
                    <v-img else class="responsive" :contain="true" :src="banners[2].image" /> -->
                  </a>
                </v-carousel-item>
              </v-carousel>
            </div>
            <!-- End Banner Page 2-->
            <!-- Product Page 3-->
                <v-row justify="center">
                  <v-col
                    cols="6"
                    sm="4"
                    md="3"
                    lg="2"
                    v-for="(product, i) in filteredProducts.slice(19,27)"
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
            <!-- End Product Page 3-->
      <!-- <div class="carousel d-flex justify-center align-center">
        <splide :options="optionsCarousel">
          <splide-slide v-for="(slide, i) in slides" :key="i">
            <div class="rounded">
              <v-img class="responsive" :src="slide.src" />
            </div>
          </splide-slide>
        </splide>
      </div> -->
      <!-- Carousel -->
      <div class="carousel d-flex justify-center align-center">
        <v-carousel
          v-if="windowSize.x > 600" 
          cycle
          :show-arrows="false"
          hide-delimiter-background
          delimiter-icon="mdi-circle"
          :options="optionsCarousel">
          <v-carousel-item >
            <a class="rounded" :href="route('banner', banners[3].path)">
              <v-img v-show="windowSize.x > 600" class="responsive" :contain="true" aspect-ratio="2.5" :src="banners[3].image" />
              <v-img v-show="windowSize.x < 600" class="responsive" :contain="true" :src="banners[3].image" />
              <!-- <v-img v-if="windowSize.x > 600" class="responsive" :contain="true" aspect-ratio="2.5" :src="banners[3].image" />
              <v-img else class="responsive" :contain="true" :src="banners[3].image" /> -->
            </a>
          </v-carousel-item>
        </v-carousel>
        <!-- Conditional Rendering < 600px -->
        <v-carousel
          v-else 
          cycle
          :show-arrows="false"
          hide-delimiter-background
          delimiter-icon="mdi-circle"
          height="150" :options="optionsCarousel">
          <v-carousel-item >
            <a class="rounded" :href="route('banner', banners[3].path)">
              <v-img v-show="windowSize.x > 600" class="responsive" :contain="true" aspect-ratio="2.5" :src="banners[3].image" />
              <v-img v-show="windowSize.x < 600" class="responsive" :contain="true" :src="banners[3].image" />
              <!-- <v-img v-if="windowSize.x > 600" class="responsive" :contain="true" aspect-ratio="2.5" :src="banners[3].image" />
              <v-img else class="responsive" :contain="true" :src="banners[3].image" /> -->
            </a>
          </v-carousel-item>
        </v-carousel>
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
    real_products: Array,
    banners: Object,
    popUp: Object
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
        height: 290,
        perPage: this.$vuetify.breakpoint.xs ? 3 : 4,
        perMove: 1,
        pagination: false,
        autoWidth: true,
        heightRatio: 1.5
      },
      slides,
      filters,
      totalPrice: 0,
      showCart: false,
      notFlashsaleProducts: [],
      flashSaleProducts: [],
      filteredProducts: [],
      current: "semua",
      windowSize: {
        x: 0,
        y: 0,
      },
      dialog: true,
      search: ''
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
      } else if (this.current === "ikan") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.categories.name === "Ikan"
        );
      } else if (this.current === "seafood") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.categories.name === "Seafood"
        );
      } else if (this.current === "kapalasar organik") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.categories.name === "Kapalasar Organik"
        );
      } else if (this.current === "bumbu") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.categories.name === "Bumbu"
        );
      } else if (this.current === "bumbu giling") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.categories.name === "Bumbu Giling"
        );
      } else if (this.current === "olahan kedelai") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.categories.name === "Olahan Kedelai"
        );
      } else if (this.current === "siap masak") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.categories.name === "Siap Masak"
        );
      } else if (this.current === "siap makan") {
        this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.categories.name === "Siap Makan"
        );
      } else if (this.current === "promo") {
        this.filteredProducts = this.notFlashsaleProducts.filter(function(item){
          return item.price !== null;
        });
      } else {
        this.filteredProducts = this.notFlashsaleProducts;
      }
    },
    // Search Products Filter
    filterbySearch(search) {
      this.filteredProducts = this.notFlashsaleProducts.filter(
          product => product.name.includes(search)
        );
    }
    // End of Search Products Filter
  },
  created() {
    this.filterFlashSale();
    this.filterNotFlashSale();
  },
  mounted() {
    this.changeShowCart();
    this.onResize();

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
