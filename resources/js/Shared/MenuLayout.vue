<template >
    <Header/>

    <div>
        <slot />

    </div>
   <Footer/>
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

        // document.documentElement.style.setProperty('--general-title', theme.general_title);
        // document.documentElement.style.setProperty('--general-txt', theme.general_txt);
        // document.documentElement.style.setProperty('--general-bg', theme.general_bg);
        // document.documentElement.style.setProperty('--general-icon', theme.general_icon);

        // document.documentElement.style.setProperty('--header-title', theme.header_title);
        // document.documentElement.style.setProperty('--header-txt', theme.header_txt);
        // document.documentElement.style.setProperty('--header-bg', theme.header_bg);
        // document.documentElement.style.setProperty('--header-icon', theme.header_icon);

        // document.documentElement.style.setProperty('--info-title', theme.info_title);
        // document.documentElement.style.setProperty('--info-txt', theme.info_txt);
        // document.documentElement.style.setProperty('--info-bg', theme.info_bg);
        // document.documentElement.style.setProperty('--info-icon', theme.info_icon);
        // document.documentElement.style.setProperty('--info-separator', theme.info_separator);

        // document.documentElement.style.setProperty('--product-title', theme.product_title);
        // document.documentElement.style.setProperty('--product-txt', theme.product_txt);
        // document.documentElement.style.setProperty('--product-bg', theme.product_bg);
        // document.documentElement.style.setProperty('--product-icon', theme.product_icon);
        // document.documentElement.style.setProperty('--product-separator', theme.product_separator);
        document.documentElement.style.setProperty('--product-button', theme.product_button);

        // document.documentElement.style.setProperty('--footer-title', theme.footer_title);
        // document.documentElement.style.setProperty('--footer-txt', theme.footer_txt);
        // document.documentElement.style.setProperty('--footer-bg', theme.footer_bg);
        // document.documentElement.style.setProperty('--footer-icon', theme.footer_icon);

        // document.documentElement.style.setProperty('--time-txt', theme.time_txt);
        // document.documentElement.style.setProperty('--time-bg', theme.time_bg);

        // document.documentElement.style.setProperty('--button-txt', theme.button_txt);
        // document.documentElement.style.setProperty('--button-bg', theme.button_bg);
        // document.documentElement.style.setProperty('--button-hover', theme.button_hover);

        // document.documentElement.style.setProperty('--counter-bg', theme.counter_hover);
        // document.documentElement.style.setProperty('--counter-txt', theme.counter_txt);

        // document.documentElement.style.setProperty('--price-bg', theme.price_hover);
        // document.documentElement.style.setProperty('--price-txt', theme.price_txt);
  }
}
</script>
