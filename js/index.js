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
submit.onclick=function(e) {
    console.log(e);
    var req = new XMLHttpRequest();
    req.open("GET", "keyword_ratings.php?q=" + encodeURIComponent(keywords.value));
    spinner.classList.add("active");
    desc.classList.remove("active");
    req.onreadystatechange = function() {
		if(req.readyState == 4) {
            if(req.status == 200) {
                console.log(req.responseText);
                var score = JSON.parse(req.responseText)["score"];
                var color;
                if(score < 0) {
                    color = "rgba(0, 0, 255, " + -score + ")";
                }
                else {
                    color = "rgba(255, 0, 0, " + score + ")";
                }
                body.style.backgroundColor = color;
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