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
            <input placeholder="Nom" type="text">
            <input placeholder="Prénom" type="text">
            <input placeholder="Titre" type="text">
            <textarea placeholder="Message" class="txtarea" rows="10" style="resize: none;"></textarea>
            <input type="submit" value="Envoyer">
          </form>

          <div class="contactRS">
            <div>Je suis aussi disponible sur :</div>
            <img src="../img/linkedIn.png" alt="logo linkedIn">
            <img src="../img/malt.png" alt="logo malt">
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
  .contactRS > img{
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
  }
  .contactPicture > img{
    height: 30vh;
    border: thick double #32a1ce;
  }
  @media only screen and (max-width: 1150px){
    .contentForm{
      flex-direction: column;
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
  }
</style>