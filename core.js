(function($){
$(document).ready(function() {
    $('#formTargetHeartRate').submit(function(e) {
        e.preventDefault();
        
        var age = $('input[name="age"]').val(),
            hrLow = calculateHeartRate(age, '.50'),
            hrHigh = calculateHeartRate(age, '.85');
        
        $('#calculatedThr').text('Your target heart rate is '+hrLow+' - '+hrHigh);
    });
});

function calculateHeartRate(age, intensity) {
    var hrMax = 220 - age,
        hrRest = 70,
        result = ((hrMax - hrRest) * intensity) + hrRest;
    
    return result;
}

})( jQuery );