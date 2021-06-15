import {axiosInstance} from "../axios/axios";

export const addProduct= (product) =>
axiosInstance.post("/productss", product);

export const addProductAsync = async (product) =>
    await axiosInstance.post("/products", product);

export const getProducts = () =>
axiosInstance.get("/products");

export const getProductsAsync = async () =>
    await axiosInstance.get("/products");

    export const getProductsByCategory = (id) =>
axiosInstance.get(`/filter-products/${id}`);

export const getProductsByCategoryAsync = async (id) =>
    await axiosInstance.get(`/filter-products/${id}`);

export const updateProduct = (product) =>
axiosInstance.put(`/products/${product.id}`, product);

export const updateProductAsync = async (product) =>
    await axiosInstance.put(`/products/${product.id}`, product);

export const deleteProduct = (id) =>
axiosInstance.delete(`/products/${id}`);

export const deleteProductAsync = async (id) =>
    await axiosInstance.delete(`/products/${id}`);