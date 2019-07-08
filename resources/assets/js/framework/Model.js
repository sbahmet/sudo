export default class Model {

    constructor(params) {

    }

    save() {
        //todo: request to server to save the model
        console.log('saving to db');

    }

    static fetch(count) {
        // this.name - returns class name of calling model class
        return fetch('/' + this.name.toLowerCase()+'?count='+count, {
            headers: {
                "Accept": "application/json",
            }
        });

    }
}