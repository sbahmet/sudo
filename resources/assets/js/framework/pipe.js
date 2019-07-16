class Pipeline {

    constructor(){
        this.passable = null;
        this.pipes = [];
        this.method = 'handle';
    }

    send(passable){
        this.passable = passable;
        return this;
    }

    through(pipes){
        this.pipes = Array.isArray(pipes) ? pipes : Array.from(arguments);
        return this;
    }

    via(method){
        this.method = method;
        return this;
    }

    then(destination){
        let firstSlice = this.getInitialSlice(destination);
        let callable = [...this.pipes].reverse().reduce(this.getSlice(), firstSlice);
        return callable(this.passable);
    }

    getSlice(){
        return (stack, pipe) => passable => {
            if (pipe instanceof Function) {
                return pipe(passable, stack);
            }

            return pipe[this.method](passable, stack);
        };
    }

    getInitialSlice(destination){
        return passable => destination(passable);
    }
}

class AddParameter {
    constructor(key, value = null) {
        this.key = key;
        this.value = value;
    }

    handle(obj, next){
        obj[this.key] = this.value;
        if (obj.error) {
            return {error: obj.error};
        }
        return next(obj);
    }
}

class Finish {
    constructor(key, value){
        this.key = key;
        this.value = value;
    }

    handle(obj, next){
        let res = next(obj);
        res['finishing_'+this.key] = 'added on back propagation: ' + this.value ;
        return res;
    }
}

let obj = {init: 'init'};

let pipes = [
    new AddParameter('p1', 1),
    new AddParameter('p2', 2),
    new AddParameter('error', 'Invalid user ID'),
    new AddParameter('p3', 3),
    (obj, next) => {console.log('pipe function was called: ', obj); return next(obj);},
    new Finish('f1', 1),
    new Finish('f2', 2)
];

let response = (new Pipeline).send(obj).through(pipes).then(obj => {
    console.log('then: ', obj);
    return {response: 'result'};
});

console.log(response);