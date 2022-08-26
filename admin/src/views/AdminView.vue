<script>
import TabAdmin from '../components/admin/TabAdmin.vue';
import axios from 'axios';
export default {
    components: { TabAdmin },
    data() {
        return {
            pairs: [],
        }
    },
    mounted() {
    axios.get('http://127.0.0.1:8000/api/pairs')
      .then((response) => {
        
        this.pairs = response.data;
      })
      .catch(err => console.log(err))
    },
  
}
</script>

<template>
<div>
    <TabAdmin :pairs="this.pairs"/>
</div>

    
</template>


<style>

</style>