(function(){

    // ===== UI input gate (knows everything about DOM )
    // ===== translates DOM events to requests

    document.querySelector('form').addEventListener('submit', function(event){
        event.preventDefault();
        request('create-todo-item', {
            title: event.target.querySelector('input').value,
            description: event.target.querySelector('textarea').value
        });
    });


    //  ====== middleware =======

    createMiddleWare('convertEmptyStringsToNull', function(request, next){
        for (let field in request) {
            if (request[field] === '') {
                request[field] = null;
            }
        }
        return next(request);
    });

    // ======== routes ==========

    Route('create-todo-item', 'convertEmptyStringsToNull|ToDoController.store');


    // ================ domain logic

    const Todo = function(title, description){
        this.title = title;
        this.description = description;
        this.done = false;
    };

    const todos = [];

    Controllers.ToDoController = {
        store: function(request){
            todos.push(new Todo(request.title, request.description));
            console.log(todos);
            return todos;
        }
    };
    // === domain event listeners


})();
