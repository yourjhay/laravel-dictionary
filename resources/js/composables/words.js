import { ref } from "vue";
import axios from "axios";

export default function useWords() {
    const searching = ref(false);
    const loading = ref(false);
    const definitions = ref([]);
    const previous = ref([]);
    const error = ref(null)

    /**
     * get definition of word from third-party API
     * @param {string} word 
     */
    const getDefinition = async (word) => {
        let def = "dasdsa";
        searching.value = true;
        error.value = null;
        await axios.get(`https://api.dictionaryapi.dev/api/v2/entries/en/${word}`).then(res => {
            definitions.value = res.data
        }).catch(err => {
            if (err.response) {
                let response = err.response
                error.value = response.data
            }
        })
        storeSearch(word)
        searching.value = false;
    }

    /**
     * Store Search words to database using our own api
     * @param {string} word 
     */
    const storeSearch = async (word) => {
        await axios.post(`/api/searches/store`, {
            word: word
        }).then(res => {
            console.log('word save in previous searches')
        }).catch(err => {
            console.log(err.response)
        })
    }

    /**
     * Get Previous Word Searches
     */
    const getPrevious = async () => {
        loading.value = true;
        await axios.post(`/api/searches`).then(res => {
            previous.value = res.data.data.data
        }).catch(err => {
            console.log(err.response)
        })
        loading.value = false;
    }

    /**
     * Clear the definition array
     */
    const clearDefinition = () => {
        definitions.value = []
    }

    return {
        definitions,
        getDefinition,
        previous,
        getPrevious,
        clearDefinition,
        searching,
        loading,
        error
    }
}