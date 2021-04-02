<template>
  <div class="navbar">
    <v-app-bar color="FAFAFA" flat max-height="120" height="100">
      <v-row justify="center">
        <v-col md="3" to="/">
          <div>
            <!-- <router-link to="/"> -->
              <v-img
                src="../assets/kapalasar-1024x250.png"
                max-width="180"
                class="mx-auto"
              ></v-img>
            <!-- </router-link> -->
          </div>
        </v-col>
        <v-col md="6" class="text-center" name = 'Homepage'>
          <div class="align-center">
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
          </div>
        </v-col>
        <!-- <v-col md="6" v-else></v-col> -->
        <v-col md="3">
          <div v-if="isLoggedin">
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
                    size="35"
                    color="grey"
                    class="mx-2"
                  ></v-list-item-avatar>
                  <v-card-subtitle class="d-inline px-1" dark>{{
                    nama
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
                  link
                  :to="menu.router"
                >
                  <v-list-item-icon>
                    <v-icon>{{ menu.icon }}</v-icon>
                  </v-list-item-icon>
                  <v-list-item-title>{{ menu.title }}</v-list-item-title>
                </v-list-item>
              </v-list>
            </v-menu>
          </div>
          <div v-else class="button text-center ma-1">
          <a href="/login">
            <v-btn class="mr-2" outlined color="#A6CB26" pa-1 to="/login">
            Masuk
            </v-btn>
          </a>
          <a href="/register">
            <v-btn color="#A6CB26" dark depressed pa-1 to="/register">
            Daftar
            </v-btn>
          </a>
          </div>
        </v-col>
      </v-row>
    </v-app-bar>
  </div>
</template>

<script>
export default {
  
};
</script>

<style>
@import 'vuetify/dist/vuetify.min.css';
.mdi-card-search::before {
  color: #a6cb26;
}
</style>
