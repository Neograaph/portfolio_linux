<template>
  <figure class="iconGroup" @click="openPage" >
    <img class='icon' src="../img/terminal.png" alt="file">
    <figcaption class="subIcon">terminal</figcaption>
  </figure>

  <div v-if='pageOpen' class="page">

    <!-- popup terminal -->
    <div class="page1" id="page1" @click="getFocus()">  
      <div class="noteHeader">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 svgTop" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
          </svg>
          Terminal
          <svg @click="closePage" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 closeBtn svgTop" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
      </div>
      <div class="noteContent">
        <form class="formField" action="javascript:void(0)" @submit="execTerminalCmd">
        maxime@maxime-HM863BX ~ $
        <input v-model="cmd" class="inputField" id="inputField" type="text" :placeholder="placeholderI">
        <input class="submitField" type="submit" value=">">
        </form>
      </div>
    </div>
    <!-- fin popup terminal -->

    <!-- début popup notes -->
    <div class="page2">
      <div class="noteHeader">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 svgTop" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
        </svg>
        Commandes_terminal.txt
        <svg @click="closePage" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 closeBtn svgTop" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div>
      <div class="noteContent">
        - inscription <br/>
        - connexion <br/>
        - cv <br/>
        - mentionslegales <br/>
      </div>
      <div class="noteFooter">
        <div>loading /notes.txt"...</div>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 svgBot" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </div>
    </div>
    <!-- fin popup notes -->

  </div>
</template>

<script type="application/javascript">
export default {
  name: "terminal",
  data () {
    return {
      pageOpen: false,
      cmd: "",
      placeholderI: " En attente...",
      timerI: null,
    }
  },
  methods: {
    openPage () {
      if (this.pageOpen==false){
        this.pageOpen=true;
        this.clignoI();
        // console.log(this.pageOpen);
      }
    },
    closePage () {
      if (this.pageOpen==true){
        this.pageOpen=false;
        this.stopClignoI();
        // console.log(this.pageOpen);
      }      
    },
    clignoI(){
      this.timerI = setInterval (() => {
        this.switchPlaceholderI();
      }, 500)
      // this.getFocus()
    },
    stopClignoI(){
      clearInterval(this.timerI);
    },
    switchPlaceholderI(){
      if (this.placeholderI == " En attente..."){
        this.placeholderI = ''
        // console.log('0')
      }
      else if (this.placeholderI == ""){
        this.placeholderI = ' En attente...'
        // console.log('1')
      }
    },
    getFocus() {
      document.getElementById("inputField").focus();
    },


    // commandes du terminal
    execTerminalCmd(){
      // console.log(this.cmd);
      let currentUrl = window.location.href;
      if (this.cmd == "inscription"){
        window.location.href = currentUrl + "inscription"
      }
      else if (this.cmd == "Inscription"){
        window.location.href = currentUrl + "inscription"
      }
      else if (this.cmd == "i"){
        window.location.href = currentUrl + "inscription"
      }
      else if (this.cmd == "I"){
        window.location.href = currentUrl + "inscription"
      }
      else if (this.cmd == "connexion"){
        window.location.href = currentUrl + "connexion"
      }
      else if (this.cmd == "Connexion"){
        window.location.href = currentUrl + "connexion"
      }
      else if (this.cmd == "c"){
        window.location.href = currentUrl + "connexion"
      }
      else if (this.cmd == "C"){
        window.location.href = currentUrl + "connexion"
      }
      else if (this.cmd == "cv"){
        alert("CV disponible prochainement");
      }
      else if (this.cmd == "CV"){
        alert("CV disponible prochainement");
      }
      else if (this.cmd == "mentionslegales"){
        alert("© 2022 Maxime Gauthier. All Rights Reserved.");
      }
      else{
        alert("commande inconnue");
      }
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
    /* flex-direction: column; */
    justify-content: space-evenly;
    margin-left: auto;
    margin-right: auto;
    top: 60px;
    left: 0;
    right: 0;
    /* background: RGB(48,10,36); */
    color: white;
    height:90vh;
    width: 90vw;
    z-index: 100;
    /* border-radius: 10px 10px 0 0; */
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
    /* background: RGB(48,10,36); */
  }
  .noteFooter{
    background: #292825;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 30px;
    padding: 0 10px;
  }
  .formField{
    display: flex;
    align-items: center;

  }
  .inputField{
    background: RGB(48,10,36);
    border: none;
    outline: none;
    color: white;
    font-size: 1rem;
    flex-grow: 5;
    font-size: 1.1rem;
  }
  .submitField{
    background: RGB(48,10,36);
    border: none;
    outline: none;
    font-size: 1rem;
    color: white;
    cursor: pointer;
  }
  .page1{
    display: flex;
    flex-direction: column;
    height: 40vh;
    width: 45vw;
    background: RGB(48,10,36);
    border-radius: 10px 10px 0 0;

  }
  .page2{
    display: flex;
    flex-direction: column;
    height: 50vh;
    width: 30vw;
    background: RGB(0,27,51);
    border-radius: 10px 10px 0 0;
    margin-top: 200px;
    /* border: solid .5px black; */
  }

  /* mode tablette ou petit pc */
  /* breakpoint pour le terminal et les notes presque plein écran */
  @media (max-width: 1000px) {
    .page{
      flex-direction: column;
      height: 90vh;
      width: 90vw;
      top: 65px;
    }
    .page1{
      height: 40vh;
      width: 90vw;
    }
    .page2{
      height: 50vh;
      width: 90vw;
      margin-top: 5px;
    }
  }

  /* breakpoint pour le champs dans le terminal*/
  @media (max-width: 460px) {
    .formField{
      flex-direction: column;
      align-items: flex-start;
    }
    .submitField{
      text-align: start;
    }
  }

  /* mobile */
  @media (max-width: 550px) {
    .page{
      border-radius: 0 0 0 0;
      height:100vh;
      width: 100vw;
      top: 0px;
      margin-left: auto;
      margin-right: auto;
      left: 0px;
      right: 0px;
    }
    .noteHeader{
      border-radius: 0 0 0 0;
    }
    .page1{
      height: 50vh;
      width: 100vw;
    }
    .page2{
      height: 50vh;
      width: 100vw;
      margin-top: 0px;
    }
  }
</style>