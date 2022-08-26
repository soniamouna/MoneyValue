<script>
import TabAdmin from '../components/admin/TabAdmin.vue';
import axios from 'axios';
import AddPairs from '../components/admin/AddPairs.vue';
import AddCurrency from '../components/admin/AddCurrency.vue';
export default {
    components: { TabAdmin, AddPairs, AddCurrency },
    data() {
        return {
            pairs: [],
            currencies: [],
        }
    },
    mounted() {
    axios.get('http://127.0.0.1:8000/api/pairs')
      .then((response) => {
        
        this.pairs = response.data;
      })
      .catch(err => console.log(err))

    axios.get('http://127.0.0.1:8000/api/currencies')
      .then((response) => {
        
        this.currencies = response.data;
      })
      .catch(err => console.log(err))
    },
    
  
}
</script>

<template>
<div class="m-auto">
    <AddCurrency/>
    <AddPairs :currencies="this.currencies"/>
    <TabAdmin :pairs="this.pairs"/>
</div>

    
</template>


<style>

</style>