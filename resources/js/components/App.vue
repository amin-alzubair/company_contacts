<template>
    <div class="bg-white h-screen">
        <div class="flex">
            <div
                class=" pl-6 bg-gray-200 w-48 h-screen border-r-2 border-gray-400"
            >
                <nav class="pt-6">
                    <router-link to="/login">
                        <h1
                            class="uppercase font-bold w-12 h-12 text-blue-800 pl-6"
                        >
                            jot
                        </h1>
                    </router-link>
                    <p class="text-gray-500 uppercase font-bold pt-12 text-xs">
                        create
                    </p>
                    <router-link
                        to="/contacts/create"
                        class="flex items-center py-2 hover:text-blue-600 text-sm"
                    >
                        <div class="tarcking-wide">
                            Add New
                        </div>
                    </router-link>
                    <p class="text-gray-500 uppercase font-bold pt-12 text-xs">
                        general
                    </p>
                    <router-link
                        to="/contacts"
                        class="flex items-center py-2 hover:text-blue-600 text-sm"
                    >
                        <div class="tarcking-wide">
                            Contacts
                        </div>
                    </router-link>
                    <router-link
                        to="/birthday"
                        class="flex items-center py-2 hover:text-blue-600 text-sm"
                    >
                        <div class="tarcking-wide">
                            Birthdays
                        </div>
                    </router-link>

                    <p class="text-gray-500 uppercase font-bold pt-12 text-xs">
                        setting
                    </p>
                    <router-link
                        to="/test"
                        class="flex items-center py-2 hover:text-blue-600 text-sm"
                    >
                        <div class="tarcking-wide">
                            Logout
                        </div>
                    </router-link>
                </nav>
            </div>
            <div class="flex flex-col flex-1 overflow-y-hidden h-screen ">
                <div class="h-16 px-6 border-b border-gray-400 flex items-center justify-between">

                    <div>
                        Contacts
                    </div>
                    <UserCircle :name="user.name"/>
                    
                </div><!--hader div-->

                

                    <div class="flex flex-col flex-1 overflow-y-hidden">
                     <router-view class=" p-6 overflow-x-hidden">
                       
                     </router-view>
                    </div> 
                    <!--body div-->

            </div><!--main div-->
            </div>
            </div>
           
</template>

<script>
import UserCircle from "./UserCircle";
export default {
    name: "App",
    props:[
        'user',
        
    ] ,

    components:{
        UserCircle,
    },

    created() {
        window.axios.interceptors.request.use(
                (config)=>{
                    if(config.method==='get'){
                    config.url=config.url+'?api_token='+this.user.api_token;
                    }else{
                    config.data={
                    ...config.data,
                    api_token: this.user.api_token
                    };
                    }
                    
                    return config;
                }
            
        )
        
}
}
</script>

<style scoped></style>
