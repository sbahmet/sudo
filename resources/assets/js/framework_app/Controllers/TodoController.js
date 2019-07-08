import Controller from '../../framework/Controller';
import Todo from '../Models/Todo';


export default class TodoController extends Controller {

    constructor(){
        super();
    }

    create(request) {
        let todo = new Todo(request);
        console.log('new todo created: ', todo);
        return todo;
    }

    index(request) {
        Todo.fetch(request.count)
            .then(response =>  response.json())
            .then(todos => console.log('todos: ', todos));
        return 'some response';
    }
}