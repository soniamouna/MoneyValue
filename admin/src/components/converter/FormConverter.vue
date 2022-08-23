<script>

export default {

}
</script>

<template>
    <div class="m-auto col-lg-12 justify-content-center">
        <div class="col-lg-12">
            <h1 class="text-center">MoneyValue</h1>
        </div>
        <div class="col-lg-12">
            <form>
                <div class="row col-lg-12 m-auto">
                    <div class="mb-3 col-lg-4">
                        <input type="text" class="form-control" placeholder="Amount">
                    </div>
                    <div class="mb-3 col-lg-4  ">
                        <select class="form-select" aria-label="Sélectionner une paire">
                            <option selected>Paires</option>
                            <option value="1">EUR -> USD</option>
                            <option value="2">USD -> EUR</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-primary">Convertir</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-12">
            <h2>1,00 EUR = 0,99 USD</h2>
        </div>
    </div>




    

</template>

<style>
</style>