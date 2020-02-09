<template>
    <div class="container text-center">
        <ul class="list-group mb-4">
            <li v-for="task in tasks" :key="task.id" v-bind:class="{'is-complete':task.completed}" class="list-group-item d-flex justify-content-between align-items-center">
                <input type="checkbox" v-on:change="completeTask(task)" v-bind:checked="task.completed">
                <div v-if="taskEditId == task.id">
                    <input type="text" class="form-control" v-model="task.title" :id="`task-edit-${task.id}`" @blur="editTask(task)" @keydown.enter="editTask(task)" placeholder="task.title">
                </div>
                <div v-else @click="clickToEdit(task)">
                    {{task.title}}
                </div>
                <button @click="deleteTask(task)" class="btn btn-danger ml-3 float-right"><i class="fas fa-trash-alt"></i></button>
            </li>
        </ul>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    export default {
        name: 'TaskList',

        data() {
            return {
                taskEditId: ''
            }
        },
    
        methods: {
            ...mapActions(['fetchTasks','deleteTask','updateTask']),
            completeTask(task) {
                const compTask = {
                    id: task.id,
                    title: task.title,
                    completed: !task.completed
                };
                this.updateTask(compTask);
                
                
            },
            clickToEdit(task) {
                this.taskEditId = task.id
                setTimeout(()=> {
                    document.getElementById(`task-edit-${task.id}`).focus()
                },1)
                
            },
            editTask(task) {
                const edTask = {
                    id: task.id,
                    title: task.title,
                    completed: task.completed
                };
                this.updateTask(edTask)
                this.taskEditId = ''
            }


        },
        computed: mapGetters(['tasks']),
        created() {
            this.fetchTasks();
        },
        mounted() {
            console.log('TaskList mounted');
        }
    }
</script>

<style scoped>
    .container {
        border-radius: 5px;
    }

    #checkbox {
        height: 31px;
        width: 31px;
    }

    .li-wide {
        width: 30rem;
    }

    li {
        opacity: 90%;
    }

    .is-complete {
        text-decoration: line-through;
        background-color: grey;
        opacity: 90%;
        color: white;
    }
</style>