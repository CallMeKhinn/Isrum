<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>ISRUM - Aplikasi Hitung Tanah</title>
    <!-- FontAwesome & Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        /* RESET & PALET WARNA */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            -webkit-tap-highlight-color: transparent;
        }

        :root {
            --color-dark-blue: #16425B;
            --color-primary-blue: #2F6690;
            --color-medium-blue: #3A7CA5;
            --color-light-blue: #81C3D7;
            --color-gray-bg: #D9DCD6;
            --white: #FFFFFF;
        }

        /* FULLSCREEN APPLICATION LAYOUT */
        html, body {
            width: 100%;
            height: 100vh;
            height: 100dvh;
            overflow: hidden;
            background: linear-gradient(135deg, var(--color-dark-blue) 0%, var(--color-primary-blue) 50%, var(--color-medium-blue) 100%);
            color: var(--color-dark-blue);
        }

        .app-container {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            background: linear-gradient(145deg, rgba(22, 66, 91, 0.95) 0%, rgba(47, 102, 144, 0.9) 100%);
            backdrop-filter: blur(10px);
        }

        /* HEADER & APP ICON */
        .app-header {
            padding: 16px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(22, 66, 91, 0.6);
            border-bottom: 1px solid rgba(217, 220, 214, 0.15);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            flex-shrink: 0;
        }

        .brand-wrapper {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .app-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--color-light-blue), var(--color-medium-blue));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(129, 195, 215, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .app-icon i {
            font-size: 20px;
            color: var(--color-dark-blue);
        }

        .brand-text h1 {
            font-size: 18px;
            font-weight: 800;
            color: var(--white);
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .brand-text h1 span {
            font-size: 10px;
            background: var(--color-light-blue);
            color: var(--color-dark-blue);
            padding: 2px 8px;
            border-radius: 20px;
            font-weight: 700;
        }

        .brand-text p {
            font-size: 12px;
            color: var(--color-light-blue);
            opacity: 0.9;
        }

        /* MAIN DASHBOARD CONTENT (FULL SCREEN ADAPTIVE) */
        .app-body {
            flex: 1;
            padding: 24px;
            overflow-y: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .dashboard-card {
            width: 100%;
            max-width: 900px;
            background: var(--color-gray-bg);
            border-radius: 24px;
            padding: 28px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        /* ADAPTIVE GRID UNTUK TABLET & DESKTOP */
        @media (min-width: 768px) {
            .dashboard-card {
                grid-template-columns: 1fr 1fr;
                align-items: start;
                padding: 36px;
            }
        }

        .section-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--color-dark-blue);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .section-title i {
            color: var(--color-primary-blue);
        }

        /* FORM INPUTS */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
            margin-bottom: 20px;
        }

        @media (min-width: 480px) and (max-width: 767px) {
            .form-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: var(--color-dark-blue);
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper i {
            position: absolute;
            left: 14px;
            color: var(--color-medium-blue);
            font-size: 15px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 14px 12px 40px;
            background: var(--white);
            border: 2px solid transparent;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            color: var(--color-dark-blue);
            outline: none;
            transition: all 0.25s ease;
            box-shadow: 0 2px 6px rgba(0,0,0,0.04);
        }

        .form-group input:focus {
            border-color: var(--color-primary-blue);
            box-shadow: 0 0 0 4px rgba(47, 102, 144, 0.15);
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--color-primary-blue), var(--color-dark-blue));
            color: var(--white);
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.25s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 8px 18px rgba(22, 66, 91, 0.25);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 22px rgba(22, 66, 91, 0.35);
            background: linear-gradient(135deg, var(--color-medium-blue), var(--color-dark-blue));
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* HASIL PERHITUNGAN CARD */
        .result-container {
            background: var(--white);
            border-radius: 16px;
            padding: 20px;
            border: 1px solid rgba(47, 102, 144, 0.1);
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .result-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 20px;
        }

        .result-item {
            background: var(--color-gray-bg);
            padding: 12px;
            border-radius: 10px;
        }

        .result-item span {
            display: block;
            font-size: 11px;
            font-weight: 600;
            color: var(--color-medium-blue);
            margin-bottom: 4px;
        }

        .result-item strong {
            font-size: 14px;
            color: var(--color-dark-blue);
            font-weight: 700;
        }

        .total-price-box {
            background: linear-gradient(135deg, var(--color-dark-blue), var(--color-primary-blue));
            padding: 18px;
            border-radius: 12px;
            color: var(--white);
            text-align: center;
        }

        .total-price-box span {
            font-size: 12px;
            color: var(--color-light-blue);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .total-price-box h2 {
            font-size: 22px;
            font-weight: 800;
            margin-top: 4px;
            color: var(--white);
        }

        /* FOOTER APP */
        .app-footer {
            padding: 12px;
            text-align: center;
            font-size: 11px;
            color: var(--color-light-blue);
            background: rgba(22, 66, 91, 0.4);
            flex-shrink: 0;
        }
    </style>
</head>
<body>

    <div class="app-container">
        <!-- HEADER APPS & ICON -->
        <header class="app-header">
            <div class="brand-wrapper">
                <div class="app-icon">
                    <i class="fa-solid fa-vector-square"></i>
                </div>
                <div class="brand-text">
                    <h1>ISRUM <span>PRO</span></h1>
                    <p>Aplikasi Hitung Tanah</p>
                </div>
            </div>
        </header>

        <!-- DASHBOARD UTAMA (ADAPTIVE ALL DEVICE) -->
        <main class="app-body">
            <div class="dashboard-card">
                
                <!-- KOLOM FORM INPUT -->
                <div class="form-section">
                    <div class="section-title">
                        <i class="fa-solid fa-calculator"></i> Parameter Tanah
                    </div>
                    
                    <form action="/" method="post" id="landForm">
                        <!-- Kompatibel dengan Blade Laravel -->
                        <script>
                            /* Blade Handler Syntax Injection Control */
                            if (typeof window !== 'undefined') {
                                document.write('<!-- @csrf -->');
                            }
                        </script>
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="panjang">Panjang Tanah (m)</label>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-arrows-left-right"></i>
                                    <input type="number" id="panjang" name="panjang" placeholder="Contoh: 20" value="20" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lebar">Lebar Tanah (m)</label>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-arrows-up-down"></i>
                                    <input type="number" id="lebar" name="lebar" placeholder="Contoh: 10" value="10" required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn-submit">
                            <i class="fa-solid fa-chart-line"></i> Hitung Estimasi
                        </button>
                    </form>
                </div>

                <!-- KOLOM HASIL PERHITUNGAN -->
                <div class="result-section">
                    <div class="section-title">
                        <i class="fa-solid fa-file-invoice-dollar"></i> Ringkasan Hasil
                    </div>

                    <div class="result-container">
                        <div class="result-grid">
                            <div class="result-item">
                                <span>Panjang</span>
                                <strong id="resPanjang">{{ $panjang ?? '20' }} m</strong>
                            </div>
                            <div class="result-item">
                                <span>Lebar</span>
                                <strong id="resLebar">{{ $lebar ?? '10' }} m</strong>
                            </div>
                            <div class="result-item">
                                <span>Luas Tanah</span>
                                <strong id="resLuas">{{ $luas ?? '200' }} m²</strong>
                            </div>
                            <div class="result-item">
                                <span>Harga / m²</span>
                                <strong id="resHargaMeter">{{ $hargapermeter ?? 'Rp 2.500.000' }}</strong>
                            </div>
                        </div>

                        <div class="total-price-box">
                            <span>Total Estimasi Harga</span>
                            <h2 id="resTotal">{{ $total_harga ?? 'Rp 500.000.000' }}</h2>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <footer class="app-footer">
            &copy; ISRUM Land Calculator System - Responsif Seluruh Perangkat
        </footer>
    </div>

    <!-- SCRIPT TAMPILAN PRATINJAU INTERAKTIF -->
    <script>
        document.getElementById('landForm').addEventListener('submit', function(e) {
            // Pengondisian demonstrasi pratinjau browser
            if (window.location.protocol !== 'file:' && !window.location.href.includes('localhost')) {
                e.preventDefault();
                
                const p = parseFloat(document.getElementById('panjang').value) || 0;
                const l = parseFloat(document.getElementById('lebar').value) || 0;
                const luas = p * l;
                const hargaPerMeter = 2500000;
                const total = luas * hargaPerMeter;

                document.getElementById('resPanjang').innerText = p + ' m';
                document.getElementById('resLebar').innerText = l + ' m';
                document.getElementById('resLuas').innerText = luas.toLocaleString('id-ID') + ' m²';
                document.getElementById('resHargaMeter').innerText = 'Rp ' + hargaPerMeter.toLocaleString('id-ID');
                document.getElementById('resTotal').innerText = 'Rp ' + total.toLocaleString('id-ID');
            }
        });
    </script>
</body>
</html>