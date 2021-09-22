<template>
    <div class="sm:hidden">
        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate px-2 py-2">{{ title }}</h1>
        <select
            @change="onChangeSelect"
            id="tabs"
            name="tabs"
            class="block w-full py-2 pl-3 pr-10 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        >
            <option :key="tab.name" v-for="tab in tabs" :value="tab.name" >{{tab.name}}</option>
        </select>
    </div>


    <div class="hidden sm:block">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div class="sm:flex sm:items-baseline">
                <nav :class="['flex space-x-8', className]">

                    <a
                v-for="tab in tabs"
                :key="tab.name"
                @click="onChangeTab(tab)"
                :aria-current="tab.name == selectedTab?.name ? 'page' : undefined"
                :class="[
                tab.name == selectedTab?.name
                    ? 'border-indigo-500 text-indigo-600'
                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300',
                'py-4 px-1 border-b-2 font-medium text-2xl cursor-pointer',
                ]"
            >
                {{ tab.name }}
            </a>
                </nav>
                </div>
        </div>
    </div>

</template>

<script>
export default {
  name: 'Header',
  props: {
    title: Object,
    tabs: Object,
    className: {
        type: String,
        default: ''
    }
  },
  data() {
    return {
       selectedTab: {}
    }
  },
  created() {
    this.selectedTab = this.tabs[0]
  },
  methods: {
    onChangeSelect(event) {
        const indexOfTab = this.tabs.findIndex(o => o.name == event.target.value);
        this.selectedTab = this.tabs[indexOfTab]
        this.$emit("onChangeTab", indexOfTab);
        // this.$emit("onChangeTab", this.selectedTab);
    },
    onChangeTab(tab) {
        const indexOfTab = this.tabs.findIndex(o => o.name == tab.name);
        this.selectedTab = tab
        this.$emit("onChangeTab", indexOfTab);
        // this.$emit("onChangeTab", this.selectedTab);
    }
  },
}
</script>

<style></style>
