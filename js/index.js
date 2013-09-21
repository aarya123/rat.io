var submit = document.getElementById("submit");
var keywords = document.getElementById("keywords");
var spinner = document.getElementById("spinner");
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
    req.open("GET", "keyword_ratings.php?q=" + encodeURIComponent(keywords.value));
    spinner.classList.add("active");
    desc.classList.remove("active");
    req.onreadystatechange = function() {
		if(req.readyState == 4) {
            if(req.status == 200) {
                console.log(req.responseText);
                var score = Number(req.responseText);
                var color, borderColor;
                if(score < 0) {
                    color = "rgba(0, 0, 150, " + -score + ")";
                    borderColor = "rgba(0, 0, 150, " + -(score - 0.4) + ")";
                }
                else {
                    color = "rgba(150, 0, 0, " + score + ")";
                    borderColor = "rgba(150, 0, 0, " + (score + 0.4) + ")";
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
                score *= 100;
                score /= 20;
                score = Math.floor(score);
                score += 5;
                desc.innerHTML = values[score];
                desc.classList.add("active");
            }
            else {
                alert("issue");
            }
            spinner.classList.remove("active");
		}
	}
	req.send();
}
keywords.onkeydown = function(e) {
    if(e.keyCode == 13) {
        submit.click();
    }
}