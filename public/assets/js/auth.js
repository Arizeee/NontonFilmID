// ==================== PARTICLES ====================

(function createParticles() {
    const container = document.getElementById('particles');
    const colors = [
        'rgba(34,197,94,0.3)',
        'rgba(225,29,72,0.25)',
        'rgba(212,160,23,0.25)',
    ];

    for (let i = 0; i < 25; i++) {
        const p = document.createElement('div');
        p.className = 'particle';
        p.style.background = colors[Math.random() < 0.4 ? 0 : Math.random() < 0.7 ? 1 : 2];
        p.style.left = Math.random() * 100 + 'vw';
        p.style.animationDuration = (8 + Math.random() * 14) + 's';
        p.style.animationDelay = (Math.random() * 10) + 's';
        p.style.width = p.style.height = (1.5 + Math.random() * 2.5) + 'px';
        container.appendChild(p);
    }
})();

// ==================== TAB SWITCHER ====================

function switchTab(tab) {
    const isLogin = tab === 'login';

    document.getElementById('tabLogin').classList.toggle('active', isLogin);
    document.getElementById('tabRegister').classList.toggle('active', !isLogin);
    document.getElementById('loginForm').classList.toggle('active', isLogin);
    document.getElementById('registerForm').classList.toggle('active', !isLogin);
    document.getElementById('tabIndicator').style.left = isLogin ? '0' : '50%';

    clearAllErrors();
}

// ==================== PASSWORD TOGGLE ====================

function togglePassword(inputId, btn) {
    const input = document.getElementById(inputId);
    const icon = btn.querySelector('i');
    const isHidden = input.type === 'password';

    input.type = isHidden ? 'text' : 'password';
    icon.classList.toggle('fa-eye', !isHidden);
    icon.classList.toggle('fa-eye-slash', isHidden);
}

// ==================== PASSWORD STRENGTH ====================

const STRENGTH_LEVELS = [
    {w: '0%', c: '#1e1e35', t: 'Kekuatan kata sandi', tc: '#6b6b8d'},
    {w: '20%', c: '#e11d48', t: 'Sangat lemah', tc: '#fda4af'},
    {w: '40%', c: '#e67e22', t: 'Lemah', tc: '#fbbf24'},
    {w: '60%', c: '#d4a017', t: 'Cukup', tc: '#f5c842'},
    {w: '80%', c: '#16a34a', t: 'Kuat', tc: '#6ee7b7'},
    {w: '100%', c: '#22c55e', t: 'Sangat kuat', tc: '#4ade80'},
];

function getPasswordScore(pw) {
    let score = 0;
    if (pw.length >= 8) score++;
    if (pw.length >= 12) score++;
    if (/[A-Z]/.test(pw)) score++;
    if (/[0-9]/.test(pw)) score++;
    if (/[^A-Za-z0-9]/.test(pw)) score++;
    return score;
}

function checkPasswordStrength(pw) {
    const bar = document.getElementById('pwStrengthBar');
    const text = document.getElementById('pwStrengthText');
    const level = pw.length === 0
        ? STRENGTH_LEVELS[0]
        : STRENGTH_LEVELS[Math.min(getPasswordScore(pw), 5)];

    bar.style.width = level.w;
    bar.style.background = level.c;
    text.textContent = level.t;
    text.style.color = level.tc;
}

// ==================== FIELD ERRORS ====================

function showFieldError(id, msg) {
    const el = document.getElementById(id);
    const input = el.previousElementSibling?.querySelector('input')
        ?? el.parentElement?.querySelector('input');

    el.textContent = msg;
    el.classList.add('show');
    input?.classList.add('input-error');
}

function clearFieldError(id) {
    const el = document.getElementById(id);
    const input = el?.previousElementSibling?.querySelector('input')
        ?? el?.parentElement?.querySelector('input');

    if (!el) return;
    el.textContent = '';
    el.classList.remove('show');
    input?.classList.remove('input-error');
}

function clearAllErrors() {
    document.querySelectorAll('.field-error').forEach(el => {
        el.textContent = '';
        el.classList.remove('show');
    });
    document.querySelectorAll('.input-error').forEach(el => {
        el.classList.remove('input-error');
    });
}

// ==================== VALIDATORS ====================

function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function isValidPhone(phone) {
    return /^(\+62|62|0)8[1-9][0-9]{6,10}$/.test(phone.replace(/[\s-]/g, ''));
}

// ==================== TOAST ====================

const TOAST_ICONS = {
    success: 'fa-circle-check',
    error: 'fa-circle-xmark',
    info: 'fa-circle-info',
};

function showToast(message, type = 'info') {
    const container = document.getElementById('toastContainer');
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.innerHTML = `<i class="fa-solid ${TOAST_ICONS[type] ?? TOAST_ICONS.info}"></i><span>${message}</span>`;
    container.appendChild(toast);

    setTimeout(() => {
        toast.classList.add('toast-exit');
        setTimeout(() => toast.remove(), 300);
    }, 3500);
}

// ==================== LOADING STATE ====================

function setLoading(btnId, spinnerId, loading) {
    const btn = document.getElementById(btnId);
    const spinner = document.getElementById(spinnerId);
    const text = btn.querySelector('span');

    btn.disabled = loading;
    btn.style.opacity = loading ? '0.7' : '1';
    btn.style.pointerEvents = loading ? 'none' : 'auto';
    text.style.opacity = loading ? '0' : '1';
    spinner.style.display = loading ? 'block' : 'none';
}

// ==================== INPUT ERROR CLEAR ON TYPE ====================

document.querySelectorAll('input[type="text"], input[type="email"], input[type="tel"], input[type="password"]')
    .forEach(input => {
        input.addEventListener('input', function () {
            const errorEl = this.closest('div').parentElement.querySelector('.field-error');
            if (errorEl) {
                errorEl.textContent = '';
                errorEl.classList.remove('show');
            }
            this.classList.remove('input-error');
        });
    });