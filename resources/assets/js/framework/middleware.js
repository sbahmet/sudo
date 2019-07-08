
class Middleware {
    constructor(controllers, routes){
        this.middleware = {
            _NullDefaultMiddleware:  function(request, next){return next(request);}
        };

        this.globalMiddlewarePipe = ['_NullDefaultMiddleware'];

        this.controllers = controllers;
        this.routes = routes;
    }

    create(name, func){
        this.middleware[name] = func;
    }

    createGlobal(name, func){
        this.create(name, func);
        this.globalMiddlewarePipe.push(name);
    }

    handle(){
        for(let request in this.routes) {
            if(!this.routes.hasOwnProperty(request)) {
                continue;
            }
            this.routes[request] = this.globalMiddlewarePipe.join('|') + '|' + this.routes[request];

            let pipe = this.routes[request].split('|');
            let controllerAction = pipe.pop();
            let controller; let action;
            [controller, action] = controllerAction.split('.');

            for (let i=0; i<pipe.length; i++) {
                if (this.middleware.hasOwnProperty(pipe[i])) {
                    pipe[i] = this.middleware[pipe[i]];
                } else {
                    throw 'undefined middleware: ' + pipe[i];
                }
            }

            pipe.push(this.controllers[controller][action]);

            this.routes[request] = pipe;
        }
    }
}

export default Middleware;