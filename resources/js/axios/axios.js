import axios from "axios";

export const axiosInstance = axios.create({
    baseURL: "http://localhost/api/v1/",

})