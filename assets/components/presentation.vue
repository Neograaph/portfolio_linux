<template>
  <figure class="iconGroup" @click="openPage">
    <img class='icon' src="../img/note.png" alt="file">
    <figcaption class="subIcon">maxime.txt</figcaption>
  </figure>

  <div v-if='pageOpen' class="page">
    <div class="noteHeader">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 svgTop" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
        </svg>
        maxime.txt
        <svg @click="closePage" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 closeBtn svgTop" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </div>
    <div class="noteContent">
      Je m'appelle Maxime, j'ai {{ neoAge }} ans et je suis développeur. Je vous présente ici certains de mes projets, réalisés lors de mes formations ou pendant mon temps libre.<br/><br/>

      Au cours de mes projets, j'ai eu l'occasion de travailler sur plusieurs langages de programmation, ainsi que sur différents frameworks et librairies. J'adore apprendre, donc découvrir des nouvelles choses me plait énormément.<br/><br/>

      Je travaille sous Linux et j'apprécie énormément cet univers, c'est ce qui m'a donné envie de réaliser ce design original pour mon portfolio. N'hésitez pas à l'explorer pour découvrir toutes ses fonctionalités...<br/><br/>

      Pour toute demande, n'hésitez pas à me contacter par mail ou sur les réseaux.<br/><br/>

      <a class="linkLinkedIn" href="https://www.linkedin.com/in/maxime-gauthier45/" target="_blank">www.linkedin.com/maxime-gauthier</a>
    </div>
    <div class="noteFooter">
      <div>loading file "/home/maxime/desktop/maxime.txt"...</div>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 svgBot" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </div>
  </div>
</template>

<script type="application/javascript">
export default {
  name: "presentation",
  data () {
    return {
      pageOpen: false,
      neoAge: 26,
    }
  },
  methods: {
    openPage () {
      if (this.pageOpen==false){
        this.pageOpen=true;
        // calcul de l'age
        const _MS_PER_DAY = 1000 * 60 * 60 * 24;
        function dateDiffInDays(a, b) {
          // Discard the time and time-zone information.
          const utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
          const utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());
          return Math.floor((utc2 - utc1) / _MS_PER_DAY);
        }

        const a = new Date("1995-09-24"),
            b = new Date(),
            difference = dateDiffInDays(a, b);
            // console.log(difference);
            this.neoAge = difference / 365;
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
    /* margin-top: 10px; */
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
  }
  .noteFooter{
    background: #292825;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 30px;
    padding: 0 10px;
  }
  .linkLinkedIn{
    color: orangered;
  }
  .linkLinkedIn:hover{
    color: red;
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