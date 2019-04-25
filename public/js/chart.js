/*
 $('.sidebar-toggle').on('click', e => {
    $('.app').toggleClass('is-collapsed');
    e.preventDefault();
  });
*/

/*function openNav() {
  document.getElementById("sidebar").style.width = "250px";
  //document.getElementById("ham-bar").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("sidebar").style.width = "0";
  //document.getElementById("ham-bar").style.marginLeft= "0";
}*/



/* globals Chart:false, feather:false */

(function () {
  'use strict'
  feather.replace()
  // Graphs
  var ctx = document.getElementById("myChart")
  // eslint-disable-next-line no-unused-vars
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
      ],
      datasets: [{
        data: [
          15339,
          21345,
          18483,
          24003,
          23489,
          24092,
          12034
        ],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })
}())
/*function getCookie(cname) {
              var name = cname + "=";
              var decodedCookie = decodeURIComponent(document.cookie);
              var ca = decodedCookie.split(';');
              for(var i = 0; i <ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                  c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                  return c.substring(name.length, c.length);
                }
              }
              return "";
}
        $(document).ready(function(){
            if(getCookie("sidebar")=== "visible"){
                console.log('hi');
            }
        })*/


