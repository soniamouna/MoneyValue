<script>
import axios from 'axios'
import useVuelidate from "@vuelidate/core";
import {
    required,
    maxLength,
    helpers,
    alpha,
} from "@vuelidate/validators";
export default {
    name: "AddCurrencyForm",
    setup() {
        return {
            v$: useVuelidate({ $autoDirty: true }),
        };
    },

    data() {
        return {
            newCurrency: "",
        }
    },

    validations() {
        return {
            newCurrency: { 
                required:helpers.withMessage('Veuillez sélectionner une devise', required), 
                alpha:helpers.withMessage('Veuillez saisir des lettres', alpha),
                maxLength:helpers.withMessage('Veuillez saisir une devise à 3 lettres',  maxLength(3))  
            },
        }
    },

    methods: {

        async addCurrency(event) {
            this.v$.$validate();
            if (this.v$.$error==true) {
                event.preventDefault();
            }else{
               await axios.post("http://127.0.0.1:8000/api/currencies",
                {
                    name: this.newCurrency.toUpperCase(),
                })
                .then(response => console.log(response))
                .catch(err => console.log(error)); 
            }
            
            
            
        }
    }




}
</script>

<template>
    <form class="mb-2 m-auto">
        <div class="  row col-lg-12">
            
            <div class="mb-3 col-lg-6">
                <label for="rate">Nouvelle devise</label>
                <input type="text" class="form-control" placeholder="ex : EUR" v-model="newCurrency">
                <div class="error" v-if="v$.newCurrency.$error">
                    {{ v$.newCurrency.$errors[0].$message }}
                </div>
            </div>
            <div class="col-lg-6 m-auto">
                <button type="submit" class="btn btn-primary" @click="addCurrency">Ajouter</button>
            </div>

        </div>


    </form>
</template>



<style>
.error{
    color:red
}
</style>