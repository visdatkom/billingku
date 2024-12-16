

import todo from "~/data/todo.json"

export const useTodoStore = defineStore('todo', () => {


    const data = ref(todo.data)
    function taskcomplete(item: number) {

        data.value.find(function (list) {
            if (list.id === item) {
                return list.status = list.status === 'complete' ? 'incomplete' : 'complete';
            }
        });
    }
    function tododelete(index: number) {

        data.value.splice(index, 1);
    }

    function addtodo(item: any) {

        const todoID: any = []
        data.value.forEach(element => {
            todoID.push(element.id)
        });

        const id: number = Math.max(...todoID) + 1;

        data.value.unshift({
            'id': id,
            'title': item.value,
            'priority': "Pending",
            'date': "16 Jan",
            'badgeClass': "badge-light-danger",
            'delete': false,
            'status': 'incomplete'
        })
    }

    return {
        data,
        taskcomplete,
        tododelete,
        addtodo
    }
})
