<template>
<div class="relative pb-4">
         <label :for="name" class="text-blue-500 uppercase text-bold pt-2 absolute">{{label}}</label>
         <input type="text" :id="name" class="border-b w-full pt-8 pb-2 text-gray-900 foucs:outline-none focus:border-blue-400"
         :placeholder="placeholder" v-model="value" @input="updateField()" :class="ErrorClass()">

         <p class="text-red-600 text-sm" v-text="errorsMessage()">errors here</p>
     </div>
     </template>


<script>
export default {
    name: "InputFiled",
    props:[
     'name','label','placeholder','errors','data',
    ],
    errors:null,
    data:function(){
        return{
            value:''
        }
    },

    computed:{
        HasErrors:function(){
            return this.errors && this.errors[this.name] && this.errors[this.name].length > 0
        }
    },

    methods:{
        updateField:function(){
            this.clearError();
            this.$emit('update:field', this.value)
        },

        errorsMessage:function(){
            if(this.HasErrors){
                return this.errors[this.name][0];
            }
        },

        clearError:function(){
            if(this.HasErrors){
                return this.errors[this.name]=null;
            }

        },

        ErrorClass:function(){

            return{
                'error-field': this.HasErrors,
            }
        }

    },

    watch:{
        data:function(val){
        this.value=val;
        }
    }

    
}
</script>

<style scoped>
.error-field{
@apply .border-red-500 .border-b-2;
}

</style>