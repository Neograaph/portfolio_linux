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
          <a :href="project.link_web" target="_blank" class="linkWeb">
            <img :src="project.img" alt="image non disponible"/>
            <div class="text">
              <h1 class="nameProject">{{project.name}}</h1>
              <h2 class="animate-text">{{project.languages}}</h2>
              <p class="animate-text">{{ project.date }}</p>
              <p class="animate-text">{{project.description}}</p>
              <!-- <a :href="project.link_repo" class="animate-text link" target="_blank">Code du projet</a> -->
            </div>
          </a>
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
    loadPortfolio(event) {
      axios.get("/api/portfolio").then(response => {
        let data = response.data;
        this.portfolio = data;
        // console.log(data);
        // console.log(this.portfolio);
        // console.log(this.portfolio[0].name)
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
    cursor:pointer;
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
  }
  .tile h1{
    font-weight:300;
    text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
    font-family: 'Permanent Marker';
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
  .link{
    text-decoration: none;
    color: white;
  }

  /* mobile */
  @media (max-width: 550px) {
    .tile{
      height: 60vw;
      width: 60vw;
    }
  }
</style>