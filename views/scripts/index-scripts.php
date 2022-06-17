<!-- javascript related to this page -->
<script type="text/javascript">

    $(":input").on("keyup change", function(e) {
        $('#table').html('')
    })

    function readLogFile()
    {
        var filePath = $('#filePath').val();

        if(filePath === '')
        {
            alert('Please insert a valid log file path')
            return
        }

        if(filePath.indexOf('/') !== 0) {
            alert('Relative path must start with slash ( / ) ')
            return
        }
        fetchPaginationData('<?php echo baseUrl?>');
    }

    // call pagination via ajax
    $(document).on('click','.paginationLink',function (e)
    {
        e.preventDefault()
        var route = $(this).data('route')
        fetchPaginationData(route);
    })

    function fetchPaginationData(route,filePath){
        $.ajax({
            url     : route,
            type    : 'POST',
            dataType: 'json',
            cache   : false,
            data    : {
                filePath: $('#filePath').val()
            },
            success : function(data) {
                if(data.status === 'failed') {
                    alert(data.msg)
                }else {
                    $('#table').html(data)
                }
            }
        });
    }
</script>
