<script>
import axios from 'axios';
export default {
    props: {
        pairs: {
            type: Array,
            default: () => []
        }
    },




    methods: {
       async deletePairs(id) {
            await axios.delete(`http://127.0.0.1:8000/api/pairs/${id}`)
                .then((response) => {
                    jthis.pairs.splice(id - 1, 1)
                    console.log("r", response)

                })
                .catch((error) => {
                    console.log(error);
                });
        }
    },
}
</script>


<template>
    <table class="text-center table table-bordered col-lg-12">
        <thead>
            <tr>
                <th scope="col">Paires</th>
                <th scope="col">Taux</th>
                <th scope="col">Nb</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="pair in this.pairs" :key="pair.id">

                <td>{{ pair.currency_from.name }} => {{ pair.currency_to.name }} </td>
                <td>{{ pair.rate }}</td>
                <td>0</td>
                <td>
                    <button type="button" class="btn btn-success">Modifier</button>

                    <button type="button" @click="deletePairs(pair.id)" class="btn btn-danger">Supprimer</button>

                </td>
            </tr>

        </tbody>
    </table>


</template>


<style>
</style>