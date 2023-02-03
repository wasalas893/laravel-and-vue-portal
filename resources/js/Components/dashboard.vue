
<style>
.table-form {
margin-top: 100px;

 

 }

</style>

<template>
   
        


            <Header></Header>





    <div class="table-form">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">slug</th>
                <th scope="col">price</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
    </div>
        

</template>



<script>


import Header from '../Layouts/Header.vue';



export default {

  components: {
    Header,
   
  },







}
</script>
