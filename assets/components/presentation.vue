<template>
  <figure class="iconGroup">
    <img class='icon' src="../img/file.png" alt="file">
    <figcaption class="subIcon">maxime</figcaption>
  </figure>
</template>

<script type="application/javascript">
export default {
  name: "presentation"
};
</script>

<style>
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
</style>