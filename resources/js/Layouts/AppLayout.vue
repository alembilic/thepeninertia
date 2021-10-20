<template>
  <div>
    <Head :title="title" />

    <jet-banner />

    <div class="h-screen flex overflow-hidden">
      <!-- <mobile-sidebar
        :is-collapsed="isCollapsed"
        :route="route"
        @close-sidebar="isCollapsed = true"
      /> -->
      <sidebar />

      <div class="flex flex-col w-0 flex-1 overflow-hidden">
        <!-- <main-header @open-sidebar="isCollapsed = false" /> -->

        <!-- <main
          class="
            pb-6
            sm:pb-0
            flex-1
            relative
            overflow-y-auto
            focus:outline-none
          "
          tabindex="0"
        >
          <div class="pt-0 pb-4">
            <div class="mx-auto px-4 sm:px-6 md:px-6">
              <slot />
            </div>
          </div>
        </main> -->
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import JetBanner from "@/Jetstream/Banner.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Sidebar from "./Sidebar.vue";
import MainHeader from "./Header.vue";

export default defineComponent({
  props: {
    title: String,
  },

  components: {
    Head,
    JetBanner,
    Link,
    Sidebar,
    MainHeader,
  },

  data() {
    return {
      showingNavigationDropdown: false,
      isCollapsed: true,
    };
  },

  methods: {
    logout() {
      this.$inertia.post(route("logout"));
    },
  },
});
</script>
