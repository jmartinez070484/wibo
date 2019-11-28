var header = document.querySelector('header');

if(header){
	var menuIcon = header.querySelectorAll('.container .row .col-12 ul li i, .menu i');
	var totalMenuIcons = menuIcon.length;

	if(totalMenuIcons){
		for(var x=0;x<totalMenuIcons;x++){
			menuIcon[x].addEventListener('click',function(){
				var body = document.querySelector('body');

				body.className = body.className.indexOf('mobile-nav') === -1 ? body.className + ' mobile-nav' : body.className.replace(' mobile-nav','')
			});
		}
	}
}

var links = document.querySelectorAll('a');
var totalLinks = links.length;

if(totalLinks){
	for(var x=0;x<totalLinks;x++){
		links[x].addEventListener('click',function(e){
			var id = this.getAttribute('href');

			if(id && id.indexOf('#') !== -1){
				e.preventDefault();
				scrollAnimation(id);
			}
		});
	}
}

var projects = document.querySelectorAll('.projects .container .row .col-12 .project-container .project-items div');
var totalProjects = projects.length;

if(totalProjects){
	var projectBtns = projects[0].parentNode.nextElementSibling;
	var projectBtnLinks = projectBtns.querySelectorAll('a');
	var totalProjectBtnLinks = projectBtnLinks.length;

	if(totalProjectBtnLinks){
		for(var x=0;x<totalProjectBtnLinks;x++){
			projectBtnLinks[x].setAttribute('data-direction',x);
			projectBtnLinks[x].addEventListener('click',function(e){
				e.preventDefault();

				var next = this.getAttribute('data-direction') == 1 ? true : false;
				var container = this.parentNode.previousElementSibling;
				var currentPosition = parseInt(this.parentNode.parentNode.getAttribute('data-position'));
				var display = parseInt(this.parentNode.parentNode.getAttribute('data-display'));
				var width = parseInt(this.parentNode.previousElementSibling.firstElementChild.offsetWidth);

				if(next){
					var newPosition = currentPosition + 1 < (totalProjects + 1) - display ? currentPosition + 1 : 0;
				}else{
					var newPosition = currentPosition - 1 >= 0 ? currentPosition - 1 : totalProjects - (display);
				}

				var marginLeftPixels = (width + 30) * newPosition;

				container.style.marginLeft = marginLeftPixels ? '-' +marginLeftPixels + 'px' : 0;
				this.parentNode.parentNode.setAttribute('data-position',newPosition);
				
			});
		}
	}
	
	renderProjects();
}

function renderProjects(){
	if(totalProjects){
		var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
		var projectsDisplay = width > 1024 ? 3 : 2;

		if(width <= 600){
			projectsDisplay = 1;
		}

		var projectContainerWidth = projectsDisplay === 3 ? Math.ceil(projects[0].parentNode.parentNode.offsetWidth / projectsDisplay) - 20 : Math.ceil(projects[0].parentNode.parentNode.offsetWidth / projectsDisplay) - 10;

		projects[0].parentNode.style.marginLeft = 0;
		projects[0].parentNode.style.width = ((projectContainerWidth + 50) * totalProjects) + 'px';
		projects[0].parentNode.parentNode.setAttribute('data-display',projectsDisplay);
		projects[0].parentNode.parentNode.setAttribute('data-position',0);
		projects[0].parentNode.parentNode.setAttribute('data-width',projectContainerWidth);

		for(var x=0;x<totalProjects;x++){
			projects[x].style.width = projectContainerWidth + 'px';
			projects[x].style.height = projectContainerWidth + 'px';
		}
		
		projectBtns.style.display = totalProjects > projectsDisplay ? 'block' : 'none';
	}
}

function scrollAnimation(_id){
	var scrollToDiv = document.querySelector(_id);
	
	if(scrollToDiv){
		var headerHeight = document.querySelector('header').offsetHeight;
		var position = window.scrollY || window.scrollY >= 0 ? window.scrollY : window.screenTop;
		var	parent = scrollToDiv;
		var	parentLoop = true;
		var	scrollPixels = 0;

		do{
			parentLoop = parent && parent.localName !== 'body' ? true : false;

			if(parentLoop){
				scrollPixels += parent.offsetTop;
				parent = parent.offsetParent;
			}
		}while(parentLoop);

		scrollPixels = scrollPixels - headerHeight;

		var down = scrollToDiv.offsetTop > position ? true : false;
		var increment = down ? scrollPixels / 50 : scrollPixels / 28;
		
		var autoScroll = setInterval(function(){
	        down ? position += increment : position -= increment;
	        
	        if(position + increment > scrollPixels && down || position - increment < scrollPixels && !down){
	        	position = scrollPixels;
	        }

	        window.scrollTo(0,position);

	        var windowScroll = window.scrollY || window.scrollY >= 0 ? window.scrollY : window.screenTop;
	        
	        if(windowScroll >= scrollPixels && down || window.innerHeight + position >= document.documentElement.offsetHeight && down || windowScroll <= scrollPixels && !down){
	            clearInterval(autoScroll);
	        }
	    },10);

	}
}