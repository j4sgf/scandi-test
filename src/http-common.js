import axios from "axios";

export default axios.create({
  baseURL: "https://webstorev2.000webhostapp.com/api",
  headers: {
    "Content-type": "application/json"
  }
});