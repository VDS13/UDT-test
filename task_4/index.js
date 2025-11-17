$("document").ready(function() {
    var d = $('#res');
    $.ajax({
        url: './mock_deals.json',
        method: 'get',
        success: function(data){
            var result = `
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>`;
            for (let i = 0; i < data.length; i++) {
                result += `<tr class="ALL ${data[i].status}">
                            <td>${data[i].id}</td>
                            <td>${data[i].title}</td>
                            <td>${data[i].status}</td>
                            <td>${data[i].amount}</td>
                        </tr>
                
                `;
            }
            result += `</tbody></table>`;
            d.html(result);
        }
    });
    $('input:checkbox').click(function(){
        if ($(this).is(':checked')) {

            $('input:checkbox').not(this).prop('checked', false);
            if ($(this).val() == "ALL") {
                $('.ALL').css("display", "table-row");
            } else {
                $('.ALL').css("display", "none");
                $('.'+$(this).val()).css("display", "table-row");
            }
        }
    });
})