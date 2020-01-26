$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let symbol = $('#company_symbol');
    symbol.keypress(function(){
        console.log(symbol.val().length);
        if(symbol.val().length >0){
            $.ajax({
                method: 'GET', // Type of response and matches what we said in the route
                url: '/get-companies', // This is the url we gave in the route
                data: {
                    'company_symbol': symbol.val()
                }, // a JSON object to send back
                success: function (response) { // What to do if we succeed
                    console.log(response);
                    let parsed_response = JSON.parse(response);
                    if (parsed_response.error) {
                        console.log(parsed_response.error)
                    } else {
                        console.log(parsed_response);
                        let options = '';
                        for (let key of Object.keys(parsed_response)) {
                            options += '<option value="' +parsed_response[key] +'">'+ parsed_response[key]+ '</option>';
                        }
                        $('#symbol_select').remove();
                        symbol.parent().append('<select id="symbol_select">'+ options +'</select>');
                        $('#symbol_select').on('change',function(){
                            symbol.val($(this).val());
                        })
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        }
    });
    let submit = $('.submit-form');
    submit.on('click',function(){
            $.ajax({
                method: 'GET', // Type of response and matches what we said in the route
                url: '/get-quotes', // This is the url we gave in the route
                data: {
                    'company_symbol': $('#company_symbol').val(),
                    'start_date': $('#start_date').val(),
                    'end_date': $('#end_date').val(),
                    'email': $('#email').val(),
                }, // a JSON object to send back
                success: function (response) { // What to do if we succeed
                    console.log(response);
                    let parsed_response = JSON.parse(response);
                    if (parsed_response.error) {
                        console.log(parsed_response.error)
                    } else {
                        console.log(parsed_response);
                        let options = '';
                        for (let key of Object.keys(parsed_response)) {
                            options += '<option value="' +parsed_response[key] +'">'+ parsed_response[key]+ '</option>';
                        }
                        $('#symbol_select').remove();
                        symbol.parent().append('<select id="symbol_select">'+ options +'</select>');
                        $('#symbol_select').on('change',function(){
                            symbol.val($(this).val());
                        })
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
    });
});