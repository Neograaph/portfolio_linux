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
      <div class="containerCards">
        <div v-for='project in this.portfolio' :key='project' class="card">
            <div class="nameProject">{{project.name}}</div>
            <div class="imgProject"><img :src="project.img" alt="image non disponible"> </div>
            <div>{{project.languages}}</div>
            <div>{{project.description}}</div>
            <div><a :href="project.link_web" target="_blank"></a></div>
            <div>{{project.link_repo}}</div>
            <div>{{project.date}}</div>
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
    background: rgb(155, 155, 160);
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
  }
  .noteFooter{
    background: #292825;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 30px;
    padding: 0 10px;
  }
  .containerCards{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
  .card{
    margin: 1%;
    border: solid 1px black;
    height: 35vh;
    width: 25vw;
    /* min-height: 40vh;
    min-width: 20vw; */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    padding: 5px;
  }
  .card img{
    max-height: 20vh;
    max-width: 20vw;
  }
  .imgProject{
    flex-grow: 10;
  }
  .nameProject{
    margin-bottom: 10px;
  }
</style>