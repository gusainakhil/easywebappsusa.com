/**
 * Main JavaScript for EverythingEasy Website
 * Handles navigation, animations, forms, and user interactions
 */

// Document Ready
document.addEventListener('DOMContentLoaded', function() {
    initializeNavigation();
    initializeScrollAnimations();
    initializeContactForm();
    initializeBackToTop();
    initializeTooltips();
    initializeAOS();
});

/**
 * Navigation Functionality
 */
function initializeNavigation() {
    const navbar = document.querySelector('.navbar');
    const navLinks = document.querySelectorAll('.nav-link[href^="#"]');
    
    // Smooth scrolling for navigation links
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                const navbarHeight = navbar.offsetHeight;
                const targetPosition = targetElement.offsetTop - navbarHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse.classList.contains('show')) {
                    const navbarToggler = document.querySelector('.navbar-toggler');
                    navbarToggler.click();
                }
                
                // Update active link
                updateActiveNavLink(this);
            }
        });
    });
    
    // Update navbar on scroll
    window.addEventListener('scroll', function() {
        updateNavbarOnScroll();
        updateActiveNavLinkOnScroll();
    });
}

/**
 * Update navbar appearance on scroll
 */
function updateNavbarOnScroll() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
        navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
        navbar.style.backdropFilter = 'blur(10px)';
    } else {
        navbar.classList.remove('scrolled');
        navbar.style.backgroundColor = '';
        navbar.style.backdropFilter = '';
    }
}

/**
 * Update active navigation link based on scroll position
 */
function updateActiveNavLinkOnScroll() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link[href^="#"]');
    
    let currentSection = '';
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop - 150;
        const sectionHeight = section.offsetHeight;
        
        if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
            currentSection = section.getAttribute('id');
        }
    });
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${currentSection}`) {
            link.classList.add('active');
        }
    });
}

/**
 * Update active navigation link
 */
function updateActiveNavLink(clickedLink) {
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => link.classList.remove('active'));
    clickedLink.classList.add('active');
}

/**
 * Initialize scroll animations
 */
function initializeScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-on-scroll');
                
                // Add specific animation class based on data attribute
                const animationType = entry.target.dataset.animation || 'fadeInUp';
                entry.target.classList.add(animationType);
                
                // Unobserve after animation starts
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe elements with animation classes
    const animatedElements = document.querySelectorAll('.card, .testimonial-card, .hero-section .col-lg-6');
    animatedElements.forEach(el => observer.observe(el));
}

/**
 * Initialize contact form functionality
 */
function initializeContactForm() {
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate form
            if (validateContactForm()) {
                submitContactForm();
            }
        });
        
        // Real-time validation
        const formFields = contactForm.querySelectorAll('input, select, textarea');
        formFields.forEach(field => {
            field.addEventListener('blur', function() {
                validateField(this);
            });
            
            field.addEventListener('input', function() {
                clearFieldError(this);
            });
        });
    }
}

/**
 * Validate contact form
 */
function validateContactForm() {
    const form = document.getElementById('contactForm');
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!validateField(field)) {
            isValid = false;
        }
    });
    
    // Validate email format
    const emailField = form.querySelector('#email');
    if (emailField.value && !isValidEmail(emailField.value)) {
        showFieldError(emailField, 'Please enter a valid email address');
        isValid = false;
    }
    
    // Validate phone format (if provided)
    const phoneField = form.querySelector('#phone');
    if (phoneField.value && !isValidPhone(phoneField.value)) {
        showFieldError(phoneField, 'Please enter a valid phone number');
        isValid = false;
    }
    
    return isValid;
}

/**
 * Validate individual field
 */
function validateField(field) {
    const value = field.value.trim();
    const fieldName = field.name;
    
    if (field.hasAttribute('required') && !value) {
        showFieldError(field, `${getFieldLabel(fieldName)} is required`);
        return false;
    }
    
    if (field.type === 'email' && value && !isValidEmail(value)) {
        showFieldError(field, 'Please enter a valid email address');
        return false;
    }
    
    if (field.type === 'tel' && value && !isValidPhone(value)) {
        showFieldError(field, 'Please enter a valid phone number');
        return false;
    }
    
    clearFieldError(field);
    return true;
}

/**
 * Show field error
 */
function showFieldError(field, message) {
    clearFieldError(field);
    
    field.classList.add('is-invalid');
    
    const errorDiv = document.createElement('div');
    errorDiv.className = 'invalid-feedback';
    errorDiv.textContent = message;
    
    field.parentNode.appendChild(errorDiv);
}

/**
 * Clear field error
 */
function clearFieldError(field) {
    field.classList.remove('is-invalid');
    const errorDiv = field.parentNode.querySelector('.invalid-feedback');
    if (errorDiv) {
        errorDiv.remove();
    }
}

/**
 * Get field label text
 */
function getFieldLabel(fieldName) {
    const labelMap = {
        'name': 'Full Name',
        'email': 'Email Address',
        'phone': 'Phone Number',
        'service': 'Service',
        'message': 'Project Details',
        'budget': 'Budget'
    };
    
    return labelMap[fieldName] || fieldName;
}

/**
 * Validate email format
 */
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

/**
 * Validate phone format
 */
function isValidPhone(phone) {
    const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
    const cleanPhone = phone.replace(/[\s\-\(\)\.]/g, '');
    return phoneRegex.test(cleanPhone) && cleanPhone.length >= 10;
}

/**
 * Submit contact form
 */
function submitContactForm() {
    const form = document.getElementById('contactForm');
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalBtnText = submitBtn.innerHTML;
    
    // Show loading state
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
    submitBtn.disabled = true;
    form.classList.add('loading');
    
    // Collect form data
    const formData = new FormData(form);
    
    // Send to PHP backend
    fetch('php/contact-form-handler.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // Reset button state
        submitBtn.innerHTML = originalBtnText;
        submitBtn.disabled = false;
        form.classList.remove('loading');
        
        if (data.success) {
            // Show success message
            showNotification(data.message, 'success');
            
            // Reset form
            form.reset();
            
            // Track conversion (GA4)
            if (typeof gtag !== 'undefined') {
                gtag('event', 'form_submit', {
                    'form_name': 'contact_form',
                    'service_type': formData.get('service'),
                    'budget_range': formData.get('budget'),
                    'reference_id': data.data?.reference_id
                });
            }
            
            // Optional: Show reference ID to user
            if (data.data?.reference_id) {
                setTimeout(() => {
                    showNotification(`Your reference ID is: ${data.data.reference_id}. Please save this for your records.`, 'info');
                }, 3000);
            }
            
        } else {
            // Show error message
            showNotification(data.message || 'There was an error sending your message. Please try again.', 'error');
            
            // If there are validation errors, show them
            if (data.errors && Array.isArray(data.errors)) {
                data.errors.forEach(error => {
                    console.error('Validation error:', error);
                });
            }
        }
    })
    .catch(error => {
        console.error('Form submission error:', error);
        
        // Reset button state
        submitBtn.innerHTML = originalBtnText;
        submitBtn.disabled = false;
        form.classList.remove('loading');
        
        // Show error message
        showNotification('There was a network error. Please check your connection and try again.', 'error');
    });
}

/**
 * Show notification message
 */
function showNotification(message, type = 'info') {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notification => notification.remove());
    
    // Determine alert class based on type
    let alertClass = 'alert-info';
    let iconClass = 'fas fa-info-circle';
    
    switch(type) {
        case 'success':
            alertClass = 'alert-success';
            iconClass = 'fas fa-check-circle';
            break;
        case 'error':
            alertClass = 'alert-danger';
            iconClass = 'fas fa-exclamation-triangle';
            break;
        case 'warning':
            alertClass = 'alert-warning';
            iconClass = 'fas fa-exclamation-triangle';
            break;
        default:
            alertClass = 'alert-info';
            iconClass = 'fas fa-info-circle';
    }
    
    // Create notification
    const notification = document.createElement('div');
    notification.className = `notification alert ${alertClass} alert-dismissible fade show`;
    notification.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        z-index: 9999;
        max-width: 400px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        border: none;
        border-radius: 8px;
    `;
    
    notification.innerHTML = `
        <i class="${iconClass} me-2"></i>${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;
    
    document.body.appendChild(notification);
    
    // Auto-remove after 5 seconds (8 seconds for success messages)
    const autoRemoveTime = type === 'success' ? 8000 : 5000;
    setTimeout(function() {
        if (notification.parentNode) {
            notification.remove();
        }
    }, autoRemoveTime);
}

/**
 * Initialize back to top button
 */
function initializeBackToTop() {
    const backToTopBtn = document.getElementById('backToTop');
    
    if (backToTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        });
        
        backToTopBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
}

/**
 * Initialize tooltips (if using Bootstrap tooltips)
 */
function initializeTooltips() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
}

/**
 * Initialize Animate On Scroll (AOS) alternative
 */
function initializeAOS() {
    const aosElements = document.querySelectorAll('[data-aos]');
    
    if (aosElements.length > 0) {
        const aosObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    const animation = element.dataset.aos || 'fade-in';
                    element.classList.add('aos-animate', animation);
                    aosObserver.unobserve(element);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        aosElements.forEach(element => {
            aosObserver.observe(element);
        });
    }
}

/**
 * Utility function to debounce function calls
 */
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

/**
 * Utility function to throttle function calls
 */
function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

/**
 * Performance monitoring
 */
function initializePerformanceMonitoring() {
    // Monitor Core Web Vitals
    if ('web-vital' in window) {
        import('https://unpkg.com/web-vitals').then(({getCLS, getFID, getFCP, getLCP, getTTFB}) => {
            getCLS(sendToAnalytics);
            getFID(sendToAnalytics);
            getFCP(sendToAnalytics);
            getLCP(sendToAnalytics);
            getTTFB(sendToAnalytics);
        });
    }
}

/**
 * Send performance metrics to analytics
 */
function sendToAnalytics(metric) {
    if (typeof gtag !== 'undefined') {
        gtag('event', metric.name, {
            event_category: 'Web Vitals',
            value: Math.round(metric.name === 'CLS' ? metric.value * 1000 : metric.value),
            event_label: metric.id,
            non_interaction: true,
        });
    }
}

/**
 * Initialize error tracking
 */
function initializeErrorTracking() {
    window.addEventListener('error', function(e) {
        if (typeof gtag !== 'undefined') {
            gtag('event', 'exception', {
                description: e.error?.message || 'Unknown error',
                fatal: false
            });
        }
        console.error('JavaScript error:', e.error);
    });
    
    window.addEventListener('unhandledrejection', function(e) {
        if (typeof gtag !== 'undefined') {
            gtag('event', 'exception', {
                description: e.reason?.message || 'Unhandled promise rejection',
                fatal: false
            });
        }
        console.error('Unhandled promise rejection:', e.reason);
    });
}

// Initialize performance monitoring and error tracking
document.addEventListener('DOMContentLoaded', function() {
    initializePerformanceMonitoring();
    initializeErrorTracking();
});

// Export functions for testing (if needed)
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        isValidEmail,
        isValidPhone,
        validateField,
        debounce,
        throttle
    };
}
