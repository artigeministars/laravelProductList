import {axiosInstance} from "../axios/axios";


export const getSearchedProducts = (keyword) =>
axiosInstance.get(`/search-products/${keyword}`);

export const getSearchedProductsAsync = async (keyword) =>
    await axiosInstance.get(`/search-products/${keyword}`);
