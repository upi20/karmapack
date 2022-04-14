
    
    $.ratePicker("#rating-1", {
        rate : function (stars){
            alert('Sample 3\'s Rate is ' + stars);
        }
    });

    $.ratePicker("#rating-2", {
        rate : function (stars){
            alert('Sample 3\'s Rate is ' + stars);
        },
        indicator:"fa-heart"
    });

    $.ratePicker("#rating-3", {
        max :10,
        rgbOn:"#e74c3c",
        rgbOff:"#ecf0f1",
        rgbSelection:"#e74c3c",
        cursor:"crosshair",
        rate : function (stars){
            alert('Sample 3\'s Rate is ' + stars);
        }
    });
    $.ratePicker("#rating-6", {
        max :10,
        rgbOn:"#e74c3c",
        rgbOff:"#ecf0f1",
        rgbSelection:"#e74c3c",
        cursor:"crosshair",
        rate : function (stars){
            alert('Sample 3\'s Rate is ' + stars);
        },
        indicator:"fa-heart"
    });

    $.ratePicker("#rating-4", {
        max :10,
        rgbOn:"#efad0cdb",
        rgbOff:"#bdc3c7",
        rgbSelection:"#efad0cdb",
        rate : function (stars){
            alert('Sample 3\'s Rate is ' + stars);
        },
        indicator:"fa-circle"
    });
    $.ratePicker("#rating-5", {
        max :5,
        rgbOn:"#efad0cdb",
        rgbOff:"#bdc3c7",
        rgbSelection:"#efad0cdb",
        rate : function (stars){
            alert('Sample 3\'s Rate is ' + stars);
        },
        indicator:"fa-thumbs-up"
    });

