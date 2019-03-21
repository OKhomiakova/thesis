$(document).ready(function(){
    $('#search_text').keyup(function(){
        var txt = $(this).val();
        var olyaPNH = $('#file_to_redirect').val();
        if(txt == '') {
            $('#result').html(txt);
        } else {
            $('#result').html('');
            $.ajax({
                url:"fetch.php",
                method:"post",
                data:{search:txt, file:olyaPNH},
                dataType:"text",
                success:function(data)
                {
                    $('#result').html(data);
                }

            });
        }
    });
});