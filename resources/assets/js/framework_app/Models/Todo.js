import Model from '../../framework/Model';

export default class Todo extends Model {

    constructor({title, description}) {
        super({title, description});
        this.title = title;
        this.description = description;
    }
}