document.addEventListener('DOMContentLoaded', () => {

  // home page sessionStorage on button click
  checkRuralOrIndustrialHome();
  // visiting random page session Storage on button click
  setSiteDirectoryBasedOnURL();
  // desktop drop down function
  desktopNavigationDrop();
  // check which nav needs to show:
  checkSiteDirectory();
  // switch navigation to view other navigation
  switchNav();

});


function checkRuralOrIndustrialHome(){
	const btns = document.querySelectorAll('.page-template-home .btn--red');
	  console.log(btns); // Check if buttons are selected
	  btns.forEach(btn => {
	    // Attach event listeners here...
	    btn.addEventListener('click', function(event){
	    	event.preventDefault();
	    	const siteDirectory = event.target.getAttribute('data-attr');
		    
		    // Set it in localStorage
		    sessionStorage.setItem('sitedirectory', siteDirectory);

		    // Optionally log the value to the console to confirm
		    console.log(`sitedirectory set to: ${siteDirectory}`);
		    
		    // Navigate to the link's href after setting the localStorage
			window.location.href = event.target.href;
		  
	    })
	  });
}

function desktopNavigationDrop() {
    // Get all links that have the drop-down image (both parent and sub-links)
    const dropdownLinks = document.querySelectorAll('.parent--link, .sub--link, .sub--sub--link');

    // Loop through all dropdown links and add event listeners
    dropdownLinks.forEach(function(link) {
        const icon = link.querySelector('.link-icon'); // Check if the link has the dropdown icon

        // Add event listeners only if the icon exists (i.e., it has children links)
        if (icon) {
            let clickTimeout;

            // Single click event
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior

                // Clear the timeout in case of double-click
                if (clickTimeout) clearTimeout(clickTimeout);

                // Set a timeout to distinguish single click from double-click
                clickTimeout = setTimeout(() => {
                    // Check if it's a parent or sub link
                    if (link.classList.contains('parent--link')) {
                        // Remove 'active' class from all `.sub--link--wrapper` elements
                        document.querySelectorAll('.sub--link--wrapper').forEach(function(content) {
                            content.classList.remove('active');
                        });

                        // Add 'active' class to the closest `.sub--link--wrapper`
                        const parentWrap = link.nextElementSibling;
                        if (parentWrap && parentWrap.classList.contains('sub--link--wrapper')) {
                            parentWrap.classList.add('active');
                        }
                    } else if (link.classList.contains('sub--link')) {
                        // Remove 'active' class from all `.sub--sub--parent--wrap` elements
                        document.querySelectorAll('.sub--sub--parent--wrap').forEach(function(content) {
                            content.classList.remove('active');
                        });

                        // Add 'active' class to the closest `.sub--sub--parent--wrap`
                        const subParentWrap = link.closest('.sub-link-item').querySelector('.sub--sub--parent--wrap');
                        if (subParentWrap) {
                            subParentWrap.classList.add('active');
                        }
                    }
                }, 200); // Delay of 200ms for single-click detection
            });

            // Double click event
            link.addEventListener('dblclick', function(event) {
                event.preventDefault(); // Prevent default link behavior

                // On double click, remove 'active' class from the closest dropdown
                if (link.classList.contains('parent--link')) {
                    const parentWrap = link.nextElementSibling;
                    if (parentWrap && parentWrap.classList.contains('sub--link--wrapper')) {
                        parentWrap.classList.remove('active');
                    }
                } else if (link.classList.contains('sub--link')) {
                    const subParentWrap = link.closest('.sub-link-item').querySelector('.sub--sub--parent--wrap');
                    if (subParentWrap) {
                        subParentWrap.classList.remove('active');
                    }
                }
            });
        }
    });
}



function switchNav(){
const switchButtons = document.querySelectorAll('.switch-button');

// Add event listener to each switch button
switchButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Get the value of the 'data-attr' attribute from the clicked button
        const buttonDataAttrValue = this.getAttribute('data-attr');

        // Update sessionStorage with the value from 'data-attr'
        sessionStorage.setItem('sitedirectory', buttonDataAttrValue);
        console.log('sitedirectory updated to:', sessionStorage.getItem('sitedirectory'));

        // Get all the nav elements with the class 'navigation__menu'
        const navElements = document.querySelectorAll('.navigation__menu');

        // Loop through each nav element and check its 'data-attr' value
        navElements.forEach(function(nav) {
            const navDataAttrValue = nav.getAttribute('data-attr');

            // If the 'data-attr' matches the button's 'data-attr', add the 'active' class
            if (navDataAttrValue === buttonDataAttrValue) {
                nav.classList.add('active');
            } else {
                // Otherwise, remove the 'active' class
                nav.classList.remove('active');
            }
        });

        // Update the text node only, not the entire button content
        const textNode = this.firstChild; // Get the first text node of the button
        if (buttonDataAttrValue === 'industrial') {
            textNode.nodeValue = 'Switch to Rural Structures ';
        } else {
            textNode.nodeValue = 'Switch to Industrial Structures ';
        }
    });
});

// Add event listener for sub-links to handle active class for `.sub--sub--parent--wrap`
const subLinks = document.querySelectorAll('.sub--link');

subLinks.forEach(function(link) {
    link.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default behavior if it's a link

        // Remove 'active' class from all `.sub--sub--parent--wrap` elements
        const subParentWraps = document.querySelectorAll('.sub--sub--parent--wrap');
        subParentWraps.forEach(function(parentWrap) {
            parentWrap.classList.remove('active');
        });

        // Find the closest `.sub--sub--parent--wrap` for the clicked `.sub--link` and add the 'active' class
        const parentWrap = this.closest('.sub--sub--parent--wrap');
        if (parentWrap) {
            parentWrap.classList.add('active');
        }
    });
});



}

// check which nav to show
function checkSiteDirectory() {
    // Check if localStorage item 'sitedirectory' exists
    const siteDirectory = sessionStorage.getItem('sitedirectory');

    // If the value is 'rural', find the nav element and add 'active' class
    if (siteDirectory === 'rural') {
        const navElement = document.querySelector('nav[data-attr="rural"]');
        
        // Check if the nav element exists before adding the class
        if (navElement) {
            navElement.classList.add('active');
        }
    } else {
    	 const navElement = document.querySelector('nav[data-attr="industrial"]');
        
        // Check if the nav element exists before adding the class
        if (navElement) {
            navElement.classList.add('active');
        }
    }
}



function setSiteDirectoryBasedOnURL() {
  // Get the current URL path (everything after the domain)
  const path = window.location.pathname;

  // Regular expression to match '/rural' or '/rural/something'
  const ruralPattern = /^\/rural(\/.*)?$/;
  const industrialPattern = /^\/industrial(\/.*)?$/;

  // Check if the URL path matches the rural pattern
  if (ruralPattern.test(path)) {
    // Set sessionStorage for rural
    sessionStorage.setItem('sitedirectory', 'rural');
    console.log('sitedirectory set to rural');
  }
  // Check if the URL path matches the industrial pattern
  else if (industrialPattern.test(path)) {
    // Set sessionStorage for industrial
    sessionStorage.setItem('sitedirectory', 'industrial');
    console.log('sitedirectory set to industrial');
  }
}