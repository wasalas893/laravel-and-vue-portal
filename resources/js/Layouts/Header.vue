<template>
    <div>
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <router-link v-if="isAuthenticate" to="/dashboard" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="logo-sm" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="logo-dark" height="20">
                            </span>
                        </router-link>

                        <a href="#" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="logo-sm-light" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-light.png" alt="logo-light" height="20">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="ri-menu-2-line align-middle"></i>
                    </button>

                    <!-- App Search-->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="ri-search-line"></span>
                        </div>
                    </form>


                </div>

                <div class="d-flex">



                    <div class="dropdown d-inline-block user-dropdown">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg"
                                alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1">Julia</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">

                            <router-link  v-if=" isAuthenticate" @click="handleClick" class="dropdown-item text-danger" to=""><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</router-link>
                        </div>
                    </div>



                </div>
            </div>
        </header>
    </div>
</template>


<script>

export default {

    name:'header',

    data(){

        return{
            isAuthenticate:false
        }

    },


    methods:{

        handleClick(){
            localStorage.removeItem('token');
            this.$router.push('/login');
        }

    },
    mounted(){

     const token=localStorage.getItem('token');

     if(token){
         this.isAuthenticate=true;
     }

     this.isAuthenticate = !!localStorage.getItem("token");

   },

}

</script>
