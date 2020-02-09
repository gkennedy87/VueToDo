<template>
    <div class="container text-center">
       <form @submit="onSubmit" type="post">
        <div class="form-row">
            <div class="form-group mb-1">
            <input type="text" class="form-control" v-model="task.title" placeholder="Add Task..." >
        </div>
            <button type="button" class="btn btn-success ml-1" @click.prevent="createTask(task)">Save</button>
        </div>
        </form> 
    </div>
    
</template>

<script>
import { mapActions } from 'vuex';
export default {
    name: "TaskForm",
    data() {
        return {
            task: {
                title: '',
                completed:false
            }
        }
    },
    methods: {
        ...mapActions(['createTask']),
        onSubmit(e) {
            e.preventDefault();
            this.$store.dispatch('createTask',task);
            this.form.reset();
        }
    },
}
</script>

<style lang="css" scoped>
    .container {
        width: 100%
    }
</style>