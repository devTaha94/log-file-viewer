<!-- javascript related to this page -->
<script type="text/javascript">
    $(document).on('submit','.loginForm',function (e) {
        e.preventDefault()
        var url     = $(this).attr('action')
        $.ajax({
            url        : url,
            method     : 'post',
            data       : new FormData($(this)[0]),
            dataType   :'json',
            processData: false,
            contentType: false,
            success    : function(response){
                if(response.status === 'failed' )
                {
                    alert(response.msg);
                    $('#password').val('')
                }else {
                    window.location.href = '/'
                }
            },
            error: function (xhr) {
                alert('Server Error');
            },
        });
    })
</script>
