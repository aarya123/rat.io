var submit = document.getElementById("submit");
var keywords = document.getElementById("keywords");
var opts = {
  lines: 13, // The number of lines to draw
  length: 21, // The length of each line
  width: 11, // The line thickness
  radius: 34, // The radius of the inner circle
  corners: 1, // Corner roundness (0..1)
  rotate: 4, // The rotation offset
  direction: 1, // 1: clockwise, -1: counterclockwise
  color: '#000', // #rgb or #rrggbb or array of colors
  speed: 1.1, // Rounds per second
  trail: 42, // Afterglow percentage
  shadow: false, // Whether to render a shadow
  hwaccel: false, // Whether to use hardware acceleration
  className: 'spinner', // The CSS class to assign to the spinner
  zIndex: 2e9, // The z-index (defaults to 2000000000)
  top: '0px', // Top position relative to parent in px
  left: 'auto' // Left position relative to parent in px
};
var spinner = new Spinner(opts);
var body = document.body;
var desc = document.getElementById("desc");
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
submit.onclick=function(e) {
    var req = new XMLHttpRequest();
    req.open("GET", "AnalysisCoordinator.php?q=" + encodeURIComponent(keywords.value));
    desc.innerHTML = "";
    spinner.spin(desc);
    req.onreadystatechange = function() {
		if(req.readyState == 4) {
            if(req.status == 200) {
                spinner.stop();
                console.log(req.responseText);
                var score = Number(req.responseText);
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
                submit.style.borderColor = invisibleColor;
                keywords.style.borderColor = invisibleColor;
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
            }
            else {
                alert("issue");
            }
		}
	}
	req.send();
}
keywords.onkeydown = function(e) {
    if(e.keyCode == 13) {
        submit.click();
    }
}