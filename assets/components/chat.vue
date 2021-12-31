<template>
  <figure class="iconGroup" @click="openPage">
    <img class='icon' src="../img/chat.png" alt="file">
    <figcaption class="subIcon">Chat public</figcaption>
  </figure>

  <div v-if='pageOpen' class="page">
    <div class="noteHeader">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 svgTop" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
        </svg>
        Chat public
        <svg @click="closePage" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 closeBtn svgTop" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </div>
    <div class="noteContent">

      <!-- affiche les messages -->
      <div class="message messageList" id="messageList" v-for="message in this.messages" :key="message">
        <p>{{ message.content }}</p>
        <div class="subMessage">
          <p class="authorSubMessage">by Anonymous</p>
          <p class="dateSubMessage">{{ message.post_at }}</p>
        </div>
      </div>

    </div>
    <div class="noteFooter">

      <!-- ajoute un nouveau message -->
      <form class="newMessageForm" action="javascript:void(0)">
        <input class="newMessageField" type="textarea" placeholder="Nouveau message">
        <input @click="sendNewMsg()" class="newMessageSubmit" type="submit" value="Envoyer">
      </form>

    </div>
  </div>
</template>

<script type="application/javascript">
import axios from 'axios';
export default {
  name: "chat",
  data () {
    return {
      pageOpen: false,
      messages: null,
      tsFormatter: Intl.DateTimeFormat('fr', { month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' })

    }
  },
  props: ['demo'],
  methods: {
    openPage () {
      if (this.pageOpen==false){
        this.pageOpen=true;
        this.loadMessages();
      }
    },
    closePage () {
      if (this.pageOpen==true){
        this.pageOpen=false;
      }      
    },

    loadMessages() {
      axios.get("/api/messages").then(response => {
        let data = response.data;

        // format toutes les dates immutables de la BDD
        data.forEach(message => {
          let timestamp = Date.parse(message.post_at);
          let dateMsg = this.formatTimestamp(new Date(timestamp));
          message.post_at = dateMsg;
          
          // let dateFormated = dateMsgBrut
        });

        this.messages = data;
      });

      setTimeout(() => {this.scrollDown()}, 1000)
    },

    formatTimestamp (ts) {
      // console.log(ts);
      return this.tsFormatter.format(ts);
    },

    sendNewMsg(){
      let message = document.getElementsByClassName('newMessageField')[0].value;
      let dataMessage = { 
        message: message
      }

      if (message != ""){
          // requête pour envoyer le message dans la BDD
          axios.post(`/api/new-message`, {
            dataMessage
          },{
            headers: {
              'Content-type': 'application/json'
            }
          })
          .then(this.msgSend())
          .catch(err => console.warn(err));
      }
    },

    msgSend(){
      let message = '';
      document.getElementsByClassName('newMessageField')[0].value = message;
      this.loadMessages();
    },

    scrollDown(){
      let messageBody = document.querySelectorAll('.messageList');
      let goodIndex = messageBody.length - 1 
      let lastmsg = messageBody[goodIndex];
      lastmsg.scrollIntoView({ behavior: 'smooth' });
    },
  },
};
</script>

<style scoped>
/* icon sur le bureau */
  .iconGroup{
    padding: 5px;
    max-height: 100px;
    max-width: 100px;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 10px;
  }
  .iconGroup:hover{
    background: lightgray;
    opacity: 50%;
    /* cursor: pointer; */
  }
  .icon{
    height: 65px;
    width: 65px;
    max-height: 75px;
    max-width: 75px;
    text-align: center;
  }
  .subIcon{
    text-align: center;
    color: white;
    margin-top: 5px;
  }
  .iconGroup:hover > .subIcon{
    color: black;
  }

/* ouverture de la page */
  .page{
    position: absolute;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    margin-left: auto;
    margin-right: auto;
    top: 65px;
    left: 0;
    right: 0;
    background: rgb(228, 225, 225);
    color: white;
    height:90vh;
    width: 90vw;
    z-index: 100;
    border-radius: 10px 10px 0 0;
  }
  .svgTop{
    height: 40px;
    color: whitesmoke;
  }
  .svgBot{
    height: 20px;
    color: whitesmoke;
  }
  .noteHeader{
    background: RGB(44,44,44);
    border-radius: 10px 10px 0 0;
    height: 50px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: white;
    padding: 0 10px;
  }
  .closeBtn{
    color: red;
  }
  .closeBtn:hover{
    color: white;
    cursor: pointer;
  }
  .noteContent{
    padding: 0px;
    flex-grow: 10;
    overflow-y: scroll;
    scrollbar-color: rebeccapurple green;
    scrollbar-width: thin;
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }
  .noteFooter{
    background: #292825;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 30px;
    padding: 5px;
  }
  .message{
    display: flex;
    flex-direction: column;
    color: black;
    padding: 15px;
  }
  .message:hover{
    background: #a07a08;
  }
  .subMessage{
    display: flex;
    gap: 1rem;
    justify-content: space-between;
    padding-top: 1rem;
  }
  .dateSubMessage{
    text-align: end;
  }
  .authorSubMessage{
    font-style: italic;
  }
  .newMessageForm{
    display: flex;
    width: 100%;
  }
  .newMessageField{
    padding: 5px;
    flex-grow: 10;
  }
  .newMessageSubmit{
    padding: 5px;
  }

  /* @media (max-width: 1000px) {

  } */

  /* mobile */
  @media (max-width: 550px) {
    .page{
      border-radius: 0 0 0 0;
      height:100vh;
      width: 100vw;
      top: 0px;
    }
    .noteHeader{
      border-radius: 0 0 0 0;
    }
  }

</style>