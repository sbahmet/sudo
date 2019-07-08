import Middleware from './middleware';
import Route from './routes';
import request from './request';
import TodoController from "../framework_app/Controllers/TodoController";

//todo: do bootstrapping stuff

export default {
    Middleware,
    Route,
    request
}

console.log('bootstrapping framework');

//todo: how to require all the files in routes folder
require('../framework_app/routes/routes');

//todo: how to require and instantiate all the classes in Controller folder

const controllers = {'TodoController': new TodoController()};

let mw = new Middleware(controllers, Route.routes);
mw.handle();

//just to test
let resp1 = request('create-todo', {title:'new', description: 'created'});
let resp2 = request('get-todos', {count: 3});

console.log('responses: ', resp1, resp2);