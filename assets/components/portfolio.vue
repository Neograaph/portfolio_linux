<template>
  <figure class="iconGroup" @click="openPage">
    <img class='icon' src="../img/portfolio.png" alt="file">
    <figcaption class="subIcon">portfolio</figcaption>
  </figure>

  <div v-if='pageOpen' class="page">
    <div class="noteHeader">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 svgTop" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
        </svg>
        Portfolio Maxime Gauthier
        <svg @click="closePage" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 closeBtn svgTop" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </div>
    <div class="noteContent">
      <div class="wrap" >

        <div class="tile" v-for='project in this.portfolio' :key='project'> 
            <img :src="project.img" alt="image non disponible"/>
            <div class="text">

              <h1 class="nameProject">{{project.name}}</h1>
              <h2 class="animate-text">{{project.languages}}</h2>
              <p class="animate-text">{{ project.date }}</p>
              <p class="animate-text descCard">{{project.description}}</p>
              <div class="animate-text liensCards">

                <a class="svgLink" :href="project.link_web" target="_blank">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                  </svg>
                </a>
                
                <a class="svgLink" :href="project.link_repo" target="_blank">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-4.466 19.59c-.405.078-.534-.171-.534-.384v-2.195c0-.747-.262-1.233-.55-1.481 1.782-.198 3.654-.875 3.654-3.947 0-.874-.312-1.588-.823-2.147.082-.202.356-1.016-.079-2.117 0 0-.671-.215-2.198.82-.64-.18-1.324-.267-2.004-.271-.68.003-1.364.091-2.003.269-1.528-1.035-2.2-.82-2.2-.82-.434 1.102-.16 1.915-.077 2.118-.512.56-.824 1.273-.824 2.147 0 3.064 1.867 3.751 3.645 3.954-.229.2-.436.552-.508 1.07-.457.204-1.614.557-2.328-.666 0 0-.423-.768-1.227-.825 0 0-.78-.01-.055.487 0 0 .525.246.889 1.17 0 0 .463 1.428 2.688.944v1.489c0 .211-.129.459-.528.385-3.18-1.057-5.472-4.056-5.472-7.59 0-4.419 3.582-8 8-8s8 3.581 8 8c0 3.533-2.289 6.531-5.466 7.59z"/>
                  </svg>
                </a>

              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="noteFooter">
      <div>loading file "/home/maxime/desktop/portfolio"...</div>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 svgBot" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </div>
  </div>
</template>

<script type="application/javascript">
import axios from 'axios';
export default {
  name: "portfolio",
  data () {
    return {
      pageOpen: false,
      portfolio: null,
    }
  },
  props: ['demo'],
  methods: {
    openPage () {
      if (this.pageOpen==false){
        this.pageOpen=true;
        this.loadPortfolio();
      }
    },
    closePage () {
      if (this.pageOpen==true){
        this.pageOpen=false;
      }      
    },
    loadPortfolio() {
      axios.get("/api/portfolio").then(response => {
        let data = response.data;
        this.portfolio = data;
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
    align-items: center;
  }
  .noteFooter{
    background: #292825;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 30px;
    padding: 0 10px;
  }
  .wrap{
    margin:50px auto 50px auto;
    width:100%;
    display:flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    /* max-width:1200px; */
    row-gap: 5rem;
  }
  .tile{
    width:380px;
    height:380px;
    margin:10px;
    background-color:#99aeff;
    display:inline-block;
    background-size:cover;
    position:relative;
    /* cursor:pointer; */
    transition: all 0.4s ease-out;
    box-shadow: 0px 35px 77px -17px rgba(0,0,0,0.10);
    overflow:hidden;
    color:white;
    font-family:'Roboto';
    width: 400px;
    
  }
  .tile img{
    height:100%;
    width:100%;
    position:absolute;
    top:0;
    left:0;
    z-index:0;
    transition: all 0.4s ease-out;
  }
  .tile .text{
    /* z-index:99; */
    position:absolute;
    height:100%;
    width: 100%;
    color: white;
    display: flex;
    flex-direction: column;
  }
  .tile h1{
    font-weight:300;
    text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
    font-family: 'ubuntu';
    text-align: center;
    color: white;
    background: #0000005c;
  }
  .tile h2{
    font-weight:100;
    margin:20px 0 0 0;
    padding: 0 0 0 20px;
    font-style:italic;
    transform: translateX(200px);
  }
  .tile p{
    font-weight:300;
    margin:20px 0 0 0;
    padding: 0 0 0 20px;
    line-height: 25px;
  /*   opacity:0; */
    transform: translateX(-200px);
    transition-delay: 0.2s;
  }
  .animate-text{
    opacity:0;
    transition: all 0.6s ease-in-out;
  }
  .tile:hover{
    box-shadow: 0px 35px 77px -17px rgba(0,0,0,0.64);
    transform:scale(1.05);
    background-color:#0000005c;
  }
  .tile:hover .text{
    background: #0000005c;
  }
  .tile:hover img{
    opacity: 0.2;
  }
  .tile:hover .animate-text{
    transform:translateX(0);
    opacity:1;
  }
  .liensCards{
    display: flex;
    justify-content: space-evenly;
    margin-bottom: 1rem;
    cursor: pointer;
  }
  .descCard{
    flex-grow: 10;
  }
  .svgLink{
    color: black;
  }
  /* .dots{
    position:absolute;
    bottom:20px;
    right:30px;
    margin: 0 auto;
    width:30px;
    height:30px;
    color:currentColor;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:space-around;
    
  }
  .dots span{
    width: 5px;
    height:5px;
    background-color: currentColor;
    border-radius: 50%;
    display:block;
    opacity:0;
    transition: transform 0.4s ease-out, opacity 0.5s ease;
    transform: translateY(30px);
  }

  .tile:hover span{
    opacity:1;
    transform:translateY(0px);
  }

  .dots span:nth-child(1){
    transition-delay: 0.05s;
  }
  .dots span:nth-child(2){
    transition-delay: 0.1s;
  }
  .dots span:nth-child(3){
    transition-delay: 0.15s;
  } */


  @media (max-width: 1000px) {
    .wrap{
    flex-direction: column;
    align-content: center;
      /* width:400px; */
    }
  }
  /* .link{
    text-decoration: none;
    color: white;
  } */

  /* mobile */
  @media (max-width: 550px) {
    .tile{
      height: 80vw;
      width: 80vw;
    }
    .wrap{
    row-gap: 3rem;
    }
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