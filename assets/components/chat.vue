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
      <div class="message" v-for="message in this.messages" :key="message">
        <p>{{ message.content }}</p>
        <div class="subMessage">
          <p>by Anonymous</p>
          <p class="dateSubMessage">{{ message.post_at }}</p>
        </div>
      </div>

    </div>
    <div class="noteFooter">
      <!-- ajoute un nouveau message -->
      <form class="newMessageForm" action="javascript:void(0)">
        <input class="newMessageField" type="textarea" placeholder="Nouveau message">
        <input class="newMessageSubmit" type="submit" value="Envoyer">
      </form>
      <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 svgBot" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg> -->
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
        this.messages = data;
        console.log(data);
        console.log(this.messages);
        console.log(this.messages[0].content)
      });
    }
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
    padding: 10px 10px 10px 10px;
    flex-grow: 10;
    overflow-y: scroll;
    scrollbar-color: rebeccapurple green;
    scrollbar-width: thin;
    display: flex;
    flex-direction: column;
    /* align-items: center; */
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
  }
  .message:hover{
    background: #a07a08;
  }
  .subMessage{
    display: flex;
    gap: 1rem;
    justify-content: space-between;
  }
  .dateSubMessage{
    text-align: end;
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