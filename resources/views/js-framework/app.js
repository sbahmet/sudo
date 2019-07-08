createGlobalMiddleWare('gmw1', function(request, next){
    return next(request);
});



createMiddleWare('convertEmptyStringsToNull', function(request, next){
    for (let field in request) {
        if (request[field] === '') {
            request[field] = null;
        }
    }
    return next(request);
});

// --------- routes -------

Route('create-todo-item', 'convertEmptyStringsToNull|ToDoController.store');

handleMiddleware(); // ?????? where must it be called?

