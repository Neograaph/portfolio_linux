<template>
  <div class="bg">
    <topbar />
    <div class='iconsDesktop'>
      <presentation />
      <portfolio demo="5"/>
      <!-- <presentation />
      <presentation />
      <presentation /> -->
    </div>

  </div>
</template>

<script>
import topbar from '../components/topbar.vue';
import presentation from '../components/presentation.vue';
import portfolio from '../components/portfolio.vue';
export default {
  components: {
    topbar,
    presentation,
    portfolio,
  },
  props: ['demo'],
}
</script>

<style>
*{
  margin: 0;
  padding: 0;
}
.bg{
  height: 100vh;
  width: 100vw;
  background: url('../img/ubuntu21.jpeg');
  background-position: center;
}
/* .iconsDesktop{
  display: flex;
  flex-direction: column;
  gap: 20px;
} */
</style>