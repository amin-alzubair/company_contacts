<template>
<ContactList endpoint="/api/birthdays"/>
</template>

<script>
import ContactList from "../components/ContactList";
export default {
    name:"BirthdayIndex",
    components:{
        ContactList,
    }
}
</script>