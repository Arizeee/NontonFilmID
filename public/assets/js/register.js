// ==================== VALIDATION HELPERS ====================

function validateName(name) {
    if (!name)           return 'Nama lengkap wajib diisi';
    if (name.length < 3) return 'Nama minimal 3 karakter';
    return null;
}

function validateEmail(email) {
    if (!email)               return 'Email wajib diisi';
    if (!isValidEmail(email)) return 'Format email tidak valid';
    return null;
}

function validatePhone(phone) {
    if (!phone)               return 'Nomor telepon wajib diisi';
    if (!isValidPhone(phone)) return 'Format nomor tidak valid (contoh: 081234567890)';
    return null;
}

function validatePassword(password) {
    if (!password)           return 'Kata sandi wajib diisi';
    if (password.length < 8) return 'Kata sandi minimal 8 karakter';
    return null;
}

function validateConfirm(password, confirm) {
    if (!confirm)             return 'Konfirmasi kata sandi wajib diisi';
    if (password !== confirm) return 'Kata sandi tidak cocok';
    return null;
}

function validateTerms(terms) {
    if (!terms) return 'Anda harus menyetujui syarat & ketentuan';
    return null;
}

// ==================== REGISTER FORM VALIDATION ====================

function validateRegisterForm(fields) {
    const { name, email, phone, password, confirm, terms } = fields;

    const checks = [
        { error: validateName(name),                 id: 'regNameError'     },
        { error: validateEmail(email),               id: 'regEmailError'    },
        { error: validatePhone(phone),               id: 'regPhoneError'    },
        { error: validatePassword(password),         id: 'regPasswordError' },
        { error: validateConfirm(password, confirm), id: 'regConfirmError'  },
        { error: validateTerms(terms),               id: 'regTermsError'    },
    ];

    let valid = true;
    checks.forEach(({ error, id }) => {
        if (error) {
            showFieldError(id, error);
            valid = false;
        }
    });

    return valid;
}

// ==================== REGISTER API ====================

async function submitRegister(fields) {
    const { name, email, phone, password, confirm } = fields;

    const csrfInput = document.querySelector('#registerForm input[type="hidden"]');

    const res = await fetch('/auth/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-Requested-With': 'XMLHttpRequest',
        },
        body: new URLSearchParams({
            [csrfInput.name]: csrfInput.value,
            name, email, phone, password, confirm,
        }),
    });

    return res.json();
}

// ==================== REGISTER RESPONSE HANDLERS ====================

function handleRegisterErrors(errors) {
    const fieldMap = {
        name:     'regNameError',
        email:    'regEmailError',
        phone:    'regPhoneError',
        password: 'regPasswordError',
        confirm:  'regConfirmError',
    };

    Object.entries(errors ?? {}).forEach(([field, msg]) => {
        const elId = fieldMap[field];
        if (elId) showFieldError(elId, msg);
        else showToast(msg, 'error');
    });
}

function onRegisterSuccess(message) {
    showToast(message, 'success');
    document.getElementById('registerForm').reset();
    checkPasswordStrength('');
    setTimeout(() => switchTab('login'), 800);
}

// ==================== HANDLE REGISTER ====================

async function handleRegister(e) {
    e.preventDefault();
    clearAllErrors();

    const fields = {
        name:     document.getElementById('regName').value.trim(),
        email:    document.getElementById('regEmail').value.trim(),
        phone:    document.getElementById('regPhone').value.trim(),
        password: document.getElementById('regPassword').value,
        confirm:  document.getElementById('regConfirm').value,
        terms:    document.getElementById('agreeTerms').checked,
    };

    if (!validateRegisterForm(fields)) return;

    setLoading('registerBtn', 'registerSpinner', true);

    try {
        const data = await submitRegister(fields);

        if (data.success) onRegisterSuccess(data.message);
        else handleRegisterErrors(data.errors);

    } catch (err) {
        showToast('Terjadi kesalahan. Coba lagi.', 'error');
    } finally {
        setLoading('registerBtn', 'registerSpinner', false);
    }
}