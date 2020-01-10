$(document).ready(function(){
	$('#tblcheckin').DataTable()
	CheckIn()
	GhiNhanKetQua()
})

function CheckIn(){
	$('#checkin').keypress(function(event){
		var enter = event.keyCode;
		var idcard = this.value
		if(enter == 13){
			$.ajax({
				type:'get',
				url:'check-in/'+idcard,
				success:function(data){
					$('#showcheckin').html(data)
					$('#tblcheckin').DataTable()
					$('#checkin').val('')
				},
				error:function(){
					$('#err').fadeIn(100).html('NOT FOUND')
					$('#checkin').val('')
				}
			})
		}
	})
}
function GhiNhanKetQua(){
	$('body').attr('overflow','hidden')
	$('#calcround').keypress(function(e){
		var enter = event.keyCode;
		var idcard = this.value
		if(enter == 13){
			$.ajax({
				type:'get',
				url:'./ghi-nhan/'+idcard,
				success:function(data){
					$('#showghinhan').html(data)
					$('#calcround').val('')
					setTimeout(function(){$('.alert').fadeOut(1000)},3000)
				}
			})
		}
	})
}