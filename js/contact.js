document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('ajax-contact');
    const formMessages = document.getElementById('form-messages');
    const NOTIFICATION_DURATION = 15000;

    const config = {
        endpoint: './includes/mailer.php',
        messages: {
            success: 'Message sent successfully!',
            networkError: 'Network error. Please check your connection.',
            serverError: 'An error occurred on the server.',
            generalError: 'An error occurred. Please try again later.',
        }
    };

    if (!contactForm || !formMessages) {
        console.error('Required elements not found');
        return;
    }

    class NotificationHandler {
        static show(message, isError = false) {
            if (!formMessages) return;

            if (typeof message === 'object') {
                message = message.message || config.messages.generalError;
            }

            formMessages.textContent = message;
            formMessages.className = `notification ${isError ? 'error' : 'success'}`;
            formMessages.style.display = 'block';

            formMessages.style.opacity = '0';
            requestAnimationFrame(() => {
                formMessages.style.opacity = '1';
                formMessages.style.transition = 'opacity 0.3s ease-in';
            });

            NotificationHandler.hideAfterDelay();
        }

        static hideAfterDelay() {
            setTimeout(() => {
                if (formMessages) {
                    formMessages.style.opacity = '0';
                    setTimeout(() => {
                        formMessages.style.display = 'none';
                    }, 1500);
                }
            }, NOTIFICATION_DURATION);
        }
    }

    function validateForm(formData) {
        const email = formData.get('email');
        const name = formData.get('name');
        const message = formData.get('message');

        if (!email || !name || !message) {
            return 'Please fill in all required fields.';
        }

        if (message.length < 10) {
            return 'Message must be at least 10 characters long.';
        }

        return null;
    }

    async function handleSubmit(e) {
        e.preventDefault();

        const submitButton = contactForm.querySelector('button[type="submit"]');
        const formData = new FormData(contactForm);

        const validationError = validateForm(formData);
        if (validationError) {
            NotificationHandler.show(validationError, true);
            return;
        }

        try {
            submitButton?.setAttribute('disabled', 'disabled');
            contactForm.style.opacity = '0.7';

            const response = await fetch(config.endpoint, {
                method: 'POST',
                body: formData
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            NotificationHandler.show(config.messages.success);
            contactForm.reset();

        } catch (error) {
            console.error('Submission error:', error);
            const errorMessage = error.message === 'Failed to fetch'
                ? config.messages.networkError
                : error.message || config.messages.generalError;

            NotificationHandler.show(errorMessage, true);

        } finally {
            submitButton?.removeAttribute('disabled');
            contactForm.style.opacity = '1';
            submitButton.textContent = 'Send Message';
        }
    }

    contactForm.addEventListener('submit', handleSubmit);

    // Add input validation listeners
    const inputs = contactForm.querySelectorAll('input, textarea');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value.trim() === '' && this.hasAttribute('required')) {
                this.classList.add('error');
            } else {
                this.classList.remove('error');
            }
        });
    });

    // Prevent multiple rapid submissions
    let lastSubmissionTime = 0;
    contactForm.addEventListener('submit', function(e) {
        const now = Date.now();
        if (now - lastSubmissionTime < 2000) {
            e.preventDefault();
            NotificationHandler.show('Please wait before submitting again.', true);
        }
        lastSubmissionTime = now;
    });
});