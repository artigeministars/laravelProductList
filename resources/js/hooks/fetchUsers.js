import { ref } from "vue";
import { getProductsAsync } from "../services/ProductService";


export const useAsync = (fn = () => {}) => {
    const data = ref(null);
    const error = ref(null);
    const isLoading = ref(false);

    const run = async () => {
        try {
isLoading.value = true;
data.value = await fn();
        }
        catch(error) {
error.value = processError(error);
        }
        finally {
isLoading.value= false;
        }
    }

    return { data, error, isLoading, run };

} 

export const processError = (error) => {
    // TODO
    return error;
  }

  
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