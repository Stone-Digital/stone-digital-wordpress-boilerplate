document.addEventListener('DOMContentLoaded', () => {

  // home page sessionStorage on button click
  checkRuralOrIndustrialHome();
  // visiting random page session Storage on button click
  setSiteDirectoryBasedOnURL();

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