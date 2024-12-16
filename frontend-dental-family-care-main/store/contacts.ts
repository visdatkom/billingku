

import { computed } from 'vue'
import personal from "~/types/personal"
import organization from "~/types/organization"
import contacts from "~/data/contacts.json"


export const useContactsStore = defineStore('contacts', () => {

    const personal: personal[] = (JSON.parse(JSON.stringify(contacts.personal)))
    const organization: organization[] = (JSON.parse(JSON.stringify(contacts.organization)))
    const selectedContact = ref<personal[]>(contacts.personal);
    const currentcontact = ref<object>({})


    const setSelectedContact = computed((value) => {

    })


    return {
        personal,

        organization,
        selectedContact,
        setSelectedContact,

        currentcontact
    }
})
