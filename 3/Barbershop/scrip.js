// DOM Elements
const tentangBtn = document.getElementById('tentang-btn');
const antrianBtn = document.getElementById('antrian-btn');
const tentangModal = document.getElementById('tentang-modal');
const antrianModal = document.getElementById('antrian-modal');
const closeBtns = document.querySelectorAll('.close');
const navLinks = document.querySelectorAll('.nav-link');

// Modal Functions
function openModal(modal) {
    modal.style.display = 'flex';
    // Trigger animation
    setTimeout(() => {
        modal.classList.add('show');
    }, 10);
}

function closeModal(modal) {
    modal.classList.remove('show');
    // Wait for animation to complete before hiding
    setTimeout(() => {
        modal.style.display = 'none';
    }, 300);
}

// ========== EVENT LISTENERS ==========

// 1. EVENT LISTENER untuk Modal "Tentang Kami"
tentangBtn.addEventListener('click', (e) => {
    e.preventDefault();
    openModal(tentangModal);
});

// 2. EVENT LISTENER untuk Modal "Antrian"  
antrianBtn.addEventListener('click', (e) => {
    e.preventDefault();
    openModal(antrianModal);
});

// 3. EVENT LISTENER untuk Close modal dengan tombol X (forEach loop)
closeBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        const modal = btn.closest('.modal');
        closeModal(modal);
    });
});

// 4. EVENT LISTENER untuk Close modal dengan klik di luar content
window.addEventListener('click', (e) => {
    if (e.target.classList.contains('modal')) {
        closeModal(e.target);
    }
});

// 5. EVENT LISTENER untuk Smooth Scroll navigasi (forEach loop)
navLinks.forEach(link => {
    link.addEventListener('click', (e) => {
        const href = link.getAttribute('href');
        
        // Hanya untuk link yang menuju ke section (#hero, dll)
        if (href && href.startsWith('#') && href !== '#') {
            e.preventDefault();
            
            const target = document.querySelector(href);
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
    });
});

// 6. EVENT LISTENER untuk Hover effect pada logo (mouseenter)
const logo = document.querySelector('.logo');
logo.addEventListener('mouseenter', () => {
    logo.style.color = '#5a2d0c';
});

// 7. EVENT LISTENER untuk Hover effect pada logo (mouseleave)
logo.addEventListener('mouseleave', () => {
    logo.style.color = '#000';
});

// Efek typing untuk hero text
const heroText = document.querySelector('.hero-text p');
const originalText = heroText.textContent;

function typeWriter(element, text, speed = 50) {
    element.textContent = '';
    let i = 0;
    
    function type() {
        if (i < text.length) {
            element.textContent += text.charAt(i);
            i++;
            setTimeout(type, speed);
        }
    }
    
    type();
}

// Intersection Observer untuk animasi saat scroll
const observerOptions = {
    threshold: 0.3,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('fade-in');
            
            // Trigger typing effect untuk hero text
            if (entry.target.querySelector('.hero-text p')) {
                setTimeout(() => {
                    typeWriter(heroText, originalText, 30);
                }, 500);
            }
        }
    });
}, observerOptions);

// Observe hero section
const heroSection = document.querySelector('.hero');
observer.observe(heroSection);

// Dynamic queue number update
function updateQueueNumber() {
    const queueElement = document.querySelector('.queue-number');
    if (queueElement) {
        const currentNum = parseInt(queueElement.textContent);
        // Simulasi perubahan nomor antrian
        const newNum = Math.max(1, currentNum + Math.floor(Math.random() * 3) - 1);
        queueElement.textContent = newNum;
        
        // Update estimasi waktu
        const timeElement = document.querySelector('.time');
        const estimatedTime = newNum * 3; // 3 menit per orang
        timeElement.textContent = `${estimatedTime} menit`;
    }
}

// Update antrian setiap 10 detik (simulasi)
setInterval(updateQueueNumber, 10000);

// 8. EVENT LISTENER untuk Page Load (DOMContentLoaded)
document.addEventListener('DOMContentLoaded', () => {
    // Add loading effect to page
    document.body.style.opacity = '0';
    
    setTimeout(() => {
        document.body.style.transition = 'opacity 0.5s ease';
        document.body.style.opacity = '1';
    }, 100);
    
    // Add hover effects to social links dengan delay
    const socialLinks = document.querySelectorAll('.social-link');
    socialLinks.forEach((link, index) => {
        setTimeout(() => {
            link.style.opacity = '0';
            link.style.transform = 'translateY(20px)';
            link.style.transition = 'all 0.5s ease';
            
            setTimeout(() => {
                link.style.opacity = '1';
                link.style.transform = 'translateY(0)';
            }, 100);
        }, index * 200);
    });
});

// 9. EVENT LISTENER untuk Easter Egg (Double click pada logo)
let clickCount = 0;
logo.addEventListener('click', () => {
    clickCount++;
    
    if (clickCount === 2) {
        // Surprise animation
        document.body.style.background = 'linear-gradient(45deg, #d2b48c, #f4e1c1, #d2b48c)';
        document.body.style.backgroundSize = '400% 400%';
        document.body.style.animation = 'gradientShift 3s ease infinite';
        
        setTimeout(() => {
            document.body.style.background = '';
            document.body.style.animation = '';
        }, 5000);
        
        clickCount = 0;
    }
    
    // Reset click count setelah 1 detik
    setTimeout(() => {
        clickCount = 0;
    }, 1000);
});

// Add gradient animation keyframes dynamically
const style = document.createElement('style');
style.textContent = `
    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
`;
document.head.appendChild(style);