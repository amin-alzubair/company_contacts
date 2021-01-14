<template>
    
    <div>
    <form @submit.prevent="submitForm">
     <InputFiled name="name" label="Contact Name" placeholder="Contact Name" :errors="errors" @update:field="form.name=$event"/>
     <InputFiled name="email" label="EMAIL" placeholder="Email" :errors="errors" @update:field="form.email=$event"/>
     <InputFiled name="company" label="company name" placeholder="company Name" :errors="errors"  @update:field="form.company=$event"/>
     <InputFiled name="birthday" label="birthday" placeholder="MM/DD/YYY" :errors="errors" @update:field="form.birthday=$event"/>
     <div class="flex justify-end">
         <button class="px-4 py-2 rounded text-red-700 border mr-5 hover:border-red-700">Cansel</button>
         <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-400">Add New Contact</button>
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
                axios.post('/api/contacts',this.form).then(response=>{
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