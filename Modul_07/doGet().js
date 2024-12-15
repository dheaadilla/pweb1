function doGet(e) {
    var op= e.parameter.action;

    if (op == "read")
        return read();
    else if(op == "insert")
        return insert_value(e);
}