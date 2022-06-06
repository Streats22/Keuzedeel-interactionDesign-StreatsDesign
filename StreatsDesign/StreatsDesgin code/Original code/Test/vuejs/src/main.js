import Vue from 'vue'
import App from './App.vue'
import { Slide } from 'vue-burger-menu'  // import the CSS transitions you wish to use, in this case we are using `Slide`
 
export default {
    components: {
        Slide // Register your component
    }
}W

Vue.config.productionTip = false

new Vue({
  render: h => h(App),
}).$mount('#app')
