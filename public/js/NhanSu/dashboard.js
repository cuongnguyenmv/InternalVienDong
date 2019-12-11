$(document).ready(function(){
	viewPage()
	$('.table').DataTable({
		"bPaginate": true,
	    "bLengthChange": false,
	    "bFilter": true,
	    "bInfo": false,
	    "bAutoWidth": false
	})
})

function viewPage(){
	$('.view-page').click(function(){
		$('.view-page').removeClass('active');
		var page = $(this).data('action')
		$(this).addClass('active')
		$.ajax({
			type:'get',
			url:page,
			success:function(data){
				$('#show-table').fadeOut(100)
				$('#show-table').html(data)
				$('.table').DataTable()	
				$('#show-table').fadeIn(1000)
			},
			errors:function(){
				alert('Tải thất bại')
			}

		})
	})
}
