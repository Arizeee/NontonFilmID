// Toggle sidebar
function toggleSidebar() {
    var s = document.getElementById('sidebar');
    var m = document.getElementById('mainContent');
    var o = document.getElementById('sidebarOverlay');
    if (window.innerWidth <= 1024) {
        s.classList.toggle('open');
        o.classList.toggle('active');
    } else {
        s.classList.toggle('collapsed');
        m.classList.toggle('expanded');
    }
}

// Navigasi 
function setActiveNav(el) {
    document.querySelectorAll('.nav-item').forEach(function (n) {
        n.classList.remove('active');
    });
    el.classList.add('active');
    if (window.innerWidth <= 1024) toggleSidebar();
    var label = el.querySelector('span').textContent;
    showToast('Navigasi ke: ' + label, 'var(--accent)');
}


// Prioritas selector
var selectedPriorityBtn = null;

function selectPriority(btn) {
    document.querySelectorAll('.priority-btn').forEach(function (b) {
        b.style.borderColor = 'var(--border)';
        b.style.borderWidth = '1px';
    });
    btn.style.borderColor = btn.getAttribute('data-color');
    btn.style.borderWidth = '2px';
    selectedPriorityBtn = btn;
}

// Toast — posisi atas kanan
var toastTimeout;

function showToast(msg, color) {
    var t = document.getElementById('toast');
    document.getElementById('toastMessage').textContent = msg;
    document.getElementById('toastIcon').style.color = color || 'var(--teal)';
    t.classList.add('show');
    clearTimeout(toastTimeout);
    toastTimeout = setTimeout(function () {
        t.classList.remove('show');
    }, 3000);
}

// Tanggal & greeting
function updateDate() {
    var now = new Date();
    var opts = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };
    var str = now.toLocaleDateString('id-ID', opts);
    document.getElementById('currentDate').textContent = str;
    document.getElementById('calendarDateLabel').textContent = str;

    var h = now.getHours();
    var g = 'Selamat Pagi';
    if (h >= 12 && h < 15) g = 'Selamat Siang';
    else if (h >= 15 && h < 18) g = 'Selamat Sore';
    else if (h >= 18) g = 'Selamat Malam';
    document.getElementById('greetingText').innerHTML = g + ', <span style="color:var(--accent);">Admin</span>';
}

// Responsif stat grid
function handleResize() {
    document.getElementById('statsGrid').style.gridTemplateColumns =
        window.innerWidth < 768 ? 'repeat(2,1fr)' : 'repeat(4,1fr)';
}

// Keyboard
document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeAddTaskModal();
});

document.getElementById('newTaskName').addEventListener('keydown', function (e) {
    if (e.key === 'Enter') addNewTask();
});

// Init
updateDate();
handleResize();
window.addEventListener('resize', handleResize);

// Animasi progress bar saat load
setTimeout(function () {
    document.querySelectorAll('.progress-fill').forEach(function (el) {
        var w = el.style.width;
        el.style.width = '0%';
        requestAnimationFrame(function () {
            requestAnimationFrame(function () {
                el.style.width = w;
            });
        });
    });
}, 300);