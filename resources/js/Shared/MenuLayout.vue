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

        document.documentElement.style.setProperty('--primary-color', theme.primary_color);
        document.documentElement.style.setProperty('--secondary-color', theme.secondary_color);
        document.documentElement.style.setProperty('--text-color', theme.text_color);
        document.documentElement.style.setProperty('--title-text-color', theme.title_text_color);
        document.documentElement.style.setProperty('--title-text-hover-color', theme.title_text_hover_color);
        document.documentElement.style.setProperty('--background-color', theme.background_color);
        document.documentElement.style.setProperty('--button-background-color', theme.button_background_color);
        document.documentElement.style.setProperty('--button-hover-color', theme.button_hover_color);
        document.documentElement.style.setProperty('--button-text-color', theme.button_text_color);
        document.documentElement.style.setProperty('--button-count-color', theme.button_count_color);
        document.documentElement.style.setProperty('--card-background-color', theme.card_background_color);
        document.documentElement.style.setProperty('--card-text-color', theme.card_text_color);
        document.documentElement.style.setProperty('--card-price-color', theme.card_price_color);

        document.documentElement.style.setProperty('--info-card-background', theme.primary_color);
        document.documentElement.style.setProperty('--info-card-separators', theme.secondary_color);
        document.documentElement.style.setProperty('--info-card-icon', theme.text_color);
        document.documentElement.style.setProperty('--info-card-hours-title', theme.title_text_color);
        document.documentElement.style.setProperty('--info-card-subtitle', theme.title_text_hover_color);
        document.documentElement.style.setProperty('--info-card-text', theme.background_color);
        document.documentElement.style.setProperty('--info-card-hours-text', theme.button_background_color);


        document.documentElement.style.setProperty('--button-hover-color', theme.button_hover_color);
        document.documentElement.style.setProperty('--button-text-color', theme.button_text_color);
        document.documentElement.style.setProperty('--button-count-color', theme.button_count_color);
        document.documentElement.style.setProperty('--card-background-color', theme.card_background_color);
        document.documentElement.style.setProperty('--card-text-color', theme.card_text_color);
        document.documentElement.style.setProperty('--card-price-color', theme.card_price_color);
  }
}
</script>
