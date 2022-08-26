<script>
export default {
    props: ["currencies"],
    

   
}
</script>

<template>
    <form>
        <div class="row col-lg-12">
            <div class="mb-3 col-lg-3">
                <label for="currencyEntry">Devise d'entrée</label>
                <select class="form-select" >
                    <option v-for="currency in currencies" :key="currency.id" >
                        {{ currency.name }}
                    </option>
                </select>
                <!-- <input type="text" class="form-control" placeholder="ex : EUR" name="from" v-model="from"> -->
            </div>
            <div class="mb-3 col-lg-3">
                <label for="currencyExit">Devise de sortie</label>
                <select class="form-select" >
                    <option v-for="currency in currencies" :key="currency.id">
                        {{ currency.name }}
                    </option>
                </select>
                <!-- <input type="text" class="form-control" placeholder="ex : USD" v-model="to"> -->
            </div>
            <div class="mb-3 col-lg-3">
                <label for="rate">Taux de change</label>
                <input type="text" class="form-control" placeholder="ex : 0.2" >
            </div>
            <div class="col-lg-3 m-auto">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>

        </div>


    </form>
</template>



<style>
</style>