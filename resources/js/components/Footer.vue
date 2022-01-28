<template>
  <div class="footer">
    <div class="row1">
      <div class="col-md-2 col-sm-6 logosection" :style="{height:'inherit'}">
        <img src="/images/Sht-logo.png" class="img1" />
        <h6 class="txt">@2021 Shorthills Tech LLC<br />Shorthills NJ</h6>
      </div>
      <div class="col6" :style="{height:'inherit'}">
        <h4 class="icon"><img src="/images/link.png" alt="" /></h4>
        <h4 class="icon"><img src="/images/face.png" alt="" /></h4>

        <h6 :style="{ width: '100%', textAlign: 'end' }" class="txt">
          info@Shorthills.com
        </h6>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Abel&family=Anton&family=Josefin+Sans&family=Lexend+Deca&family=Livvic:wght@500&family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;1,200;1,300&display=swap");

.row1 {
  display: inline-flex;
  justify-content: space-around;
  font-family: "Montserrat", sans-serif;

  align-items: center;
  width: 100%;
}
.img1 {
  margin: 18px 0px;
}
.col6 {
  width: 50%;
  display: inline-flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: flex-end;
}
.icon {
  font-size: 35px;
  color: white;
  margin: 0px 10px;
}
.col2 {
  width: 20%;
  justify-content: center;
  align-items: center;
}
.txt {
  margin-top: 18px;
  font-size: 18px;
}
.footer {
  display: flex;
  justify-content: center;
  height: 176px;
  margin: 0px;
  align-items: center;
  font-family: "Montserrat", sans-serif;
  width: 100%;
  background: #1e242e;
  color: white;
}
@media (max-width: 1400px) {
  .txt {
    height: 140px;
    font-size: 16px;
  }
  .col6,.logosection{
    margin-top: 10%;
  }
  .img1{
    margin:0px;
  }
  
 
}
@media (max-width: 750px) {
  .row1 {
    padding: 18px;
    height: 140px;
  }
  .footer{
    height: 140px;
  }

  .txt {
    font-size: 12px;
  }
  .icon {
    font-size: 20px;
  }
}
</style>