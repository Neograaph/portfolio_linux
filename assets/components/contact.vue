<template>
  <figure class="iconGroup" @click="openPage">
    <img class='icon' src="../img/mail.png" alt="file">
    <figcaption class="subIcon">contact</figcaption>
  </figure>

  <div v-if='pageOpen' class="page">
    <div class="noteHeader">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 svgTop" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
        </svg>
        contact
        <svg @click="closePage" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 closeBtn svgTop" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </div>
    <div class="noteContent">

      <div class="zoneForm">
        <div class="contentForm">

          <div class="contactPicture">
            <img src="../img/moi.png" alt="maxime gauthier photo">
          </div>

          <form action="javascript:void(0)" method="post" class="contactForm">
            <input class='fieldContact' placeholder="Nom prénom ou pseudo" type="text" id="usernameContact">
            <input class='fieldContact' placeholder="Email" type="email" id="emailContact">
            <input class='fieldContact' placeholder="Titre du message" type="text" id="titleContact">
            <textarea placeholder="Message" class="txtarea fieldContact" rows="8" style="resize: none;" id="messageContact"></textarea>
            <input type="submit" value="Envoyer" class="button button3" @click="sendMsg">
          </form>

          <div class="contactRS">
            <div>Je suis aussi disponible sur :</div>
            <a href="https://www.linkedin.com/in/maxime-gauthier45/" target="_blank">
              <img src="../img/linkedin.png" alt="logo linkedIn" class="linkedInLogo">
            </a>
            <a href="https://www.malt.fr/profile/maximegauthier1" target="_blank">
              <img src="../img/malt.png" alt="logo malt">
            </a>
          </div>

        </div>
      </div>

    </div>
    <div class="noteFooter">
      <div>loading file "/home/maxime/desktop/contact"...</div>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 svgBot" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </div>
  </div>
</template>

<script type="application/javascript">
import axios from 'axios';
export default {
  name: "contact",
  data () {
    return {
      pageOpen: false,
    }
  },
  methods: {
    openPage () {
      if (this.pageOpen==false){
        this.pageOpen=true;
        // console.log(this.pageOpen);
      }
    },
    closePage () {
      if (this.pageOpen==true){
        this.pageOpen=false;
        // console.log(this.pageOpen);
      }      
    },
    sendMsg () {
      let username = document.getElementById('usernameContact').value;
      let email = document.getElementById('emailContact').value;
      let title = document.getElementById('titleContact').value;
      let message = document.getElementById('messageContact').value;
      let dataContact = { 
        username: username, 
        email: email, 
        title: title, 
        message: message
      }
      let dataContactJson = JSON.stringify(dataContact);
      // console.log(dataContactJson);
      // console.log(dataContact);
      // console.log(axios);

      axios.post(`/new-msg`, {
        dataContact
      },{
        headers: {
          'Content-type': 'application/json'
        }
      })
      .then(this.msgSend())
      .catch(err => console.warn(err));

      //  alert(this.response);
    },
    msgSend(){
      // console.log('ok')
      let username = '';
      let email = '';
      let title = '';
      let message = '';
      document.getElementById('usernameContact').value = username; 
      document.getElementById('emailContact').value = email;
      document.getElementById('titleContact').value = title;
      document.getElementById('messageContact').value = message;
      alert("message envoyé");
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
    cursor: pointer;
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
    background: RGB(0,27,51);
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
    padding: 5px 10px 5px 10px;
    flex-grow: 10;
    display: flex;
    justify-content: center;
  }
  .noteFooter{
    background: #292825;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 30px;
    padding: 0 10px;
  }
  .zoneForm{
    height: 80vh;
    width: 80vw;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .contentForm{
    display: flex;
    gap: 50px;
  }
  .contactForm{
    display: flex;
    flex-direction: column;
    /* align-content: center; */
    justify-content: center;
    gap: 10px;
  }
  .contactRS{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 40px;
  }
  .contactRS > a > img{
    height: 80px;
    cursor: pointer;
  }
  .txtarea{
    resize: none;
    /* width: 25vw;
    height: 40vh; */
  }
  .contactPicture{
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .contactPicture > img{
    height: 30vh;
    border: thick double #32a1ce;
  }

  .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  }
  .button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
  }
  .button3:hover {
    background-color: #f44336;
    color: white;
  }

  .fieldContact{
    padding: 5px;
  }





  /* responsive */
  @media only screen and (max-width: 1150px){
    .contentForm{
      flex-direction: column;
      padding-top: 80px;
      width: 80vw;
      /* padding: 20% 0; */
    }
    .noteContent{
      overflow-y: scroll;
      scrollbar-color: rebeccapurple green;
      scrollbar-width: thin;
    }
    .contactPicture{
      padding-top: 40vh;
    }
    .contactRS{
      padding-bottom: 30px;
    }
    .linkedInLogo{
      scale: 70%;
    }
  }

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