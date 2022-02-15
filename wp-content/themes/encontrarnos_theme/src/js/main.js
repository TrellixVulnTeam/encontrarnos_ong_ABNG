
(function($){
    $('#select-organismos').on('change',(e)=>{

		e.preventDefault();
    let endpoint = '<?php echo admin_url('admin-ajax.php');?>';
    let select = $('#select-organismos').val();
		console.log(select);
    let selectdata = new FormData;

    selectdata.append('action', 'select');
    selectdata.append('select', select);

    $.ajax(endpoint, {
        type: 'POST',
        data: selectdata,
        processData: false,
        contentType: false,

        success: (res) => {
			console.log(res.data);
        },

        error: () => {

        }
    })
})
})(jQuery);