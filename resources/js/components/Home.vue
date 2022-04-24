<template>
    <div>
        <div class="flex justify-center mt-24">
            <h1 class="text-2xl font-bold text-gray-500">Word Definition API</h1>
        </div>
        <div class=" p-2 md:w-1/2 mx-auto">
            <div class="flex flex-row">
                <div class="w-full">
                    <input maxlength="50" v-on:input="clearDefinition" type="text" v-model="word" placeholder="Search word" class="w-full p-2 border border-gray">
                </div>
                <button :disabled="!word" @click="getDefinition(word)" class="p-2 bg-gray-600 text-white">Search</button>
            </div>
            <router-link to="/recent"  class="text-blue-500">Recent searches</router-link>
            <div v-if="error" class="mt-3 p-2 rounded bg-red-400 text-white">
                <p class="font-semibold">{{error.title}}</p>
                <p>{{error.message}}</p>
            </div>
        </div>
        
        <div class="p-2 md:w-1/2 mx-auto" v-if="word">
            <p class="text-xl">{{searching ? 'Searching' : definitions.length !==0 ? 'Results':'Search'}} for <span class="italic text-blue-500 font-semibold">{{word}}</span> definition.</p>
            <div v-for="(definition, index) in definitions" :key="index">
                <div class="my-2 p-2">
                    <p class="italic font-semibold text-2xl">{{definition.word}} <span class="text-sm text-gray-400">{{definition.phonetic}}</span></p>
                    <div v-for="(meaning, index) in definition.meanings" :key="index">
                        <p class="italic">{{meaning.partOfSpeech}}</p>
                        <div class="ml-5" v-for="(definition, index) in meaning.definitions" :key="index">
                            <p class="text-sm">- {{definition.definition}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import useWords from "../composables/words";

export default {
    setup() {
        const {definitions, getDefinition, clearDefinition, searching, error } = useWords();
        return {
            definitions,
            getDefinition,
            clearDefinition,
            searching,
            error
        }
    },
    
    data() {
        return {
            word:''
        }
    }
}
</script>
