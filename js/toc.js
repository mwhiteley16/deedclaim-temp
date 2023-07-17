var tocSec = document.getElementById('ez-toc-container');
if (typeof tocSec !== 'undefined' && tocSec !== null) {
	
	// For TOC +
	var level2 = document.getElementsByClassName("ez-toc-heading-level-2");
	for (var j = 0; j < level2.length; j++) {
		level2[j].onclick = function() {
			this.classList.toggle("active");
		}
	}
	// For TOC Show/Hide
	var toc = document.getElementsByClassName("ez-toc-toggle");
	window.onload = function()  {
		var tocList = document.getElementsByClassName("ez-toc-list"); 
		var tocStyle = tocList[0].style.display;
		if(tocStyle == 'none'){
			toc[0].classList.remove("active");
		} else {
			toc[0].classList.add("active");
		}
	}

	for (var i = 0; i < toc.length; i++) {
		toc[i].onclick = function() {
			var tocList = document.getElementsByClassName("ez-toc-list"); 
			var tocStyle = tocList[0].style.display;
			if(tocStyle == 'none'){
				this.classList.add("active");
			} else {
				this.classList.remove("active");
			}
		}

	}
}