<script>
import axios from 'axios';
import ModalEditPairs from './ModalEditPairs.vue';
export default {
    props: {
        pairs: {
            type: Array,
            default: () => []
        }
    },
    components:{modalEdit:ModalEditPairs},
    data() {
        return {
            pairsEdit: [],
            show: false
        };
    },
    methods: {
        async deletePairs(id) {
            await axios.delete(`http://127.0.0.1:8000/api/pairs/${id}`)
                .then((response) => {
                jthis.pairs.splice(id - 1, 1);
                console.log("r", response);
            })
                .catch((error) => {
                console.log(error);
            });
        },
        openModal() {
            this.show = !this.show;
        },
        getPairs(pair) {
            this.pairsEdit = pair;
        }
    },
    components: { ModalEditPairs }
}
</script>


<template>
<div>
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
                    <button type="button" class="btn btn-success" @click="openModal();getPairs(pair)">Modifier</button>

                    <button type="button" @click="deletePairs(pair.id)" class="btn btn-danger">Supprimer</button>

                </td>
            </tr>

        </tbody>
    </table>
    <div v-if="show">
        <ModalEditPairs :show="this.show" :pairsEdit="this.pairsEdit" :openModal="this.openModal"/>
    </div>
</div>

</template>


<style>
</style>