import Vue from 'vue';

import VueRouter from 'vue-router';
import ExampleComponent from "./components/ExampleComponent";
import contactCreate from "./views/contactCreate";
import ContactShow from "./views/ContactShow";
import ContactEdit from "./views/ContactEdit";
import ContactIndex from "./views/ContactIndex";
import BirthdayIndex from "./views/BirthdayIndex";

Vue.use(VueRouter);

export default new VueRouter({
    routes:[
        
            {path:'/', component: ExampleComponent},
            {path:'/contacts', component: ContactIndex},
            {path:'/contacts/create', component: contactCreate},
            {path:'/contacts/:id', component: ContactShow},
            {path:'/contacts/:id/edit', component: ContactEdit},
            {path:'/birthday', component: BirthdayIndex},
            
    ],

    mode:'history'
});