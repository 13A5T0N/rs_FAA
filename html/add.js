$(document).ready(function () {
    var counter = 0;
    items =[];
    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td><input type="text" class="form-control" id="item" name="materiaal' + counter + '"/></td>';
		cols += '<td><input type="number" class="form-control" id="prijs" name="prijs' + counter + '"/></td>';
	
        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        var item_name = document.getElementById('item').value;
        items.push(item_name);
        console.log(items[counter]);
        counter++;
		
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
        
    });


});
