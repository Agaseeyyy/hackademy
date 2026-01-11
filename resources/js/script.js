console.log("Script loaded");

document.addEventListener('DOMContentLoaded', function() {
    // Initialize scroll containers only if they exist
    const scrollContainer = document.querySelectorAll(".scrollContainer");
    if (scrollContainer.length > 0) {
        // Make the functions available globally
        window.scrolltoLeft = function(bt) {
            var currentPosition;
            if(bt == "bt1" && scrollContainer[0]) {
                currentPosition = scrollContainer[0].scrollLeft;
                scrollContainer[0].scrollTo({
                    left: currentPosition - 200,
                    behavior: 'smooth'
                });
            } else if(bt == "bt2" && scrollContainer[1]) {
                currentPosition = scrollContainer[1].scrollLeft;
                scrollContainer[1].scrollTo({
                    left: currentPosition - 200,
                    behavior: 'smooth'
                });
            } else if(bt == "bt3" && scrollContainer[2]) {
                currentPosition = scrollContainer[2].scrollLeft;
                scrollContainer[2].scrollTo({
                    left: currentPosition - 200,
                    behavior: 'smooth'
                });
            }
        };

        window.scrolltoRight = function(bt) {
            var currentPosition;
            if(bt == "bt1" && scrollContainer[0]) {
                currentPosition = scrollContainer[0].scrollLeft;
                scrollContainer[0].scrollTo({
                    left: currentPosition + 200,
                    behavior: 'smooth'
                });
            } else if(bt == "bt2" && scrollContainer[1]) {
                currentPosition = scrollContainer[1].scrollLeft;
                scrollContainer[1].scrollTo({
                    left: currentPosition + 200,
                    behavior: 'smooth'
                });
            } else if(bt == "bt3" && scrollContainer[2]) {
                currentPosition = scrollContainer[2].scrollLeft;
                scrollContainer[2].scrollTo({
                    left: currentPosition + 200,
                    behavior: 'smooth'
                });
            }
        };
    }

    // Initialize show more functionality if the button exists
    const showMoreBtn = document.querySelector(".show-more-btn");
    const showContent = document.querySelector("#description");
    if (showMoreBtn && showContent) {
        window.showmore = function() {
            if(showMoreBtn.innerText === "Show more") {
                showContent.classList.add("line-clamp-none");
                showMoreBtn.innerText = "Show less";
            } else {
                showContent.classList.remove("line-clamp-none");
                showMoreBtn.innerText = "Show more";
            }
        };
    }

    // Initialize mobile navigation if it exists
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.querySelector('.mobileMenu');
    
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            console.log('Menu toggled!');
        });
    }
    // This script ensures the icons toggle correctly when the menu is opened/closed
    if (mobileMenuBtn) {
        const hamburgerIcon = document.getElementById('hamburgerIcon');
        const closeIcon = document.getElementById('closeIcon');
        
        mobileMenuBtn.addEventListener('click', () => {
        hamburgerIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
        });
    }

    
    // Mobile search toggle
    const mobileSearchBtn = document.getElementById('mobileSearchBtn');
    const mobileSearch = document.getElementById('mobileSearch');
    
    if (mobileSearchBtn && mobileSearch) {
        mobileSearchBtn.addEventListener('click', () => {
            mobileSearch.classList.toggle('hidden');
            // Focus on search input when revealed
            if (!mobileSearch.classList.contains('hidden')) {
                mobileSearch.querySelector('input[type="search"]').focus();
            }
        });
    }

    // Initialize contact form if it exists
    const contact = document.getElementById("contacts");
    if (contact) {
        contact.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Initialize emailjs
            (function(){
                emailjs.init({
                    publicKey: "fBrm2QucDoMpGt-qz",
                });
            })();
            
            // Get form data
            let params = { 
                from_name: document.getElementById("name").value,
                email_id: document.getElementById("email").value,
                message: document.getElementById("message").value
            };
            
            // Validate form
            if(params.email_id === "") {
                alert("Please field all the requirements!");
                return false;
            }
            
            // Send email
            emailjs.send("service_zey2njp", "template_ov22a9y", params)
                .then(function (res) {
                    alert("Message Sent!");
                })
                .catch(function (error) {
                    console.error('Error sending email:', error);
                    alert('Failed to send message. Please try again.');
                });
        });
    }

    // Courses Filters
    const filterButtons = document.querySelectorAll('.category-filter');
    const courseCards = document.querySelectorAll('.course-card');
    
    if (filterButtons.length > 0 && courseCards.length > 0) {
        // Store initial card display state
        const initialState = Array.from(courseCards).map(card => ({
            element: card,
            display: window.getComputedStyle(card).display
        }));
        
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const category = button.dataset.category;
                
                // Update active button styling
                filterButtons.forEach(btn => {
                    btn.classList.remove('active', 'bg-soft-blue', 'text-white');
                    btn.classList.add('bg-gray-200', 'text-gray-800');
                });
                
                button.classList.add('active', 'bg-soft-blue', 'text-white');
                button.classList.remove('bg-gray-200', 'text-gray-800');
                
                // Show/hide cards with animation
                if (category === 'all') {
                    // Restore all cards to their initial state
                    initialState.forEach(item => {
                        item.element.style.display = item.display;
                        setTimeout(() => {
                            item.element.style.opacity = '1';
                            item.element.style.transform = 'scale(1)';
                        }, 10);
                    });
                } else {
                    // Filter cards
                    courseCards.forEach(card => {
                        if (card.dataset.category === category) {
                            card.style.display = '';
                            setTimeout(() => {
                                card.style.opacity = '1';
                                card.style.transform = 'scale(1)';
                            }, 10);
                        } else {
                            card.style.opacity = '0';
                            card.style.transform = 'scale(0.9)';
                            setTimeout(() => {
                                card.style.display = 'none';
                            }, 300);
                        }
                    });
                }
            });
        });
        
        // Set initial transition properties for all cards
        courseCards.forEach(card => {
            card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
        });
    }
    
});

// copy to clipboard function
window.copyToClipboard = function(text) {
    // Create a temporary input element to use for copying
    const tempInput = document.createElement("input");
    document.body.appendChild(tempInput);
    tempInput.value = text;
    tempInput.select();
    
    try {
      // Execute copy command
      document.execCommand('copy');
      
      // Show success message
      const button = event.currentTarget;
      const originalText = button.innerHTML;
      
      button.innerHTML = `
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
        </svg>
        Copied!
      `;
      
      button.classList.remove('bg-purple-600', 'hover:bg-purple-700');
      button.classList.add('bg-green-600', 'hover:bg-green-700');
      
      // Reset button after 2 seconds
      setTimeout(function() {
        button.innerHTML = originalText;
        button.classList.remove('bg-green-600', 'hover:bg-green-700');
        button.classList.add('bg-purple-600', 'hover:bg-purple-700');
      }, 2000);
      
    } catch (err) {
      console.error('Could not copy text: ', err);
    } finally {
      // Clean up
      document.body.removeChild(tempInput);
    }
  };