<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section style="margin-bottom:28px;">
                <h1 id="greetingText" style="font-family:'Space Grotesk',sans-serif;font-size:30px;font-weight:700;color:var(--fg);line-height:1.2;">
                    Selamat Pagi, <span style="color:var(--accent);">Admin</span>
                </h1>
                <p style="color:var(--fg-muted);font-size:14px;margin-top:6px;">Kamu punya <span style="color:var(--accent);font-weight:600;">4 tugas</span> dan <span style="color:var(--teal);font-weight:600;">3 event</span> minggu ini. Semangat!</p>
            </section>

            <!-- Stat Cards -->
            <section style="display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:28px;" id="statsGrid">
                <div class="stat-card">
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
                        <div style="width:40px;height:40px;border-radius:10px;background:var(--accent-soft);display:flex;align-items:center;justify-content:center;">
                            <i class="fa-solid fa-calendar-days" style="color:var(--accent);font-size:16px;"></i>
                        </div>
                        <span style="font-size:11px;color:var(--teal);font-weight:600;display:flex;align-items:center;gap:3px;"><i class="fa-solid fa-arrow-up" style="font-size:9px;"></i> 12%</span>
                    </div>
                    <div style="font-size:28px;font-weight:800;font-family:'Space Grotesk',sans-serif;color:var(--fg);">12</div>
                    <div style="font-size:12px;color:var(--fg-muted);margin-top:2px;">Total Event</div>
                </div>
                <div class="stat-card">
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
                        <div style="width:40px;height:40px;border-radius:10px;background:var(--teal-soft);display:flex;align-items:center;justify-content:center;">
                            <i class="fa-solid fa-users" style="color:var(--teal);font-size:16px;"></i>
                        </div>
                        <span style="font-size:11px;color:var(--teal);font-weight:600;display:flex;align-items:center;gap:3px;"><i class="fa-solid fa-arrow-up" style="font-size:9px;"></i> 24%</span>
                    </div>
                    <div style="font-size:28px;font-weight:800;font-family:'Space Grotesk',sans-serif;color:var(--fg);">847</div>
                    <div style="font-size:12px;color:var(--fg-muted);margin-top:2px;">Total Peserta</div>
                </div>
                <div class="stat-card">
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
                        <div style="width:40px;height:40px;border-radius:10px;background:var(--orange-soft);display:flex;align-items:center;justify-content:center;">
                            <i class="fa-solid fa-spinner" style="color:var(--orange);font-size:16px;"></i>
                        </div>
                        <span style="font-size:11px;color:var(--orange);font-weight:600;">Aktif</span>
                    </div>
                    <div style="font-size:28px;font-weight:800;font-family:'Space Grotesk',sans-serif;color:var(--fg);">5</div>
                    <div style="font-size:12px;color:var(--fg-muted);margin-top:2px;">Sedang Berjalan</div>
                </div>
                <div class="stat-card">
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
                        <div style="width:40px;height:40px;border-radius:10px;background:var(--blue-soft);display:flex;align-items:center;justify-content:center;">
                            <i class="fa-solid fa-wallet" style="color:var(--blue);font-size:16px;"></i>
                        </div>
                        <span style="font-size:11px;color:var(--rose);font-weight:600;display:flex;align-items:center;gap:3px;"><i class="fa-solid fa-arrow-down" style="font-size:9px;"></i> 8%</span>
                    </div>
                    <div style="font-size:28px;font-weight:800;font-family:'Space Grotesk',sans-serif;color:var(--fg);">24.5<span style="font-size:16px;font-weight:500;color:var(--fg-muted);">jt</span></div>
                    <div style="font-size:12px;color:var(--fg-muted);margin-top:2px;">Total Anggaran</div>
                </div>
            </section>

            <!-- Studio Occupancy Overview -->
            <section style="margin-bottom:28px;">
                <div class="card">
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;">
                        <div>
                            <h2 style="font-family:'Space Grotesk',sans-serif;font-size:17px;font-weight:700;color:var(--fg);">Kapasitas Studio Saat Ini</h2>
                            <p style="font-size:12px;color:var(--fg-muted);margin-top:2px;">Real-time · Showtime aktif</p>
                        </div>
                        <span class="live-indicator"><span class="live-dot"></span>Live Update</span>
                    </div>
                    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:12px;">

                        <div class="studio-bar" onclick="openSeatModalForMovie('Inception Reborn', 'Studio A')">
                            <div style="width:32px;height:32px;border-radius:8px;background:var(--accent-soft);display:flex;align-items:center;justify-content:center;min-width:32px;">
                                <span style="font-size:11px;font-weight:800;color:var(--accent);">A</span>
                            </div>
                            <div style="flex:1;min-width:0;">
                                <div style="font-size:12px;font-weight:600;color:var(--fg);">Studio A</div>
                                <div class="progress-bar" style="margin-top:5px;"><div class="progress-fill" style="width:76%;background:var(--accent);"></div></div>
                                <div style="font-size:10px;color:var(--fg-dim);margin-top:3px;">76 / 100 kursi</div>
                            </div>
                        </div>

                        <div class="studio-bar" onclick="openSeatModalForMovie('Senyap di Utara', 'Studio B')">
                            <div style="width:32px;height:32px;border-radius:8px;background:var(--teal-soft);display:flex;align-items:center;justify-content:center;min-width:32px;">
                                <span style="font-size:11px;font-weight:800;color:var(--teal);">B</span>
                            </div>
                            <div style="flex:1;min-width:0;">
                                <div style="font-size:12px;font-weight:600;color:var(--fg);">Studio B</div>
                                <div class="progress-bar" style="margin-top:5px;"><div class="progress-fill" style="width:45%;background:var(--teal);"></div></div>
                                <div style="font-size:10px;color:var(--fg-dim);margin-top:3px;">48 / 100 kursi</div>
                            </div>
                        </div>

                        <div class="studio-bar" onclick="openSeatModalForMovie('Riang Ria 2', 'Studio C')">
                            <div style="width:32px;height:32px;border-radius:8px;background:var(--orange-soft);display:flex;align-items:center;justify-content:center;min-width:32px;">
                                <span style="font-size:11px;font-weight:800;color:var(--orange);">C</span>
                            </div>
                            <div style="flex:1;min-width:0;">
                                <div style="font-size:12px;font-weight:600;color:var(--fg);">Studio C</div>
                                <div class="progress-bar" style="margin-top:5px;"><div class="progress-fill" style="width:22%;background:var(--orange);"></div></div>
                                <div style="font-size:10px;color:var(--fg-dim);margin-top:3px;">22 / 100 kursi</div>
                            </div>
                        </div>

                        <div class="studio-bar" onclick="openSeatModalForMovie('Bayangan Emas', 'Studio D')">
                            <div style="width:32px;height:32px;border-radius:8px;background:var(--blue-soft);display:flex;align-items:center;justify-content:center;min-width:32px;">
                                <span style="font-size:11px;font-weight:800;color:var(--blue);">D</span>
                            </div>
                            <div style="flex:1;min-width:0;">
                                <div style="font-size:12px;font-weight:600;color:var(--fg);">Studio D</div>
                                <div class="progress-bar" style="margin-top:5px;"><div class="progress-fill" style="width:12%;background:var(--blue);"></div></div>
                                <div style="font-size:10px;color:var(--fg-dim);margin-top:3px;">12 / 100 kursi</div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        
            <!-- Kalender + Pengingat -->
            <section style="display:grid;grid-template-columns:1.4fr 1fr;gap:20px;">

                <!-- Jadwal — konten di HTML -->
                <div class="card">
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;">
                        <div>
                            <h2 style="font-family:'Space Grotesk',sans-serif;font-size:17px;font-weight:700;color:var(--fg);">Jadwal Hari Ini</h2>
                            <p style="font-size:12px;color:var(--fg-muted);margin-top:2px;" id="calendarDateLabel"></p>
                        </div>
                        <div style="display:flex;gap:6px;">
                            <button style="width:32px;height:32px;border-radius:8px;background:#F1F5F9;border:1px solid var(--border);color:var(--fg-muted);cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all 0.2s;" onmouseover="this.style.borderColor='var(--accent)';this.style.color='var(--accent)'" onmouseout="this.style.borderColor='var(--border)';this.style.color='var(--fg-muted)'" aria-label="Sebelumnya"><i class="fa-solid fa-chevron-left" style="font-size:11px;"></i></button>
                            <button style="width:32px;height:32px;border-radius:8px;background:#F1F5F9;border:1px solid var(--border);color:var(--fg-muted);cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all 0.2s;" onmouseover="this.style.borderColor='var(--accent)';this.style.color='var(--accent)'" onmouseout="this.style.borderColor='var(--border)';this.style.color='var(--fg-muted)'" aria-label="Berikutnya"><i class="fa-solid fa-chevron-right" style="font-size:11px;"></i></button>
                        </div>
                    </div>
                    <div>

                        <div class="cal-item">
                            <div class="cal-dot" style="background:var(--accent);"></div>
                            <div style="flex:1;min-width:0;">
                                <div style="font-size:13px;font-weight:600;color:var(--fg);">Rapat koordinasi Seminar AI</div>
                                <div style="font-size:11px;color:var(--fg-muted);margin-top:2px;">Rapat</div>
                            </div>
                            <div style="font-size:12px;color:var(--fg-muted);font-weight:500;white-space:nowrap;">08:00</div>
                        </div>

                        <div class="cal-item">
                            <div class="cal-dot" style="background:var(--teal);"></div>
                            <div style="flex:1;min-width:0;">
                                <div style="font-size:13px;font-weight:600;color:var(--fg);">Review desain poster Workshop</div>
                                <div style="font-size:11px;color:var(--fg-muted);margin-top:2px;">Review</div>
                            </div>
                            <div style="font-size:12px;color:var(--fg-muted);font-weight:500;white-space:nowrap;">10:00</div>
                        </div>

                        <div class="cal-item">
                            <div class="cal-dot" style="background:var(--rose);"></div>
                            <div style="flex:1;min-width:0;">
                                <div style="font-size:13px;font-weight:600;color:var(--fg);">Meeting dengan sponsor Bootcamp</div>
                                <div style="font-size:11px;color:var(--fg-muted);margin-top:2px;">Meeting</div>
                            </div>
                            <div style="font-size:12px;color:var(--fg-muted);font-weight:500;white-space:nowrap;">13:00</div>
                        </div>

                        <div class="cal-item">
                            <div class="cal-dot" style="background:var(--blue);"></div>
                            <div style="flex:1;min-width:0;">
                                <div style="font-size:13px;font-weight:600;color:var(--fg);">Survei venue Auditorium</div>
                                <div style="font-size:11px;color:var(--fg-muted);margin-top:2px;">Kunjungan</div>
                            </div>
                            <div style="font-size:12px;color:var(--fg-muted);font-weight:500;white-space:nowrap;">15:00</div>
                        </div>

                        <div class="cal-item">
                            <div class="cal-dot" style="background:var(--fg-dim);"></div>
                            <div style="flex:1;min-width:0;">
                                <div style="font-size:13px;font-weight:600;color:var(--fg);">Update progress laporan bulanan</div>
                                <div style="font-size:11px;color:var(--fg-muted);margin-top:2px;">Laporan</div>
                            </div>
                            <div style="font-size:12px;color:var(--fg-muted);font-weight:500;white-space:nowrap;">17:00</div>
                        </div>

                    </div>
                </div>

                <!-- Pengingat — konten di HTML -->
                <div class="card">
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;">
                        <div>
                            <h2 style="font-family:'Space Grotesk',sans-serif;font-size:17px;font-weight:700;color:var(--fg);">Pengingat</h2>
                            <p style="font-size:12px;color:var(--fg-muted);margin-top:2px;">Jangan sampai terlewat</p>
                        </div>
                        <div class="pulse-dot" style="background:var(--rose);color:var(--rose);"></div>
                    </div>
                    <div>

                        <div class="reminder-item" onclick="showToast('Pengingat disetel: Deadline proposal Seminar AI', 'var(--rose)')">
                            <div style="width:36px;height:36px;min-width:36px;border-radius:10px;background:#F1F5F9;border:1px solid var(--border);display:flex;align-items:center;justify-content:center;">
                                <i class="fa-solid fa-clock" style="color:var(--rose);font-size:14px;"></i>
                            </div>
                            <div style="flex:1;min-width:0;">
                                <div style="font-size:13px;font-weight:500;color:var(--fg);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Deadline proposal Seminar AI</div>
                                <div style="font-size:11px;color:var(--fg-muted);margin-top:2px;">Besok, 09:00</div>
                            </div>
                            <i class="fa-solid fa-bell" style="color:var(--fg-dim);font-size:12px;"></i>
                        </div>

                        <div class="reminder-item" onclick="showToast('Pengingat disetel: Pembayaran venue Workshop UI/UX', 'var(--accent)')">
                            <div style="width:36px;height:36px;min-width:36px;border-radius:10px;background:#F1F5F9;border:1px solid var(--border);display:flex;align-items:center;justify-content:center;">
                                <i class="fa-solid fa-credit-card" style="color:var(--accent);font-size:14px;"></i>
                            </div>
                            <div style="flex:1;min-width:0;">
                                <div style="font-size:13px;font-weight:500;color:var(--fg);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Pembayaran venue Workshop UI/UX</div>
                                <div style="font-size:11px;color:var(--fg-muted);margin-top:2px;">3 hari lagi</div>
                            </div>
                            <i class="fa-solid fa-bell" style="color:var(--fg-dim);font-size:12px;"></i>
                        </div>

                        <div class="reminder-item" onclick="showToast('Pengingat disetel: Konfirmasi catering Bootcamp', 'var(--teal)')">
                            <div style="width:36px;height:36px;min-width:36px;border-radius:10px;background:#F1F5F9;border:1px solid var(--border);display:flex;align-items:center;justify-content:center;">
                                <i class="fa-solid fa-utensils" style="color:var(--teal);font-size:14px;"></i>
                            </div>
                            <div style="flex:1;min-width:0;">
                                <div style="font-size:13px;font-weight:500;color:var(--fg);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Konfirmasi catering Bootcamp</div>
                                <div style="font-size:11px;color:var(--fg-muted);margin-top:2px;">5 hari lagi</div>
                            </div>
                            <i class="fa-solid fa-bell" style="color:var(--fg-dim);font-size:12px;"></i>
                        </div>

                        <div class="reminder-item" onclick="showToast('Pengingat disetel: Upload materi ke platform E-learning', 'var(--blue)')">
                            <div style="width:36px;height:36px;min-width:36px;border-radius:10px;background:#F1F5F9;border:1px solid var(--border);display:flex;align-items:center;justify-content:center;">
                                <i class="fa-solid fa-upload" style="color:var(--blue);font-size:14px;"></i>
                            </div>
                            <div style="flex:1;min-width:0;">
                                <div style="font-size:13px;font-weight:500;color:var(--fg);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Upload materi ke platform E-learning</div>
                                <div style="font-size:11px;color:var(--fg-muted);margin-top:2px;">1 minggu lagi</div>
                            </div>
                            <i class="fa-solid fa-bell" style="color:var(--fg-dim);font-size:12px;"></i>
                        </div>

                        <div class="reminder-item" onclick="showToast('Pengingat disetel: Evaluasi feedback peserta seminar', 'var(--fg-muted)')">
                            <div style="width:36px;height:36px;min-width:36px;border-radius:10px;background:#F1F5F9;border:1px solid var(--border);display:flex;align-items:center;justify-content:center;">
                                <i class="fa-solid fa-comment-dots" style="color:var(--fg-muted);font-size:14px;"></i>
                            </div>
                            <div style="flex:1;min-width:0;">
                                <div style="font-size:13px;font-weight:500;color:var(--fg);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Evaluasi feedback peserta seminar</div>
                                <div style="font-size:11px;color:var(--fg-muted);margin-top:2px;">10 hari lagi</div>
                            </div>
                            <i class="fa-solid fa-bell" style="color:var(--fg-dim);font-size:12px;"></i>
                        </div>

                    </div>
                </div>
            </section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // JS spesifik halaman dashboard (opsional, kalau mau pisahkan)
    updateDate();
    handleResize();
    initSeats();
</script>
<?= $this->endSection() ?>