<script>
export default {

}
</script>


<template>
    <div class=" col-lg-12">
        <form>
            <div class="row col-lg-12">
                <div class="mb-3 col-lg-3">
                    <label for="currencyEntry">Devise d'entrée</label>
                    <input type="text" class="form-control" placeholder="From">
                </div>
                <div class="mb-3 col-lg-3">
                    <label for="currencyExit">Devise de sortie</label>
                    <input type="text" class="form-control" placeholder="To">
                </div>
                <div class="mb-3 col-lg-3">
                    <label for="rate">Taux de change</label>
                    <input type="text" class="form-control" placeholder="0">
                </div>
                <div class="col-lg-3 m-auto">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>

            </div>


        </form>
    </div>
    <div class="m-auto row col-lg-12">
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
                <tr>
                    <th scope="row">EUR -> USD</th>
                    <td>0.99</td>
                    <td>0</td>
                    <td>
                        <button type="button" class="btn btn-primary">Modifier</button>
                        <button type="button" class="btn btn-danger">Supprimer</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">USD -> EUR </th>
                    <td>1.1</td>
                    <td>0</td>
                    <td>
                        <button type="button" class="btn btn-primary">Modifier</button>
                        <button type="button" class="btn btn-danger">Supprimer</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


</template>


<style>
</style>