<template>
    <div class="flex justify-center mt-24">
        <h1 class="text-2xl font-bold text-gray-500">Previous Searches</h1>
    </div>
    <div class="md:w-1/2 mx-auto p-2">
        <router-link to="/" class="text-blue-500">Back to word search</router-link>
        <div class="mt-5">
            <div class="p-5" v-if="loading">
                <p class="text-center">Loading...</p>
            </div>
            <ul v-for="prev in previous" :key="prev.id">
                <li class="text-xl italic">{{prev.word}}</li>
            </ul>
            <div v-if="loading===false && previous.length ===0">
                <p>Previous Searches will appear here.</p>
            </div>
        </div>
    </div>
</template>
<script>
import useWords from "../composables/words";
import { onMounted} from "vue";

export default {
    setup() {
        const {previous, getPrevious, loading} = useWords()
        onMounted(getPrevious)
        return {    
            previous,
            loading
        }
    }
}
</script>