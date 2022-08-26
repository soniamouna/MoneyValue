<script>
import axios from 'axios'
export default {
    props: {
        currencies: {
            type: Array,
            default: () => []
        }
    },

    data() {
        return {
            currencyFromId: "",
            currencyToId: "",
            currencyRate: ""
        }
    },

    methods: {

        addPairs() {
            axios.post("http://127.0.0.1:8000/api/pairs",
                {
                    currency_from_id: this.currencyFromId,
                    currency_to_id: this.currencyToId,
                    rate: this.currencyRate
                })
                .then(response => console.log(response))
                .catch(err => console.log(error));
        }
    }




}
</script>

<template>
    <form>
        <div class="row col-lg-12">
            <div class="mb-3 col-lg-3">
                <label for="currencyEntry">Devise d'entrée</label>
                <select class="form-select" v-model="currencyFromId">
                    <option v-for="currency in currencies" :key="currency.id" :value="currency.id">
                        {{ currency.name }}
                    </option>
                </select>
                <!-- <input type="text" class="form-control" placeholder="ex : EUR" name="from" v-model="from"> -->
            </div>
            <div class="mb-3 col-lg-3">
                <label for="currencyExit">Devise de sortie</label>
                <select class="form-select" v-model="currencyToId">
                    <option v-for="currency in currencies" :key="currency.id" :value="currency.id">
                        {{ currency.name }}
                    </option>
                </select>
                <!-- <input type="text" class="form-control" placeholder="ex : USD" v-model="to"> -->
            </div>
            <div class="mb-3 col-lg-3">
                <label for="rate">Taux de change</label>
                <input type="text" class="form-control" placeholder="ex : 0.2" v-model="currencyRate">
            </div>
            <div class="col-lg-3 m-auto">
                <button type="submit" class="btn btn-primary"
                    @click="addPairs()">Ajouter</button>
            </div>

        </div>


    </form>
</template>



<style>
</style>