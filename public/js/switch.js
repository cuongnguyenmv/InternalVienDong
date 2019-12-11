$(document).ready(function(){
$('.div-show').hide()
$("#list").fadeIn()
other_election()

// $('table').DataTable()
})

function other_election(){
	$('.breadcrumb-item').each(function(){
		var active = $(this)
		var a = $(this).find('a')
		a.click(function(){
			event.preventDefault()
			var nav = $(this).text()
			$('.div-show').hide()
			$('.breadcrumb-item').removeClass('active')
			switch(nav){
				case 'Các sự kiện':
					active.addClass('active')
					$("#list").fadeIn(1000)
				break;
				case 'Kết quả':
					active.addClass('active')
					$("#result").fadeIn(1000)
				break;
				case 'Khai báo':
					active.addClass('active')
					$("#def").fadeIn(1000)
				break;
			}
		})
	})
}
