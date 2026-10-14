// Safety Block
const safeQuery = (selector, callback) => {
    const element = document.querySelector(selector);
    if (element) callback(element);
};

// 1. theme
const initTheme = () => {
    safeQuery('.sidebar', (sidebar) => {                                                                                                    
        if (!document.querySelector('.theme-toggle-btn')) {
            const themeBtn = document.createElement('button');
            themeBtn.innerHTML = "🌓 Mode";
            themeBtn.className = "theme-toggle-btn";
            themeBtn.style.cssText = "margin: 15px auto; padding: 10px; width: 85%; cursor: pointer; border-radius: 8px; background: var(--blue); color: white; border: none; display: block;";
            sidebar.appendChild(themeBtn);

            themeBtn.addEventListener('click', () => {
                document.body.classList.toggle('light-theme');
                localStorage.setItem('theme', document.body.classList.contains('light-theme') ? 'light' : 'dark');
                updateGreeting(); // تحديث الترحيب فوراً مع المود
            });
        }
    });
    if (localStorage.getItem('theme') === 'light') document.body.classList.add('light-theme');
};

// 2. Good morning/evening/afternoon
const updateGreeting = () => {
    safeQuery('.view-header h1', (welcomeTitle) => {
        const hour = new Date().getHours();
        const isLight = document.body.classList.contains('light-theme');
        let greet = hour < 12 ? "Good Morning" : hour < 18 ? "Good Afternoon" : "Good Evening";
        welcomeTitle.innerHTML = `${isLight ? '☀️' : '🌙'} ${greet}, Belo! 👋`;
    });
};

// 3. Menu 
const initMenu = () => {
    safeQuery('.view-header', (header) => {
        if (!document.querySelector('.menu-toggle-btn')) {
            const toggleBtn = document.createElement('button');
            toggleBtn.innerText = "☰ Menu";
            toggleBtn.className = "menu-toggle-btn";
            toggleBtn.style.cssText = "padding: 8px 12px; margin-right: 15px; border-radius: 5px; border: 1px solid #ddd; cursor: pointer; background: #fff; color: #333;";
            header.prepend(toggleBtn);

            toggleBtn.addEventListener('click', () => {
                const nav = document.querySelector('.sidebar');
                nav.style.display = (nav.style.display === 'none') ? 'flex' : 'none';
            });
        }
    });
};

// 4. Validation garage page  
const initValidation = () => {
    safeQuery('.form-grid', (form) => {
        form.addEventListener('submit', (e) => {
            const inputs = form.querySelectorAll('input');
            let isAllFilled = true;
            
            // تحديد الماركات المسموحة (Mercedes و Lamborghini)
            const allowedBrands = ['Mercedes', 'Lamborghini']; 
            const brandInput = form.querySelector('input[placeholder*="Brand"]'); 

            inputs.forEach(input => {
                if (input.value.trim() === "" && !input.placeholder.includes("Optional")) {
                    isAllFilled = false;
                    input.style.borderColor = "red";
                } else {
                    input.style.borderColor = "";
                }
            });

            // تشيك الماركة الصايع
            if (brandInput && brandInput.value.trim() !== "" && !allowedBrands.includes(brandInput.value.trim())) {
                e.preventDefault();
                alert("Only Mercedes and Lamborghini are allowed in this garage! 🏎️");
                brandInput.style.borderColor = "red";
                return;
            }

            if (!isAllFilled) {
                e.preventDefault();
                alert("Please fill in all required fields! ⚠️");
            }
        });
    });
};

// 5. password strength
const initPassStrength = () => {
    safeQuery('input[type="password"]', (passInput) => {
        const meter = document.createElement('div');
        meter.style.cssText = "font-size: 12px; margin-top: 8px; font-weight: bold;";
        passInput.parentNode.insertBefore(meter, passInput.nextSibling);

        passInput.addEventListener('input', () => {
            const val = passInput.value;
            const hasAtSign = val.includes('@');

            if (val.length === 0) {
                meter.innerText = "";
            } 
            else if (val.length < 6) {
                meter.innerText = "🔴 Weak";
                meter.style.color = "red";
            } 
            else if (val.length >= 8 && hasAtSign) {
                meter.innerText = "🟢 Strong";
                meter.style.color = "green";
            } 
            else {
                meter.innerText = "🟠 Medium";
                meter.style.color = "orange";
            }
        });
    });
};

// 6. Mileage Tracker 
const initMileageTracker = () => {
    safeQuery('#update-mileage-link', (link) => {
        link.addEventListener('click', () => {
            const display = document.getElementById('mileage-display');
            const newValue = prompt("Enter current KM reading:", "55430");
            if (newValue && !isNaN(newValue)) {
                display.innerText = `${Number(newValue).toLocaleString()} KM`;
            }
        });
    });
};

// The Engine
document.addEventListener('DOMContentLoaded', () => {
    initTheme();
    updateGreeting();
    initMenu();
    initValidation();
    initPassStrength();
    initMileageTracker();
});