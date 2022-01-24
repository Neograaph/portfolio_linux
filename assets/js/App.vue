<template>
  <div class="bg">
    <topbar />
    <div class='iconsDesktop'>
      <presentation />
      <portfolio />
      <contact />
      <terminal />
      <chat v-if="login" />
    </div>

  </div>
</template>

<script>
import topbar from '../components/topbar.vue';
import presentation from '../components/presentation.vue';
import portfolio from '../components/portfolio.vue';
import contact from '../components/contact.vue';
import chat from '../components/chat.vue';
import terminal from '../components/terminal.vue';

import axios from 'axios';

export default {
  components: {
    topbar,
    presentation,
    portfolio,
    contact,
    terminal,
    chat
  },
  data () {
    return {
      login: false,
      infoUser: null,
      url: null,
      pseudo: null,
    }
  },
  methods: {
    loadInfosUser() {
    axios.get("/api/infos-user").then(response => {
      let data = response.data;
      this.infoUser = data;
      if (this.infoUser.username != null){
        this.login = true;
        this.pseudo = this.infoUser.username;
      }
    });
    }
  },
  // watch: {
  //   nowTimeStamp (newVal, oldVal) {
  //     // console.log(newVal, oldVal);
  //     this.nowTime = this.formatTimestamp(newVal);
  //   },
  // },
  afterMount(){
    this.loadInfosUser();
  }
}
</script>

<style>
*{
  margin: 0;
  padding: 0;
}
.bg{
  height: 100vh;
  width: 100vw;
  background: url('../img/ubuntu21.jpeg');
  background-position: center;
}
/* .iconsDesktop{
  display: flex;
  flex-direction: column;
  gap: 20px;
} */
</style>