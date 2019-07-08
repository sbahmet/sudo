/**
 * Creates a route
 * @param {string} request - request name
 * @param {string} action - controller.action
 */
const Route = function(request, action) {
    Route.routes[request] = (Route._groupPipe ? (Route._groupPipe + '|') : '') + action;
};

Route.routes = {};
Route._groupPipe = '';

/**
 * Creates a route
 * @param {array} middleware - array of middleware names
 * @param {Function} callback - Route function
 */
Route.group = function(middleware, callback) {
    const oldPipe = Route._groupPipe;
    Route._groupPipe = (Route._groupPipe ? (Route._groupPipe + '|') : '') + middleware.join('|');
    callback();
    Route._groupPipe = oldPipe;
};

export default Route;

