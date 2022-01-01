import http from "../http-common";

class DataService {
  getAll() {
    return http.get("/connector.php");
  }

  create(data) {
    return http.post("/connector.php", data);
    
  }

  deleteAll(id) {
    
    return http.post("/connector.php", id);
  }

}

export default new DataService();