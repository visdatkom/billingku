


interface table {
    id: number,
    img: string,
    firstName: string,
    lastName: string,
    userName: string,
    role: string,
    company: string,
    language: string,
    badgeClass: string,
    credit: string,
    borderColor: string,
    country: string
}
interface table1 {
    id: number,
    firstName: string,
    lastName: string,
    office: string,
    role: string,
    salary: string,
    age: number,
    join: string
}
interface table2 {
    id: number,
    icon: string,
    status: string,
    signalName: string,
    security: string,
    stage: string,
    schedule: string,
    bgClass: string,
    teamLead: string,
    font: string
}
interface table3 {
    id: number,
    firstName: string,
    name: string,
    email: string,
    lastName: string,
    exp: string,
    sex: string,
    contact: string,
    userName: string,
    age: string,
    dessert: string,
    calories: string,
    fat: string,
    price: string
}
interface breckpoint {
    id: number,
    name: string,
    order: string,
    price: string,
    quantity: string,
    total: string
}
interface sizing {
    id: number,
    Name: string,
    Date: string,
    Status: string,
    statusClass: string,
    hours: string,
    performance: string
}
interface custom {
    id: number,
    film: string,
    released: string,
    studio: string,
    budget: string,
    domestic: string
}
interface dashed {
    id: number,
    className: string,
    type: string,
    hours: string,
    trainer: string,
    spot: string
}
import bootstrap from "~/data/bootstrap.json"

export const useBootstrapStore = defineStore('bootstrap', () => {

    const data: table[] = (JSON.parse(JSON.stringify(bootstrap.datatable1)))
    const inverse: table1[] = (JSON.parse(JSON.stringify(bootstrap.inverse)))
    const hoverable: table2[] = (JSON.parse(JSON.stringify(bootstrap.hoverable)))
    const caption: table3[] = (JSON.parse(JSON.stringify(bootstrap.table2)))
    const breckpoint: breckpoint[] = (JSON.parse(JSON.stringify(bootstrap.breckpoint)))
    const sizing: sizing[] = (JSON.parse(JSON.stringify(bootstrap.sizingTablesXl)))
    const custom: custom[] = (JSON.parse(JSON.stringify(bootstrap.tableData2)))
    const dashed: dashed[] = (JSON.parse(JSON.stringify(bootstrap.tableData)))

    return {
        data,
        inverse,
        hoverable,
        caption,
        breckpoint,
        sizing,
        custom,
        dashed
    }
})
