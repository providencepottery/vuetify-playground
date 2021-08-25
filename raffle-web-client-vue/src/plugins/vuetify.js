import Vue from 'vue';
import Vuetify from 'vuetify/lib/framework';

Vue.use(Vuetify);

const vuetify = new Vuetify({
    theme: {
        themes: {
            light: {
                primary: "#2196f3",
                secondary: "#474747",
                anchor: "#212121"
            }
        }
    }
})

export default vuetify
