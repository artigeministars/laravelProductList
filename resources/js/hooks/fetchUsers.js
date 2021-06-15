import { ref } from "vue";
import { getProductsAsync } from "../services/ProductService";


export const useAsync = (fn = () => {}) => {
    const data = ref(null);
    const error = ref(null);
    const loading = ref(false);

    const run = async () => {
      
        loading.value = true;
        Promise.resolve(fn()).then(response => {
        data.value = response.data;
        }).catch((error) => {
        error.value = processError(error);
        });
          loading.value = false;
    }

    return { data, error, loading, run };

} 

export const processError = (error) => {
    // TODO
    return error;
  }

  // useless for now
  export default {
      setup() {
        const { data, error, isLoading, run: fetchProducts } = useAsync( async () => {
            const response = await getProductsAsync();
            return response.data;
        }
        );
        
        return { data, error, isLoading, fetchProducts };
      }
  }