function btnSubmit(){
	$('.btn').click(function(){
		var action = $(this).data('action')
		var r = confirm('Xác nhận')
		if(r){
			if(action == 1) $('#like').submit() 
				else  $('#dislike').submit() 
		}
	})
}

function swichpage(){
	$('.breadcrumb-item').each(function(){
		var active = $(this)
		var a = $(this).find('a')
		a.click(function(){
			event.preventDefault()
			var nav = $(this).text()
			$('.div-show').hide()
			$('.breadcrumb-item').removeClass('active')
			switch(nav){
				case 'Các điều khoản':
					active.addClass('active')
					$("#dieukhoan").fadeIn(800)
					$("#form-dk").fadeOut(800)
				break;
				case 'Khai báo':
					active.addClass('active')
					$("#form-dk").fadeIn(800)
					$("#dieukhoan").fadeOut(800)
				break;
			}
		})
	})
}

function viewLuongTheoThang(){
	$('.nav-link').click(function(){
		event.preventDefault()
		var thang = $(this).data('thang')
		$.ajax({
			type:'get',
			url:'./luong-nhan-vien/'+thang,
			success:function(data){
				$("#show").fadeOut().fadeIn(700).html(data)
				$('#table-luong').DataTable()
			}
		})
	})
}
function HoSoNhanVien(){
	$('.xem-ho-so').click(function(){
		event.preventDefault()
		var manv = $(this).data('action')
		$.ajax({
			type:'get',
			url:'./ho-so-nv/'+manv,
			success:function(data){
				$('#modal-body-show').html(data)
				
				
			}
		})
	})
}
function ChartDaoTao(tl,kt,kn,nt,cd,tc){

var donutChart = c3.generate({
        bindto: '#donut-chart',
        color: {
            // pattern: ['#61BB46','#FDB827','#F5821F','#E03A3E','#963D97','#009DDC']
             pattern: ['#52D726','#FFEC00','#FF7300','#FF0000','#007ED6','#7CDDDD']
        },

        // Create the data table.
        data: {
        	order:null,
            columns: [
                ['Tâm Lý', tl],
                ['Kiến Thức', kt],
                ['Kỹ Năng', kn],
                ['Nghệ Thuật', nt],
                ['Cộng Đồng', cd],
                ['Thể Chất', tc],

            ],
            type : 'donut',
            onclick: function (d, i) { console.log("onclick", d, i); },
            onmouseover: function (d, i) { console.log("onmouseover", d, i); },
            onmouseout: function (d, i) { console.log("onmouseout", d, i); }
        },
        donut: {
            title: "Giờ đào tạo"
        }
    });

    // Resize chart on sidebar width change
    // $(".menu-toggle").on('click', function() {
    //     donutChart.resize();
    // });
}
function ChartLuong(){
	var dataOrder = c3.generate({
        bindto: '#data-order',
        size: {height:400,width:500},
        color: {
             pattern: ['#52D726','#FFEC00','#FF7300','#FF0000','#007ED6','#7CDDDD','#55595c']
        },

        // Create the data table.
        data: {
        	x:'x',
            columns: [
            	['x', 'HK1', 'HK2', 'HK3'],
                ['A', 3450000, 3450000, 3450000],
                ['B', 1000000, 1000000, 1000000],
                ['C', 200000, 600000, 800000],
                ['D', 500000, 1100000, 1800000],
                ['E', 500000, 500000, 500000],
                ['F', 0, 0, 0],
                ['G', 0, 0, 0],
            ],
            type: 'bar',
            groups: [
                ['A','B','C','D','E','F','G']
            ],
            // order: 'desc' // stack order by sum of values descendantly. this is default.
    //      order: 'asc'  // stack order by sum of values ascendantly.
         order: null   // stack order by data definition.
        },
        bar:{
            	width:50
            },
         axis: {
         x: {
             type: 'category' // this needed to load string x value
         },
         y: {
         	tick: {
			          format: function(d){return FormatNumber(d)}
			        }
         }
        },
        grid: {
            x: {
                show: true
            },
            y:{
            	show: true
            	
            }
        }
    });
    // Resize chart on sidebar width change
    $(".menu-toggle").on('click', function() {
        dataOrder.resize();
    });
}

function ChartLuongThucLanh(){
	var columnOriented = c3.generate({
        bindto: '#column-oriented',
        size: {height:400,width:500},
        color: {
            pattern: ['#E91E63', '#00BCD4', '#673AB7']
        },

        // Create the data table.

        data: {
        	x:'x',
            columns: [
            	['x', 'HK1', 'HK2', 'HK3','HK4','HK5'],
                ['Tổng', 5650000, 6650000, 8050000,9050000,10050000],
                ['Thực Lãnh', 7777777, 7777777, 8050000,9050000,10050000]
            ]
        },
         axis: {
         x: {
             type: 'category' // this needed to load string x value
         },
         y:{
         	tick: {
			          format: function(d){return FormatNumber(d)}
			        }
         }
        },
        grid: {
            x: {
                show: true
            },
            y:{
            	show: true
            }
        }
    });

    // Resize chart on sidebar width change
    $(".menu-toggle").on('click', function() {
        columnOriented.resize();
    });
}
function FormatNumber(number){
var formated  = new Intl.NumberFormat('de-DE').format(number)
return formated;
}


function kt_switch(){
    $('.breadcrumb-item').each(function(){
        var active = $(this)
        var a = $(this).find('a')
        a.click(function(){
            event.preventDefault()
            var nav = $(this).text()
            $('.div-show').hide()
            $('.breadcrumb-item').removeClass('active')
            switch(nav){
                case 'Mức quy đổi hiện tại':
                    active.addClass('active')
                    $("#bangquydoi").fadeIn(1000)
                break;
                case 'Thêm mức quy đổi':
                    active.addClass('active')
                    $("#themquydoi").fadeIn(1000)
                break;
            }
        })
    })
}

function getInfoByCard(){
    $("#info").focus(function(event){
        event.preventDefault()
        $('#info').keypress(function(e){
            if(e.which == 13){
                var idcard = this.value
                $.ajax({
                    type:"get",
                    url:'./../../nhan-vien/'+idcard,
                    dataType:'json',
                    success:function(data){console.log(data)
                        var baseURL = window.location.protocol + "//"+window.location.host
                        $("#hinh").attr('src',baseURL+'/images/NhanVien/'+data.info.manv+'.jpg')
                        $("#manv").html(data.info.manv)
                        $("#bophan").html(data.info.bophan)
                        $("#hoten").html(data.info.hoten)
                        $("#mucquydoi").html(data.mucquydoi)
                        $("#diemch").html(data.diemch)
                        $("#naptien").val(data.info.manv)
                    }
                })
            }
        })

    })
   
   calcHatQuyDoi()
}
function calcHatQuyDoi(){
    $("#sotien").keyup(function(){
        var sotien = this.value
        var quydoi = $('#mucquydoi').text() * sotien / 1000
        $('#sohatquydoi').html(quydoi)
    })
}