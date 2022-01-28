<template>
  <div class="header" ref="navbar">
    <div class="col2">
      <img
        src="/images/SHT-logo.png"
        class="img"
        :style="{ height: '50px' }"
      />
    </div>
   
    
  </div>
</template>

<script>
export default {
  mounted() {
    let width = this.$refs.navbar.clientWidth;
  
    this.width = width;

    if (width <= 750) {
      this.smallscreen = false;
    }
  },
  data() {
    return {
      smallscreen: true,
      width: "",
      route,
    };
  },
  methods: {
    handleClick() {
      this.smallscreen = this.smallscreen == true ? false : true;
    },
  },
};
</script>

<style scoped>
.row1 {
  display: inline-flex;
  justify-content: center;
  padding: 10px;

  align-items: center;
  width: 100%;
}
.signup {
  background: #51c1cd;
  color: white;
}
.btn {
  padding: 5px 35px;
  margin: 0px 5px;
  border: 1px solid lightgray;
  border-radius: 5px;
}

.col6 {
  width: 50%;
  display: inline-flex;
  align-items: center;
  justify-content: flex-end;
}
.col10{
  width: 100%;
}
.col8 {
  width: 70%;
  justify-content: center;
  align-items: center;
}
.col2 {
  display: inline-flex;
  width: 30%;
  margin-right: 85%;
  justify-content: flex-start;
  align-items: center;
}
.logotxt {
  margin-top: 10px;
}
.header {
  display: flex;
  justify-content: flex-end;
  flex-wrap: wrap;
  padding: 4px 10%;
  height: 73px;
  align-items: center;
  width: 100%;
  background: white;
}
@media (max-width: 750px) {
 .col2{
   justify-content:flex-start;
   width:2%;
   margin-right: 100%;
 }
 .header{
   padding:4px 0px;
 }
 .col2 > .logotxt{
margin-top: 0px;
margin-left: 0px;
margin-right: 0px;
 }
  .col2  img{
margin-left: 10px;
 }
 
}
</style>