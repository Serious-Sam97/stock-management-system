import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import colors from 'vuetify/lib/util/colors'

Vue.use(Vuetify)

const opts = {
    theme: {
        themes: {
            sms:  {
                primary: colors.green.base,
                secondary: colors.grey.base,
                accent: colors.purple.base,
                error: colors.red.base,
                warning: colors.amber.base,
                info: colors.cyan.base,
                success: colors.teal.base
            },
        }
    },
    icons: {
        iconfont: 'fa',
    },
}

export default new Vuetify(opts)