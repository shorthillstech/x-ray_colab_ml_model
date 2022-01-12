require("./bootstrap");

import { library } from '@fortawesome/fontawesome-svg-core'
import { faFacebookSquare, faLinkedin } from '@fortawesome/free-brands-svg-icons'
import { faUserSecret,faTimes,faDownload,faTrash,faSave,faBars } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

window.Vue = require("vue").default;

library.add(faUserSecret,faTimes,faDownload, faTrash, faSave,faFacebookSquare,faLinkedin,faBars)

Vue.component('font-awesome-icon', FontAwesomeIcon)


import router from "./router";
import App from "./vue/App";

new Vue({
    el: "#app",
    components: {
        App
    },
    router
});
