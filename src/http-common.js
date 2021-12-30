import axios from "axios";

export default axios.create({
  baseURL: "https://webstorev2.000webhostapp.com/api",
  headers: {
    "Content-type": "application/x-www-form-urlencoded"
  }
});

// https://webstorev2.000webhostapp.com/api 

// http://localhost:8888/src/api