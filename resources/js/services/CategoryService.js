import {axiosInstance} from "../axios/axios";


export const getCategories = () =>
axiosInstance.get("/categories");

export const getCategoriesAsync = async () =>
    await axiosInstance.get("/categories");
