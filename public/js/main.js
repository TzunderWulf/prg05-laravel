$(function(){
    $('.toggle-class').change(function() {
        let status = $(this).prop('checked') === true ? 1 : 0;
        let characterId = $(this).data('id');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            dataType: "JSON",
            url: `/change-status`,
            data: {
                'status': status,
                'character-id': characterId
            },
            success: function(data) {
                console.log(data.success)
            }
        })
    })
})
