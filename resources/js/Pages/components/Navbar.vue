<template>
  <div class="navbar">
    <v-app-bar flat max-height="120" height="100">
      <v-row justify="center">
        <v-col sm="5" md="4" lg="3" style="padding-bottom: 5px !important;">
          <div v-if="windowSize.x < 600">
            <inertia-link href="/">
              <v-img
                v-show="windowSize.x < 600"
                src="../assets/kapalasar-1024x250.png"
                width="190"
                class="mx-auto m-5"
              ></v-img>
            </inertia-link>
          </div>
          <div else>
            <inertia-link href="/">
              <v-img
                v-show="windowSize.x > 600"
                src="../assets/kapalasar-1024x250.png"
                max-width="220"
                class="mx-auto"
              ></v-img>
            </inertia-link>
          </div>
        </v-col>
        <v-col v-show="windowSize.x > 600" sm="2" md="4" lg="6" class="text-center">
          <!-- <div class="align-center">
            <v-text-field
              outlined
              label="Search"
              single-line
              dense
              color="#a6cb26"
              hide-details="auto"
              max-width="570"
              append-icon="mdi-card-search"
              ma-1
            >
            </v-text-field>
          </div> -->
        </v-col>
        <!-- <v-col md="6" v-else></v-col> -->
        <v-col sm="5" md="4" lg="3" style="padding-top: 1px !important;">
          <div v-if="check">
            <v-menu offset-y>
              <template v-slot:activator="{ on, attrs }">
                <v-card
                  width="250"
                  class="mx-auto"
                  color="#A6CB26"
                  v-bind="attrs"
                  v-on="on"
                  dark
                >
                  <v-list-item-avatar
                    tile
                    size="0.1"
                    class="py-3"
                  ></v-list-item-avatar>
                  <v-card-subtitle class="d-inline" dark >{{
                    user.name
                  }}</v-card-subtitle>
                  <v-card-actions class="d-inline pa-1">
                    <v-btn icon small>
                      <v-icon>
                        mdi-chevron-down
                      </v-icon>
                    </v-btn>
                  </v-card-actions>
                </v-card>
              </template>
              <v-list>
                <v-list-item
                  v-for="menu in menus"
                  :key="menu.title"
                >
                  <inertia-link :href="menu.router" class="black--text" style="text-decoration: none;">
                      <!-- <v-list-item-icon> -->
                        <v-icon class="mr-3 py-3">{{ menu.icon }}</v-icon>
                      <!-- </v-list-item-icon> -->
                      <!-- <v-list-item-title> -->
                        {{ menu.title }}
                      <!-- </v-list-item-title> -->
                  </inertia-link>
                </v-list-item>
              </v-list>
            </v-menu>
          </div>
          <div v-else class="button text-center ma-1">
          <inertia-link href="/login">
            <v-btn class="mt-1 mb-1" outlined color="#A6CB26" pa-1>
            Masuk
            </v-btn>
          </inertia-link>
          <inertia-link href="/register">
            <v-btn class="mt-1 mb-1" color="#A6CB26" dark depressed pa-1>
            Daftar
            </v-btn>
          </inertia-link>
          </div>
        </v-col>
      </v-row>
    </v-app-bar>
  </div>
</template>

<script>
export default {
  methods: {
    onResize () {
        this.windowSize = { x: window.innerWidth, y: window.innerHeight }
      },
  },
  props: ['check', 'user'],
  data() {
    return {
      menus: [
        { icon: "mdi-account", title: "Akun", router: "/account" },
        { icon: "mdi-logout", title: "Keluar", router:"/logout" }
      ],
       windowSize: {
        x: 0,
        y: 0,
      },
    }
  },
  mounted() {
    this.onResize();
  }
};
</script>

<style>
.mdi-card-search::before {
  color: #a6cb26;
}
</style>
