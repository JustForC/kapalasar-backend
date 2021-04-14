<template>
  <div class="navbar">
    <v-app-bar flat max-height="120" height="100">
      <v-row justify="center">
        <v-col sm="5" md="4" lg="3">
          <div>
            <inertia-link :href="route('code.index', code)">
              <v-img
                src="../assets/kapalasar-1024x250.png"
                max-width="180"
                class="mx-auto"
              ></v-img>
            </inertia-link>
          </div>
        </v-col>
        <v-col sm="2" md="4" lg="6" class="text-center" v-if="true">
        </v-col>
        <v-col sm="5" md="4" lg="3">
          <div v-if="check">
            <v-menu offset-y>
              <template v-slot:activator="{ on, attrs }">
                <v-card
                  max-width="210"
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
                    <v-icon class="mr-3 py-3">{{ menu.icon }}</v-icon>
                    {{ menu.title }}
                  </inertia-link>
                </v-list-item>
              </v-list>
            </v-menu>
          </div>
          <div v-else class="button text-center ma-1">
          <inertia-link :href="route('code.loginShow', code)">
            <v-btn class="mr-2" outlined color="#A6CB26" pa-1>
            Masuk
            </v-btn>
          </inertia-link>
          <inertia-link :href="route('code.registerShow', code)">
            <v-btn color="#A6CB26" dark depressed pa-1>
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
  props: ['code', 'check', 'user'],
  data() {
    return {
      menus: [
        { icon: "mdi-account", title: "Account", router: "/account" },
        { icon: "mdi-logout", title: "Keluar", router:"/logout" }
      ]
    }
  }
};
</script>

<style>
.mdi-card-search::before {
  color: #a6cb26;
}
</style>
