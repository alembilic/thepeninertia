<template>
  <div
    class="
      sidebar-menu-item
      group
      select-none
      flex
      items-center
      cursor-pointer
      rounded-md
    "
    @click="toggleIsOpen(index)"
  >
    <div>
      <slot></slot>
    </div>

    <div class="sidebar-menu-item-label">{{ category }}</div>
    <div class="sidebar-menu-item-arrow"></div>
  </div>
  <div
    v-for="(route, i) in routes"
    :key="i"
    class="flex-1 px-0 pt-0 pb-2 overflow-hidden"
  >
    <a
      :href="route.href"
      class="
        sidebar-menu-sub-item
        group
        select-none
        flex
        items-center
        cursor-pointer
        rounded-md
      "
    >
      <div>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="10px"
          height="10px"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="mr-2"
        >
          <circle cx="12" cy="12" r="10"></circle>
        </svg>
      </div>
      <div class="sidebar-menu-item-label">{{ route.label }}</div>
    </a>
  </div>
</template>

<script>
export default {
  name: "SidebarItem",
  components: {},
  props: {
    category: {
      type: String,
      default: "",
    },
    routes: {
      type: Array,
      default: [],
    },
  },
};
</script>

<style scoped>
.sidebar-menu-item {
  position: relative;
  margin: 0 15px;
  padding: 10px 15px 10px 15px;
  line-height: 1.45;
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;
  font-size: 1rem !important;

  border-radius: 4px;
}

.sidebar-menu-sub-item {
  position: relative;
  margin: 0 15px 0 20px;
  padding: 10px 15px 10px 15px;
  line-height: 1.45;
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;
  font-size: 1rem !important;

  border-radius: 4px;
}

.sidebar-menu-item-active {
  -webkit-box-shadow: 0 0 10px 1px rgba(115 103 240 / 70%);
  box-shadow: 0 0 10px 1px rgba(115 103 240 / 70%);
  border-radius: 4px;
}

.sidebar-menu-item-icon {
  margin-right: 1.1rem;
  height: 20px !important;
  width: 20px !important;
}

.sidebar-menu-item-label {
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;
  line-height: 1.45;
}

.sidebar-menu-item-arrow {
  transition: all 0.3s ease-in-out;
  position: absolute;
  right: 5px;
}
</style>