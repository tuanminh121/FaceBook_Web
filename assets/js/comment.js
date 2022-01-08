/* $(document).ready(function(){
 
    $('#comment_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url:"add_comment.php",
            method:"POST",
            data:form_data,
            dataType:"JSON",
            //callback
            success:function(data){
                if(data != ''){
                    $('#comment_form')[0].reset();
                    $('#comment_message').html(data);
                    $('#comment_id').val('0');
                    load_comment();
                }
            }
        })
    });

 load_comment();

    function load_comment()
    {
        $.ajax({
        url:"fetch_comment.php",
        method:"POST",
        //callback
        success:function(data){
            $('#display_comment').html(data);
        }
        })
    }
 
}); */