<template>
    
    <div>
        <div class="flex justify-between">
            <a href="#" @click="$router.back()" class="text-blue-400 text-bold">
                >>Back
            </a>
        </div>
    <form @submit.prevent="submitForm">
     <InputFiled name="name" label="Contact Name" placeholder="Contact Name" :errors="errors" @update:field="form.name=$event" :data="form.name"/>
     <InputFiled name="email" label="EMAIL" placeholder="Email" :errors="errors" @update:field="form.email=$event" :data="form.email"/>
     <InputFiled name="company" label="company name" placeholder="company Name" :errors="errors"  @update:field="form.company=$event" :data="form.company"/>
     <InputFiled name="birthday" label="birthday" placeholder="MM/DD/YYY" :errors="errors" @update:field="form.birthday=$event" :data="form.birthday"/>
     <div class="flex justify-end">
         <button class="px-4 py-2 rounded text-red-700 border mr-5 hover:border-red-700">Cansel</button>
         <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-400">Save</button>
     </div>
    </form>
    </div>
</template>

<script>
import InputFiled from "../components/InputFiled";
export default {
    name: "contactCreate",
    components:{
        InputFiled 
        },
  mounted(){
        axios.get('/api/contacts/'+this.$route.params.id).then(
            response=>{
              this.form=response.data.data;
              this.loading=false;
            }
        ).catch(error=>{

            this.loading=false;

            if(error.response.status ===404){
                this.$router.push('/contacts');
            }

        });
    },
        data:function(){
            return {
                form:{
                    'name':'',
                    'email':'',
                    'company':'',
                    'birthday':'',
                },
                errors:null,
            }
        },

        methods:{

            submitForm:function(){
                axios.patch('/api/contacts/'+ this.$route.params.id ,this.form).then(response=>{
                     this.$router.push(response.data.links.self);

                }).catch(errors=>{

                    this.errors = errors.response.data.errors;
                    
                });
            }

        }
}
</script>
<style scoped>

</style>