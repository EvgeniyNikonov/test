let Main = {
    
    updateDataTable: function (e, table) {
        if (!table) {
            table = window.LaravelDataTables["dtListElements"];
        }

        table.draw();
        e.preventDefault();
    },

    
}
