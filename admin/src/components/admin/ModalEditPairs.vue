<script>
import axios from 'axios'

export default {
    name: "EditPairsForm",
   
    props: {
        pairsEdit: {
            type: Array,
        },
        openModal: {
            type: Function
        },
        show: {
            type: Boolean
        }

    },

    methods: {
        async editPairs(id) {
            await axios.put('http://127.0.0.1:8000/api/pairs/' + id,
                this.pairsEdit)
                .then((response) => {
                    window.location.reload();
                })
                .catch(err => console.log(err))

        }
    }
}

</script>

<template>
    <div class="bloc-modale" v-if="show">

        <div class="overlay" @click="openModal"></div>

        <div class="modale ">
            <div @click="openModal" class="btn-modale btn btn-danger">X</div>
            <form>
                <div class="row col-lg-12">
                    <h1>Modifiez le taux de change de la paire</h1>
                    <div class="mb-3 col-lg-3">
                        <label for="rate">Taux de change</label>
                        <input type="text" class="form-control" placeholder="0" v-model="pairsEdit.rate">
                    </div>
                    <div class="col-lg-3 m-auto">
                        <button type="submit" class="btn btn-primary" @click.prevent="editPairs(pairsEdit.id)">Modifier</button>
                    </div>

                </div>


            </form>
        </div>
    </div>
</template>

<style scoped>
.bloc-modale {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.overlay {
    background: rgba(0, 0, 0, 0.5);
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
}

.modale {
    background: #f1f1f1;
    color: #333;
    padding: 50px;
    position: fixed;
    top: 30%;
}

.btn-modale {
    position: absolute;
    top: 10px;
    right: 10px;
}
</style>