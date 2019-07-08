import Route from './routes'

const request = function(name, data) {
    let controllerAction = Route.routes[name].pop();

    let ind = 0;

    const _nextMiddlewareCallback = function(request) {
        ind++;
        if (ind === Route.routes[name].length) {
            if (data.rules) {
                //todo: perform validation with data.rules
            }
            return controllerAction(request);
        } else {
            return Route.routes[name][ind](request, _nextMiddlewareCallback);
        }
    };

    return Route.routes[name][0](data, _nextMiddlewareCallback);
};

export default request;