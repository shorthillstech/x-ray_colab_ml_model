<template>
  <div class="mainbody">
     <Header/>
  <div class="mainContainer">
    <div class="main">
      <div class="pictures">
        <div class="left">
          <div class="imgBox">
            <img
              class="head"
              @click="enterImage('/images/chest2.jpeg')"
              src="/images/chest2.jpeg"
            />
          </div>
        </div>
        <div class="middle">
          <div class="imgBox">
            <img
              class="chest"
              @click="enterImage('/images/chest.jpg')"
              src="/images/chest.jpg"
            />
          </div>
        </div>
        <div class="right">
          <div class="imgBox">
            <img
              id="myinput"
              @click="enterImage('/images/chest3.jpg')"
              class="hand"
              src="/images/chest3.jpg"
            />
          </div>
        </div>
      </div>
      <!-- input image box -->
      <div class="imgInput">
        <div class="labelXray">
          <label for="data">Select X-Ray</label>
        </div>
        <div class="inputField">
          <input id="data" @input="saveItem" type="file" />
        </div>
      </div>
      <div class="displayResult">
        <div class="loader" v-if="loader">
          <span class="spinner-border"> </span>
        </div>
        <div class="resultImg border1" v-if="image !== ''">
          <div class="imgBox">
            <img
              v-if="image !== ''"
              :src="'data:image/png;base64,' + image"
              class="setDim"
            />
          </div>
        </div>
        <div class="resultTable" v-if="loader === false">
          <div v-if="data.length != 0" class="row">
            <div class="bg-dark text-white col-6 text-center">Disease</div>
            <div class="bg-dark text-white col-6 text-center">Probability</div>
          </div>
          <div v-for="(item, keyValue) in data" :key="{ keyValue }" class="row">
            <div class="col-6 border text-center">
              {{ keyValue }}
            </div>
            <div class="col-6 border text-center">
              {{ item }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <Footer/>
  </div>
</template>

<script>
import Footer from './Footer.vue';
import Header from './Header.vue';


export default {
  components: { Header, Footer },
  data() {
    return {
      data: [],
      image: "",
      url: "",
      border: true,
      loader: false,
    };
  },
  created() {
    axios
      .get("/hello/xray")
      .then((response) => (this.url = response.data[0]["url"]));
  },
  methods: {
    enterImage(src) {
      (this.data = []), (this.image = ""), (this.loader = true);
      var img = new Image();
      img.crossOrigin = "Anonymous";
      (img.onload = () => {
        console.log("data url", this.url);
        var canvas = document.createElement("CANVAS");
        var ctx = canvas.getContext("2d");
        var dataURL;
        canvas.height = img.naturalHeight;
        canvas.width = img.naturalWidth;
        ctx.drawImage(img, 0, 0);
        dataURL = canvas.toDataURL(src);
        console.log("data url", dataURL);
        axios
          .get(this.url + "/dicom?dicom=" + dataURL.split(",")[1])
          .then((response) => {
            let value = response.data.probability_data;
            let val = value.replaceAll("'", '"');
            let value1 = JSON.parse(val);
            this.data = value1;
            this.image = dataURL.split(",")[1];
            console.log("image", this.image);
            this.loader = false;
          });
      }),
        (img.src = src);
    },
    saveItem(e) {
      (this.data = []), (this.image = ""), (this.loader = true);
      const files = e.target.files[0];
      console.log(files);
      var reader = new FileReader();
      reader.readAsDataURL(files);
      console.log("data 1 url", this.url);
      reader.addEventListener("load", () => {
        axios
          .get(this.url + "/dicom?dicom=" + reader.result.split(",")[1])
          .then((response) => {
            console.log(reader.result.split(",")[1]);
            let value = response.data.probability_data;
            let val = value.replaceAll("'", '"');
            let value1 = JSON.parse(val);
            //console.log(value1);
            this.data = value1;
            this.image = reader.result.split(",")[1];
            console.log("image", this.image);
            this.loader = false;
          });
      });
    },
  },
};
</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Open Sans", sans-serif;
}
.mainbody{
  width: 100%;
  height: 100%;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  
}
.mainContainer {
  display: flex;
  justify-content: center;
  align-items: center;
  background: linear-gradient(180deg, #EBFDFF 0%, #FFFFFF 100%);
  height: 100%;
   flex: 1 0 auto;
}
.main {
  position: relative;
  width: 96%;
  margin: 20px auto 20px;
  /* max-width: 100%; */
  border: none;
  display: block;
}
.pictures {
  position: relative;
  width: 100%;
  height: 300px;
  display: flex;
}
.left {
  position: relative;
  display: flex;
  width: 30%;
  flex: 30%;
  justify-content: center;
  align-items: center;
  border: 10px solid black;
}
.left .imgBox {
  margin: auto;
}
.head {
  width: 300px;
  height: 200px;
}

.middle {
  position: relative;
  display: flex;
  width: 30%;
  flex: 30%;
  margin: 0 20px 0;
  justify-content: center;
  align-items: center;
  border: 10px solid black;
}
.middle .imgBox {
  margin: auto;
}
.chest {
  width: 300px;
  height: 200px;
}
.right {
  position: relative;
  display: flex;
  width: 30%;
  flex: 30%;
  justify-content: center;
  align-items: center;
  border: 10px solid black;
}
.right .imgBox {
  margin: auto;
}
.hand {
  width: 300px;
  height: 200px;
}
.main_head {
  font-size: 55px;
}

.imgInput {
  position: relative;
  display: flex;
  margin-top: 50px;
  width: 100%;
  height: 100px;
}
.labelXray {
  width: 45%;
  text-align: end;
}
.labelXray label {
  font-size: 15px;
  font-weight: 600;
}
.inputField {
  width: 50%;
  margin-left: 30px;
}
.inputField input {
  font-size: 15px;
}
.displayResult {
  position: relative;
  display: flex;
  width: 100%;
}
.loader {
  width: 100%;
  text-align: center;
}
.resultImg {
  position: relative;
  display: flex;
  width: 30%;
  flex: 30%;
  justify-content: center;
  align-items: center;
}
.border1 {
  border: 10px solid black;
}
.resultImg .imgBox {
  margin: auto;
}
.resultTable {
  position: relative;
  margin-left: 10px;
  width: 70%;
}

.br {
  outline: none;
}
label {
  font-size: 20px;
}
.details {
  height: 300px;
}
.setDim {
  width: 300px;
  height: 200px;
}

@media only screen and (max-width: 600px) {
  .mainContainer {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .main {
    margin: 0px;
    padding: 0;
    width: 100vw;
    height: 100%;
    overflow-x: hidden;
  }
  .pictures {
    margin: auto;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    /* flex-direction: column; */
    width: 100%;
    height: auto;
    justify-content: center;
    align-items: center;
  }
  .left {
    margin: 0;
    padding: 0;
    width: 100%;
  }
  .middle {
    margin: 20px 0 20px;
    width: 100%;
  }
  .right {
    margin: 0;
    padding: 0;
    width: 100%;
  }
  .displayResult {
    margin: 0;
    padding: 0;
    width: 100%;
    display: block;
  }
  .inputField {
    margin: 0;
  }
  .resultImg {
    width: 100%;
  }
  .resultTable {
    margin-top: 10px;
    width: 100%;
  }
}
</style>
