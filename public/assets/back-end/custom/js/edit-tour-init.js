
function setDepartureDate(section) {
    var new_arrival_date = $(section).val();
    var new_departure_date = addDays(new_arrival_date, day_difference );
    console.log(new_departure_date);
    // $('#departure_date').val(new_departure_date)
}

function addDays(date, days) {
    var newDate = new Date(date);
    newDate.setDate(newDate.getDate() + days);
    return newDate.toISOString().split('T')[0];
}

