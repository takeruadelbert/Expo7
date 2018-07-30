/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$("#datepicker1").datepicker({
    dateFormat: 'd/m/yy',
    beforeShow: function (input, inst) {
        setTimeout(function () {
            inst.dpDiv.css({
                left: auto
            });
        }, 0);
    }
});

$("#datepicker2").datepicker({
    dateFormat: 'd/m/yy',
    beforeShow: function (input, inst) {
        setTimeout(function () {
            inst.dpDiv.css({
                left: auto
            });
        }, 0);
    }
});



$('.timepicker').timepicker();

$('.datepicker').datepicker();