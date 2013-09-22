var submit = document.getElementById("submit");
var keywords = document.getElementById("keywords");
var opts = {
  lines: 13, // The number of lines to draw
  length: 5, // The length of each line
  width: 2, // The line thickness
  radius: 7, // The radius of the inner circle
  corners: 1, // Corner roundness (0..1)
  rotate: 4, // The rotation offset
  direction: 1, // 1: clockwise, -1: counterclockwise
  color: '#000', // #rgb or #rrggbb or array of colors
  speed: 1.2, // Rounds per second
  trail: 42, // Afterglow percentage
  shadow: false, // Whether to render a shadow
  hwaccel: false, // Whether to use hardware acceleration
  className: 'spinner', // The CSS class to assign to the spinner
  zIndex: 2e9 // The z-index (defaults to 2000000000)
};
var spinner = new Spinner(opts);
var body = document.body;
var desc = document.getElementById("desc");
var spinDiv = document.getElementById("spinner");
var values = ["The internet hates you and your keywords",
"The internet strongly dislikes you and your keywords",
"The internet would appreciate it if you changed your interests to not include those keywords",
"The internet is slightly irritated with your keywords",
"The internet is a tad bit annoyed when someone searches your keywords",
"The internet is indifferent to you and your keywords",
"The internet has a faintly positive reaction to your keywords",
"The internet feels good when it sees your keywords",
"The internet has butterflies in its stomach when your keywords appear",
"The internet would love to have coffee with your keywords",
"The internet wants to put up ads for your keywords for free"];
var invisibleColor = "rgba(0, 0, 0, 0)";
//var chart;
//addEventListener('load',function(e){chart = document.getElementById('chartDiv');});
function drawChart(array) {
    var ourData = [];
    ourData[0] = [];
    ourData[1] = [];
    
    ourData[0][0] = "Source";
    ourData[0][1] = "Opinion Factor"
    
    var i=1;
    for(var key in array) {
        ourData[i][0] = key;
        ourData[i][1] = array[key];
        i++;
    }
    var chart = document.getElementById('chartDiv');
    console.log("BREAK EVERYTHING??");
   
    //setTimeout(function(){google.load('visualization', '1', {'callback':'alert("2 sec wait")', 'packages':['corechart']})}, 2000);
    console.log(chart);
    var c = new google.visualization.ColumnChart(chart);
    
    console.log(ourData);
    var data = google.visualization.arrayToDataTable(ourData);
    var options = {
      title: '',
      hAxis: {title: 'Source', titleTextStyle: {color: 'red'}}
    };
    c.draw(data, options);
}

submit.onclick=function(e) {
    if(keywords.value != "") {
        var req = new XMLHttpRequest();
        req.open("GET", "AnalysisCoordinator.php?q=" + encodeURIComponent(keywords.value));
        desc.innerHTML = "";
        spinner.spin(spinDiv);
        req.onreadystatechange = function() {
    		if(req.readyState == 4) {
                if(req.status == 200) {
                    spinner.stop();
                    console.log(req.responseText);
                    var scores = JSON.parse(req.responseText);
                    
                    var score = 0;
                    var count = 0;
                    for(var key in scores) {
                        //Use scores[key] as the value and key as the key
                        score += scores[key];
                        count++;
                    }
                    score = score / count;
                    var color, borderColor;
                    if(score == 2) {
                        desc.innerHTML = "You have been rate limited";
                        color = "rgba(225, 225, 225, 1)";
                        borderColor = "rgba(125, 125, 125, 0.5)";
                    }
                    else if(score < 0) {
                        color = "rgba(0, 0, 225, " + -(score / 2) + ")";
                        borderColor = "rgba(0, 0, 225, " + -(score - 0.2) + ")";
                    }
                    else {
                        color = "rgba(225, 0, 0, " + (score / 2) + ")";
                        borderColor = "rgba(225, 0, 0, " + (score + 0.2) + ")";
                    }
                    
                    body.style.backgroundColor = color;
                    //submit.style.borderColor = invisibleColor;
                    keywords.style.borderColor = "rbga(100,100,100,.1)";
                    if(document.querySelector("#submit:hover")) {
                        submit.style.borderColor = borderColor;
                    }
                    else if(document.activeElement == keywords) {
                        keywords.style.borderColor = borderColor;
                    }
                    keywords.onfocus = function() {
                        keywords.style.borderColor = borderColor;
                    }
                    keywords.onblur = function() {
                        keywords.style.borderColor = invisibleColor;
                    }
                    submit.onmouseover = function() {
                        submit.style.borderColor = borderColor;
                    }
                    submit.onmouseout = function() {
                        submit.style.borderColor = invisibleColor;
                    }
                    if(score >= -1 && score <= 1) {
                        score *= 100;
                        score /= 20;
                        score = Math.floor(score);
                        score += 5;
                        desc.innerHTML = values[score];
                        desc.classList.add("active");
                    }
                    drawChart(scores);
                } else {
                    alert("issue");
                }
    		}
        }
        req.send();
	} else {
	    message = "Please enter a keyword or phrase";
	}
	
}
keywords.onkeydown = function(e) {
    if(e.keyCode == 13) {
        submit.click();
    }
}