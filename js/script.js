// //ambil elemen2 yg dibutuhkan
// var keyword = document.getElementById('keyword');
// var tombolCari = document.getElementById('tombol-cari');
// var container = document.getElementById('container');

// keyword.addEventListener('keyup', function() {
// 	//buat object ajax
// 	var xhr = new XMLHttpRequest();

// 	//cek kesiapan ajax
// 	xhr.onreadystatechange = function() {
// 		if( xhr.readyState == 4 && xhr.status == 200 ) {
// 			container.innerHTML = xhr.responseText;
// 		}
// 	}

// 	xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
// 	xhr.send();
// })

$(document).ready(function() {
	$('#tombol-cari').hide();
	//event ketika keyword ditulis
	$('#keyword').on('keyup', function() {
		//munculkan icon loader
		$('.loader').show();

		//ajax menggunakan load
		// $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

		$.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {
			$('#container').html(data);

			$('.loader').hide();
		});

	})
})