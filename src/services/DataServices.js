import http from "../http-common";

class DataService {
  getAll() {
    return http.get("/connector");
  }

  create(data) {
    return http.post("/connector.php", data);
    
  }


  delete(id) {
    return http.delete(`/connector/${id}`);
  }

  deleteAll() {
    return http.delete(`/connector`);
  }

}

export default new DataService();