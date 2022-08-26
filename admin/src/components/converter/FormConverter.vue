<script>

export default {

}
</script>

<template>
    <div class="m-auto row col-lg-12 d-flex justify-content-center">
        <div class="col-lg-12">
            <h1 class="text-center pb-4">MoneyValue</h1>
        </div>
        <!-- <div class="br bg-dark col-lg-12">
            <form class="br bg-dark col-lg-12 m-auto row ">
                <div class="br row m-auto text-center col-lg-12">
                    <div class="br m-auto col-lg-2 ">
                        <input type="text" class=" form-control" placeholder="Amount">
                    </div>
                    <div class=" br m-auto col-lg-2  ">
                        <select class=" form-select" aria-label="Sélectionner une paire">
                            <option selected>Paires</option>
                            <option value="1">EUR -> USD</option>
                            <option value="2">USD -> EUR</option>
                        </select>
                    </div>
                    <div class="br col-lg-2">
                        <button type="submit" class="btn col-lg-12 btn-primary">Convertir</button>
                    </div>
                </div>
            </form>
        </div> -->
        <div class=" col-lg-12">
            <form class="col-lg-12 ">
                <div class="bg-dark py-4 converterBg col-lg-6 row m-auto">
                    <div class=" col-lg-4">
                        <input type="" class="form-control" placeholder="Amount" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class=" col-lg-4">
                         <select class=" form-select" aria-label="Sélectionner une paire">
                            <option selected>Paires</option>
                            <option value="1">EUR -> USD</option>
                            <option value="2">USD -> EUR</option>
                        </select>
                    </div>
                    <div class=" m-auto text-center col-lg-4">
                        <button type="submit" class="col-lg-12 btn btn-primary">Convertir</button>
                    </div>
                </div>
                <div class=" py-5 col-lg-12">
                    <hr class=" col-lg-6 m-auto text-center" >
                </div>
                <div class="col-lg-12">
                    <h2 class="text-center">1,00 EUR = 0,99 USD</h2>
                </div>
            </form>
        </div>
    </div>




    

</template>

<style>
    .br{
        border: 1px solid red;
    }

    .converterBg{
        border-radius: 20px;
    }
</style>