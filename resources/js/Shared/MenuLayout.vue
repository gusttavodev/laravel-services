<template >
<div class="bg-general-bg text-general-txt flex flex-col h-screen justify-between">
    <Header/>
    <div class="bg-general-bg text-general-txt">
        <slot />
    </div>
    <Footer/>
</div>
</template>

<script>
import Header from '@/Shared/MenuLayout/Header.vue'
import Footer from '@/Shared/MenuLayout/Footer.vue'

export default {
  name: "MenuHeader",
  components: {
    Header,
    Footer
  },
  data() {
    return {
    }
  },
  methods: {

  },
  mounted(){
        const theme = this.$page.props.establishment.data.theme
        const configArray = Object.entries(theme.colors_settings).reduce((ini,[k,v])=>(ini[k]=v,ini),[]);
        for (const [key, value] of Object.entries(configArray)) {
            document.documentElement.style.setProperty(key, value);
        }

  }
}
</script>
