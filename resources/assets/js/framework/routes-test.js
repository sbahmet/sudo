/** @test */

import Route from './routes';

Route('req1', 'c.a');
Route('req2', 'mw1|c1.a');

Route.group(['mw1', 'mw2'], () => {
    Route('req3', 'c12.a');
    Route('req4', 'mw3|c123.a');
    Route.group(['mw4', 'mw5|mw6'], ()=>{
        Route('req5', 'c12456.a');
        Route('req6', 'mw7|mw8|c1245678.a');
    });

    Route('req7', 'c12_b.a');

    Route.group(['mw9'], () => {
        Route('req8', 'c129.a');
    });
});
Route('req9', 'c_b.a');

console.assert(Route.routes.req1 && Route.routes.req1 === 'c.a');
console.assert(Route.routes.req2 && Route.routes.req2 === 'mw1|c1.a');
console.assert(Route.routes.req3 && Route.routes.req3 === 'mw1|mw2|c12.a');
console.assert(Route.routes.req4 && Route.routes.req4 === 'mw1|mw2|mw3|c123.a');
console.assert(Route.routes.req5 && Route.routes.req5 === 'mw1|mw2|mw4|mw5|mw6|c12456.a');
console.assert(Route.routes.req6 && Route.routes.req6 === 'mw1|mw2|mw4|mw5|mw6|mw7|mw8|c1245678.a');
console.assert(Route.routes.req7 && Route.routes.req7 === 'mw1|mw2|c12_b.a');
console.assert(Route.routes.req8 && Route.routes.req8 === 'mw1|mw2|mw9|c129.a');
console.assert(Route.routes.req9 && Route.routes.req9 === 'c_b.a');

console.info('tests passed');
