<template>
  <div class="sidebar-menu hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64">
      <div class="flex flex-col h-0 flex-1">
        <div class="flex items-center h-16 flex-shrink-0 px-4">
          <span class="m-auto text-xl font-bold">The Pen</span>
        </div>
        <div class="flex-1 flex flex-col overflow-y-auto">
          <nav class="flex-1">
            <div
              style="transition: 'all 0.3s ease-in-out'"
              class="overflow-hidden"
            >
              <SidebarItem
                category="Students"
                :routes="routes.students"
              ></SidebarItem>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SidebarItem from "./SidebarItem.vue";

export default {
  name: "Sidebar",
  components: { SidebarItem },
  data() {
    return {
      routes: {
        students: [{ href: "/", label: "Students list" }],
      },
    };
  },
};
</script>
