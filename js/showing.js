function imageHover(title,movie_title) {

    document.getElementById('caption').style.display = 'block';
    document.getElementById('caption-title').innerText = title;
    document.getElementById('caption-sessions').innerHTML = '';

    var data = {};

    var i = 0;

    if (movie_title === 'everybody_loves_somebody') {
        data = {
            "everybody_loves_somebody": {
                "description" : "A successful and single career woman asks her co-worker to pose as her boyfriend at a family wedding back home in Mexico. Her situation gets complicated when her ex shows up at the ceremony.",
                "rating" : "RF",
                "session_times" : [
                    "Mon-Tues: 9pm",
                    "Wed-Fri: 1pm",
                    "Sat-Sun: 6pm"
                ]
            }
        };

        document.getElementById('caption-desc').innerText = data[movie_title]['description'];
        document.getElementById('caption-rating').innerText = data[movie_title]['rating'];
        for ( i = 0; i < data[movie_title]['session_times'].length; i++){
            document.getElementById('caption-sessions').innerHTML += '<li>'+data[movie_title]['session_times'][i]+'</li>';
        }
    } else if (movie_title === 'the_salesman') {
        data = {
            "the_salesman": {
                "description" : "While both participating in a production of 'Death of a Salesman,' a teacher's wife is assaulted in her new home, which leaves him determined to find the perpetrator over his wife's traumatized objections.",
                "rating" : "AF",
                "session_times" : [
                    "Mon-Tues: 6pm",
                    "Sat-Sun: 3pm"
                ]
            }
        };
        document.getElementById('caption-desc').innerText = data[movie_title]['description'];
        document.getElementById('caption-rating').innerText = data[movie_title]['rating'];
        for ( i = 0; i < data[movie_title]['session_times'].length; i++){
            document.getElementById('caption-sessions').innerHTML += '<li>'+data[movie_title]['session_times'][i]+'</li>';
        }
    } else if (movie_title === 'beauty_and_the_beast') {
        data = {
            "beauty_and_the_beast": {
                "description" : "An adaptation of the fairy tale about a monstrous-looking prince and a young woman who fall in love.",
                "rating" : "CH",
                "session_times" : [
                    "Mon-Tues: 1pm",
                    "Wed-Fri: 6pm",
                    "Sat-Sun: 12pm"
                ]
            }
        };
        document.getElementById('caption-desc').innerText = data[movie_title]['description'];
        document.getElementById('caption-rating').innerText = data[movie_title]['rating'];
        for ( i = 0; i < data[movie_title]['session_times'].length; i++){
            document.getElementById('caption-sessions').innerHTML += '<li>'+data[movie_title]['session_times'][i]+'</li>';
        }
    } else if (movie_title === 'dunkirk') {
        data = {
            "dunkirk": {
                "description" : "Allied soldiers from Belgium, the British Empire and France are surrounded by the German army and evacuated during a fierce battle in World War II.",
                "rating" : "AC",
                "session_times" : [
                    "Wed-Fri: 9pm",
                    "Sat-Sun: 9pm"
                ]
            }
        };
        document.getElementById('caption-desc').innerText = data[movie_title]['description'];
        document.getElementById('caption-rating').innerText = data[movie_title]['rating'];
        for ( i = 0; i < data[movie_title]['session_times'].length; i++){
            document.getElementById('caption-sessions').innerHTML += '<li>'+data[movie_title]['session_times'][i]+'</li>';
        }
    }

}

function imageOff() {
    document.getElementById('caption').style.display = 'none';
}

function toggleSeatSelection() {
    document.getElementById('seatSelection').style.display = 'block';
    document.getElementById('booking-button').style.display = 'block';
}