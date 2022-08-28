<script>
import axios from 'axios';
export default {
    data() {
        return {
            form: {
                email: '',
                password: '',
            }
        }
    },
    methods: {
        formSubmit() {
            axios.post("http://127.0.0.1:8000/api/login", this.form)
                .then((response) => {
                    console.log(response)
                })
                .catch(error => console.log(error));
        }
    },
}
</script>

<template>
    <form>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" aria-describedby="emailHelp" v-model="this.form.email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" v-model="this.form.password">
        </div>
        <button type="submit" class="btn btn-primary" @click.prevent="formSubmit">Submit</button>
    </form>
</template>

<style>
</style>