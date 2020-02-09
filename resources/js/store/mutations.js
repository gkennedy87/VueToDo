let mutations = {
    CREATE_TASK(state,task) {
        state.tasks.unshift(task)
    },
    FETCH_TASKS(state,tasks) {
        return state.tasks = tasks
    },
    DELETE_TASK(state,task) {
        let index = state.tasks.findIndex(item => item.id === task.id)
        state.tasks.splice(index,1)
    },
    UPDATE_TASK(state,task) {
        let index = state.tasks.findIndex(item => item.id === task.id)
        if(index !== -1) {
            state.tasks.splice(index,1,task)
        }
    },
    FILTER_TASKS(state,task) {
        let index = state.tasks.findIndex(item => item.id === task.id)
        if(index !== -1) {
            state.tasks.splice(index,-1,task)
        }
        
    }
}

export default mutations