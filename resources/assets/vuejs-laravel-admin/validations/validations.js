var options = {
    validators: {
        checkbox(value, attrValue, vnode) {
            // return true to set input as $valid, false to set as $invalid
            return value;
        },
        sameas(value, attrValue, vnode) {
            return value == attrValue;
        }
    }
}

export default options;
