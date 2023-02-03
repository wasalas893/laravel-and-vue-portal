<style>
form {
    width: 35%;
}

</style>



<template>
    <div id="layout-wrapper">

        <Header></Header>



        <div class="login">

            <form @submit.prevent="handlesubmit">

                <div class="form-group">
                  <label for="exampleInputEmail1">name</label>
                  <input type="text" v-model="name"  class="form-control" placeholder="name">
                  <span v-if="errormessage.name" class="error-message">{{ errormessage.name[0] }}</span>


                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">slug</label>
                  <input type="text" v-model="slug"  class="form-control"  placeholder="slug">
                  <span v-if="errormessage.slug" class="error-message">{{ errormessage.slug[0] }}</span>

                </div>


                  <div class="form-group">
                    <label for="exampleInputPassword1">price</label>
                    <input type="number" v-model="price"  class="form-control"  placeholder="price">
                    <span v-if="errormessage.price" class="error-message">{{ errormessage.price[0] }}</span>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>


    </div>
</template>


<script>
import Header from '../Layouts/Header.vue';



export default {
  components: {
    Header

  },

  data(){
    return{

        name:'',
        slug:'',
        price:'',
        errormessage:[],
        sucessmessage:''


    }
  },

  methods:{

    async handlesubmit(){

        const data={
                name:this.name,
                slug:this.slug,
                price:this.price,
            }

            await axios.post('http://localhost:8000/api/produts/add',data,{
                headers: {
                'Accept': 'application/json',   
                Authorization: 'Bearer ' + localStorage.getItem('token'),
               }
        
            })

            .then((res)=>{
                this.errormessage='';
                this.$router.push('/dashboard');

            }).catch((error)=>{

                if (error.response.status === 422) {

                  this.errormessage = error.response.data.errors;

                 
                  
                }
            

            })

    }

  }

}
</script>

