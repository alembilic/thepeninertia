<template>
  <div
    class="
      header-navigation
      relative
      z-10
      flex-shrink-0 flex
      h-16
      mt-4
      mb-6
      mx-4
      sm:mx-6
      md:mx-6
    "
  >
    <button
      aria-label="Open sidebar"
      class="px-4 md:hidden"
      @click="openSidebar"
    >
      <the-icon icon="interface-essential_menu_navigation-menu-1" />
    </button>
    <div class="flex-1 px-4 flex justify-between">
      <div class="flex-1 flex"></div>
      <div class="ml-4 flex items-center md:ml-6">
        <div>
          <toggle-button
            v-model="darkMode"
            :color="'#4a5568'"
            :height="23"
            :labels="{ checked: 'Dark', unchecked: 'Light' }"
            :switch-color="{ checked: '#fff', unchecked: '#8a8a8a' }"
            :width="58"
            class="z-0"
            @change="toggleDark"
          />
        </div>
        <div class="ml-3 relative">
          <div>
            <button
              id="user-menu"
              aria-haspopup="true"
              aria-label="User menu"
              class="
                max-w-xs
                flex
                items-center
                text-sm
                rounded-full
                focus:outline-none focus:shadow-outline
              "
              @click="showDropdown = !showDropdown"
            >
              <img
                alt=""
                class="h-8 w-8 rounded-full"
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
              />
            </button>
          </div>
          <transition
            enter-active-class="transition ease-out duration-100"
            enter-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
          >
            <div
              v-show="showDropdown"
              class="
                header-dropdown
                origin-top-right
                absolute
                z-40
                right-0
                mt-2
                w-48
                rounded-md
                shadow-lg
              "
            >
              <div
                aria-labelledby="user-menu"
                aria-orientation="vertical"
                class="py-1 rounded-md shadow-xs"
                role="menu"
              >
                <a
                  class="block px-4 py-2 text-sm"
                  href="/profile"
                  role="menuitem"
                  >Your Profile</a
                >
                <a
                  class="block px-4 py-2 text-sm cursor-pointer"
                  role="menuitem"
                  @click="logout"
                  >Sign out</a
                >
              </div>
            </div>
          </transition>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
//import { $bus } from "../../app";

export default {
  name: "MainHeader",
  components: {},
  props: {
    isStudent: {
      type: Boolean,
      default: false,
    },
    isGuardian: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      showDropdown: false,
      darkMode: false,
    };
  },
  created() {
    this.darkMode = localStorage.getItem("theme") === "dark";
  },
  methods: {
    toggleDark() {
      if (this.darkMode) {
        document.documentElement.classList.add("dark-theme");
        document.documentElement.classList.remove("bright-theme");
        localStorage.setItem("theme", "dark");
        //$bus.$emit("theme-changed", "dark");
      } else {
        document.documentElement.classList.add("bright-theme");
        document.documentElement.classList.remove("dark-theme");
        localStorage.setItem("theme", "light");
        //$bus.$emit("theme-changed", "light");
      }
    },
    logout() {
      if (this.isStudent) {
        axios.post("/logout-student").then(() => {
          location.reload();
        });
        return;
      }
      if (this.isGuardian) {
        axios.post("/logout-guardian").then(() => {
          location.reload();
        });
        return;
      }
      axios.post("/logout").then(() => {
        return location.reload();
      });
    },
    openSidebar() {
      this.$emit("open-sidebar");
    },
    closeDropdown() {
      this.showDropdown = false;
    },
  },
};
</script>

<style>
.header-navigation {
  border-radius: 10px;
  /*margin: 10px 10px 0 10px;*/
}
</style>
