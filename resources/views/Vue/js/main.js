
const app = Vue.createApp({
    data: () => ({
        newItem: '',
        todos: [],
        message: 'Hello Vue.js',
        basePrice: 100
    }),
    methods: {
        addItem: function(event) {
            if(this.newItem === '') return
            console.log('Clicked!')
            let todo = {
                item: this.newItem,
                isDone: false
            }
            this.todos.push(todo)
            this.newItem = ''
            console.log(this.todos)
        },
        deleteItem: function(index) {
            console.log('Delete')
            console.log(index)
            this.todos.splice(index, 1)
        }
        
    },
    computed: {
        revesedMessage: function() {
            return this.message.split('').reverse().join('')
        },
        taxIncludedPrice: {
            get: function() {
                return this.basePrice * 1.1
            },
            set: function(value) {
                this.basePrice =  value / 1.1
            }
        }
    }
    
})
app.mount('#app')