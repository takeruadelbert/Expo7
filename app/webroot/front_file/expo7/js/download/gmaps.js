$(function() {
	setCheckboxSearch();
	$('#namaMasjid, #wilayahMasjid, #ruteMasjid').click(function() {
		setCheckboxSearch();
	});
	
	$('.angkot').fancybox({
		helpers: {
			title: {type:'outside'},
			thumbs: {width:50, height:50}
		}
	});
	
	if($('#field_namaMasjid').length > 0) {
        $('#field_namaMasjid').autocomplete({
            minLength: 2,
            source: function(request, response) {
                $.post('../../function/script/select/masjidByNama.php', {nama: $('#field_namaMasjid').val()}, function(data) {
                    var json = null;
                    try {
                        json = JSON.parse(data);
                    } catch(e) {
                        alert(data);
                    }
                    if(json != null) {
                        response(json);
                    }
                });
            },
            focus: function(evt, ui) {
                $('#field_namaMasjid').val(ui.item.nama);
                return false;
            },
            select: function(evt, ui) {
                $('#field_namaMasjid').val(ui.item.nama);
                $('#hidden_namaMasjid').val(ui.item.id);
                return false;
            }
        }).data('ui-autocomplete')._renderItem = function(ul,item) {
            return $('<li>').append('<a>'+item.nama+'</a>').appendTo(ul);
        };
    }
	
	$('#submitNamaMasjid').click(function() {
		if($('#namaMasjid').is(':checked')) {
			$.post('../../function/script/select/masjidByNama.php', {id: $('#hidden_namaMasjid').val()}, function(data) {
				data = JSON.parse(data);
				if(data != '') {
					if(data.lat != '' && data.lng != '') {
						setMap(data.lat, data.lng, data.infoContent, data.keterangan);
					} else {
						alert('Tidak ada koordinat untuk Masjid '+$('#field_namaMasjid').val()+'!');
						$('#keterangan').html('Tidak ada koordinat untuk Masjid '+$('#field_namaMasjid').val()+'!');
					}
				}
			});
		} else {
			if(confirm('Anda ingin melakukan pencarian masjid berdasarkan nama?')) {
				$('#namaMasjid').prop('checked', true);
				setCheckboxSearch();
			} else {
				alert('Pilih Cari masjid berdasarkan nama untuk melakukan pencarian');
			}
			return false;
		}
	})
	
	$('#submitWilayahMasjid').click(function(e) {
		e.preventDefault();
		if($('#wilayahMasjid').is(':checked')) {
			if($('#wilayahLokasi').val() != '' && $('#selectMasjid_lokasi').val() != '') {
				$.post('../../function/script/select/masjidByWilayah.php', {wilayah: $('#wilayahLokasi').val(), masjid: $('#selectMasjid_lokasi').val()}, function(data) {
					data = JSON.parse(data);
					if(data != '') {
						if(data.lat != '' && data.lng != '') {
							setMap(data.lat, data.lng, data.infoContent, data.keterangan);
						} else {
							alert('Tidak ada koordinat untuk Masjid '+$('#selectMasjid_lokasi option:selected').text()+' di wilayah '+$('#wilayahLokasi option:selected').text()+'!');
							$('#keterangan').html('Tidak ada koordinat untuk Masjid '+$('#selectMasjid_lokasi option:selected').text()+' di wilayah '+$('#wilayahLokasi option:selected').text()+'!');
						}
					}
				});
			} else {
				alert('Harap pilih Wilayah/Masjid yang dicari');
			}
		} else {
			return false;
		}
	})
	
	$('#submitRuteMasjid').click(function(e) {
		e.preventDefault();
		if($('#ruteMasjid').is(':checked')) {
			if($('#wilayahRute').val() != '' && $('#selectMasjid_angkot').val() != '') {
				$.post('../../function/script/select/masjidByRute.php', {wilayah: $('#wilayahRute').val(), masjid: $('#selectMasjid_angkot').val()}, function(data) {
					data = JSON.parse(data);
					if(data != '') {
						if(data.lat != '' && data.lng != '') {
							setMap(data.lat, data.lng, data.infoContent, data.keterangan);
						} else {
							alert('Tidak ada koordinat untuk Masjid '+$('#selectMasjid_angkot option:selected').text()+' di wilayah '+$('#wilayahRute option:selected').text()+'!');
							$('#keterangan').html('Tidak ada koordinat untuk Masjid '+$('#selectMasjid_angkot option:selected').text()+' di wilayah '+$('#wilayahRute option:selected').text()+'!');
						}
					}
				});
			} else {
				alert('Harap pilih Wilayah/Masjid yang dicari');
			}
		} else {
			return false;
		}
	})
})

function setCheckboxSearch() {
	$('.cbSearch').each(function() {
		var elemId = $(this).attr('id');
		if($('#'+elemId).is(':checked')) {
			$('.field_'+elemId).attr('disabled', false);
			$('#submit_'+elemId).show();
			if($('#hidden_'+elemId).length > 0) {
				$('#hidden_'+elemId).attr('disabled', false);
			}
		} else {
			$('.field_'+elemId).val('').attr('disabled', true);
			$('#submit_'+elemId).hide();
			if($('#hidden_'+elemId).length > 0) {
				$('#hidden_'+elemId).attr('disabled', true);
			}
		}
	});
}

/* Google Maps API v3 */
var map;
		
//function initialize() {
//	if(navigator.geolocation) {
//		navigator.geolocation.getCurrentPosition(function(position) {
//			setMap(position.coords.latitude, position.coords.longitude, 'Anda berada di lokasi yang ditentukan oleh GPS', 'Anda berada di lokasi yang ditentukan oleh GPS');
//		}, function() {
//			handleNoGeoLocation(true);
//		})
//	} else {
//		handleNoGeoLocation(false);
//	}
//}

function setMap(lat, lng, infoContent, keterangan) {
	var mapCanvas = document.getElementById('map-canvas');
	var myLatLng = new google.maps.LatLng(lat, lng);
	var mapOptions = {
		zoom: 16,
		center: myLatLng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	
	map = new google.maps.Map(mapCanvas, mapOptions);
	
	var marker = new google.maps.Marker({
		position: myLatLng,
		map: map,
		animation: google.maps.Animation.DROP
	});
	
	var infowindow = new google.maps.InfoWindow({
		content: infoContent
	});
	google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map,marker);
	});
	
	traffic = new google.maps.TrafficLayer();
	traffic.setMap(map);
	
	$('#keterangan').html(keterangan);
}

function handleNoGeolocation(errorFlag) {
	if (errorFlag) {
		var content = 'Error: The Geolocation service failed.';
	} else {
		var content = 'Error: Your browser doesn\'t support geolocation.';
	}

	var options = {
		map: map,
		position: new google.maps.LatLng(60, 105),
		content: content
	};

	var infowindow = new google.maps.InfoWindow(options);
	map.setCenter(options.position);
}

//google.maps.event.addDomListener(window, 'load', initialize);