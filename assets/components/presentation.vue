<template>
  <figure class="iconGroup" @click="openPage">
    <img class='icon' src="../img/file.png" alt="file">
    <figcaption class="subIcon">maxime</figcaption>
  </figure>

  <div v-if='pageOpen' @click="closePage" class="page">
    YOOOO
  </div>
</template>

<script type="application/javascript">
export default {
  name: "presentation",
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
  // watch: {
  //   isOpenPage () {
  //     if (this.pageOpen==true){
        
  //     }
  //   }
  // }
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
  }

/* ouverture de la page */
  .page{
    position: absolute;
    margin-left: auto;
    margin-right: auto;
    top: 65px;
    left: 0;
    right: 0;
    background: red;
    height:90vh;
    width: 90vw;
    z-index: 100;
  }
</style>