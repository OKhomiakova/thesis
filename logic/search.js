$(document).ready(function(){
    $('#search_text').keyup(function(){
        var txt = $(this).val();
        var redirect_file = $('#file_to_redirect').val();
        if(txt == '') {
            $('#result').html(txt);
        } else {
            $('#result').html('');
            $.ajax({
                url:"fetch.php",
                method:"post",
                data:{search:txt, file_to_redirect:redirect_file},
                dataType:"text",
                success:function(data)
                {
                    $('#result').html(data);
                }

            });
        }
    });
});