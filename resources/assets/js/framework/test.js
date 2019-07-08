//import

// middleware
createGlobalMiddleware('gmw1', function(r,n){r.acc += ' gmw1'; let res=n(r); return res + ' gmw1';});
createGlobalMiddleware('gmw2', function(r,n){r.acc += ' gmw2'; let res=n(r); return res + ' gmw2';});

for(let i=1; i<=9; i++) {
    createMiddleware('mw'+i, function(r,n){r.acc += ' mw'+i; let res=n(r); return res + ' mw'+i;});
}

// routes
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

// ==================

Controllers.c =         {a: function(req){req.in_c = 'in controller'; return 'controller c response;';}};
Controllers.c1 =        {a: function(req){req.in_c = 'in controller'; return 'controller c1 response;';}};
Controllers.c12 =       {a: function(req){req.in_c = 'in controller'; return 'controller c12 response;';}};
Controllers.c123 =      {a: function(req){req.in_c = 'in controller'; return 'controller c123 response;';}};
Controllers.c12456 =    {a: function(req){req.in_c = 'in controller'; return 'controller c12456 response;';}};
Controllers.c1245678 =  {a: function(req){req.in_c = 'in controller'; return 'controller c1245678 response;';}};
Controllers.c12_b =     {a: function(req){req.in_c = 'in controller'; return 'controller c12_b response;';}};
Controllers.c129 =      {a: function(req){req.in_c = 'in controller'; return 'controller c129 response;';}};
Controllers.c_b =       {a: function(req){req.in_c = 'in controller'; return 'controller c_b response;';}};

handleMiddleware();

data = {test: 1, acc: ''};
response = request('req1', data);
console.assert(data.acc === ' gmw1 gmw2');
console.assert(response === 'controller c response; gmw2 gmw1');

data = {test: 1, acc: ''};
response = request('req2', data);
console.assert(data.acc === ' gmw1 gmw2 mw1');
console.assert(response === 'controller c1 response; mw1 gmw2 gmw1');

data = {test: 1, acc: ''};
response = request('req3', data);
console.assert(data.acc === ' gmw1 gmw2 mw1 mw2');
console.assert(response === 'controller c12 response; mw2 mw1 gmw2 gmw1');

data = {test: 1, acc: ''};
response = request('req4', data);
console.assert(data.acc === ' gmw1 gmw2 mw1 mw2 mw3');
console.assert(response === 'controller c123 response; mw3 mw2 mw1 gmw2 gmw1');

data = {test: 1, acc: ''};
response = request('req5', data);
console.assert(data.acc === ' gmw1 gmw2 mw1 mw2 mw4 mw5 mw6');
console.assert(response === 'controller c12456 response; mw6 mw5 mw4 mw2 mw1 gmw2 gmw1');

data = {test: 1, acc: ''};
response = request('req6', data);
console.assert(data.acc === ' gmw1 gmw2 mw1 mw2 mw4 mw5 mw6 mw7 mw8');
console.assert(response === 'controller c1245678 response; mw8 mw7 mw6 mw5 mw4 mw2 mw1 gmw2 gmw1');

data = {test: 1, acc: ''};
response = request('req7', data);
console.assert(data.acc === ' gmw1 gmw2 mw1 mw2');
console.assert(response === 'controller c12_b response; mw2 mw1 gmw2 gmw1');

data = {test: 1, acc: ''};
response = request('req8', data);
console.assert(data.acc === ' gmw1 gmw2 mw1 mw2 mw9');
console.assert(response === 'controller c129 response; mw9 mw2 mw1 gmw2 gmw1');

data = {test: 1, acc: ''};
response = request('req9', data);
console.assert(data.acc === ' gmw1 gmw2');
console.assert(response === 'controller c_b response; gmw2 gmw1');

console.log('tests passed');
