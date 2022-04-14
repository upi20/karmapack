$(document).ready(function() {

    // Basic example
    var example1 = new BSTable("basic-edit");
    example1.init();

    // New row edit-table example
    var example2 = new BSTable("new-edit", {
        $addButton: $('#table2-new-row-button'),
        onEdit:function() {
            console.log("EDITED");
        },
    });
    example2.init();

    // Example only some columns editable & removed actions column label
    var example3 = new BSTable("removecolumns-edit", {
        editableColumns:"1,2",
        advanced: {
            columnLabel: ''
        }
    });
    example3.init();

   
} );