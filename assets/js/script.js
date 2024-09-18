document.addEventListener('DOMContentLoaded', () => {

  // home page sessionStorage on button click
  checkRuralOrIndustrialHome();
  // visiting random page session Storage on button click
  setSiteDirectoryBasedOnURL();
  // desktop drop down function
  desktopNavigationDrop();
  // check which nav needs to show:
  checkSiteDirectory();

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
                //$('.sub--link--wrapper').hide();
                // Clear the timeout in case of double-click
                if (clickTimeout) clearTimeout(clickTimeout);

                // Set a timeout to distinguish single click from double-click
                clickTimeout = setTimeout(() => {
                    // Find the sibling dropdown content (sub--link--wrapper, sub-sub-link-item, etc.)
                    const dropdownContent = this.nextElementSibling;

                    // Ensure dropdown content exists and has a valid class
                    if (dropdownContent && (dropdownContent.classList.contains('sub--link--wrapper') || dropdownContent.classList.contains('sub-sub-link-item') || dropdownContent.classList.contains('sub--sub--link--item'))) {

                        // Hide other dropdowns at the same level (within the same parent container)
                        let parentDropdown = this.closest('.sub--link--wrapper') || this.closest('.base--link--wrapper') || this.closest('.sub-sub-link-item');
                        if (parentDropdown) {
                            parentDropdown.querySelectorAll('.sub--link--wrapper, .sub-sub-link-item, .sub--sub--link--item').forEach(function(content) {
                                content.style.display = 'none';
                            });
                        }

                        // Toggle the visibility of the current dropdown content
                        dropdownContent.style.display = (dropdownContent.style.display === 'flex') ? 'none' : 'flex';
                    }
                }, 200); // Delay of 200ms for single-click detection
            });

            // Double click event
            link.addEventListener('dblclick', function(event) {
                event.preventDefault(); // Prevent default link behavior

                // Find the sibling dropdown content (sub--link--wrapper, sub-sub-link-item, etc.) and hide it
                const dropdownContent = this.nextElementSibling;

                if (dropdownContent && (dropdownContent.classList.contains('sub--link--wrapper') || dropdownContent.classList.contains('sub-sub-link-item') || dropdownContent.classList.contains('sub--sub--link--item'))) {
                    // Hide the dropdown content on double-click
                    dropdownContent.style.display = 'none';
                }
            });
        }
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