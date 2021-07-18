var ptsd = new Audio('/sounds/points_drop.mp3');
var ptsz = new Audio('/sounds/points_to_0.mp3');

const options = {
    startVa: 0,
    useEasin: false,
    useGroupin: false,
    separator: '',
    duration: 3,
};

let playera = new CountUp('lifea', 0000, options);
let playerb = new CountUp('lifeb', 0000, options);

if (!playera.error) {
    playera.start();
}

if (!playerb.error) {
    playerb.start();
}

$(document).on('keypress',function(e) {

    if(e.which == 13) {
	if ($('#lifea').text() == 0 || $('#lifeb').text() == 0) {
	    ptsd.play();
	    playera.update(8000);
	    playerb.update(8000);	    
	} else {
	    var val = $('#lifea').text() - 4000;

	    if (val == 0) {
		ptsz.play();
		playera.update(val);
	    } else {
		ptsd.play();
		playera.update(val);
	    }

	}
    }
});
