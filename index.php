<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Deploy Kelompok 1 - Manga Drift Style</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@900&family=Oswald:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <style>
        :root {
            --manga-white: #ffffff;
            --manga-black: #050505;
            --manga-grey: #cccccc;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Oswald', sans-serif;
            background-color: var(--manga-white);
            color: var(--manga-black);
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
        }

        /* Halftone dot pattern overlay for manga feel */
        .halftone {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-image: radial-gradient(var(--manga-grey) 2px, transparent 2px);
            background-size: 8px 8px;
            opacity: 0.6;
            z-index: 1;
            pointer-events: none;
        }

        /* Intense Manga Speed lines */
        .manga-speed {
            position: absolute;
            top: -50%; left: -50%; width: 200%; height: 200%;
            background: repeating-linear-gradient(
                90deg,
                transparent 0%,
                transparent 48%,
                rgba(0,0,0,0.8) 49%,
                #000 50%,
                rgba(0,0,0,0.8) 51%,
                transparent 52%
            );
            background-size: 120px 100%;
            transform: skewX(-30deg);
            z-index: 0;
            animation: fast-speed 0.1s linear infinite;
        }

        @keyframes fast-speed {
            0% { background-position: 0 0; }
            100% { background-position: -120px 0; }
        }

        /* Drifting Kanji Animation */
        .kanji-drift-container {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 2;
            pointer-events: none;
            overflow: hidden;
        }

        .kanji-drift {
            position: absolute;
            font-family: 'Noto Sans JP', sans-serif;
            font-size: 15rem;
            font-weight: 900;
            color: var(--manga-white);
            -webkit-text-stroke: 6px var(--manga-black);
            text-shadow: 
                15px 15px 0 var(--manga-black),
                40px 0px 0 rgba(0,0,0,0.2),
                80px 0px 0 rgba(0,0,0,0.1);
            white-space: nowrap;
            line-height: 1;
            animation: drift-slide 4s infinite cubic-bezier(0.2, 0.8, 0.2, 1);
        }
        
        .kanji-drift.k1 {
            top: 10%;
        }

        .kanji-drift.k2 {
            top: 60%;
            font-size: 12rem;
            animation-delay: 2s;
            animation-duration: 3.5s;
            -webkit-text-stroke: 4px var(--manga-black);
            text-shadow: 10px 10px 0 var(--manga-black);
        }

        /* The Drift Animation: simulating a car sliding */
        @keyframes drift-slide {
            0%   { transform: translateX(120vw) skewX(-40deg); }
            20%  { transform: translateX(40vw) skewX(-40deg); } /* Approach */
            25%  { transform: translateX(20vw) skewX(35deg) translateY(30px); } /* Sharp break/drift entry (tail out) */
            40%  { transform: translateX(0vw) skewX(15deg) translateY(0); } /* Counter steer */
            55%  { transform: translateX(-20vw) skewX(-15deg); } /* Exiting corner */
            100% { transform: translateX(-150vw) skewX(-40deg); } /* Speeding away */
        }

        /* Manga Panel Container */
        .container {
            position: relative;
            z-index: 10;
            background-color: var(--manga-white);
            padding: 40px 40px 50px 40px;
            width: 90%;
            max-width: 650px;
            border: 12px solid var(--manga-black);
            /* Manga panel uneven borders */
            border-radius: 0;
            box-shadow: 25px 25px 0px var(--manga-black);
            transform: rotate(-2deg);
        }

        /* Frame outline */
        .container::before {
            content: '';
            position: absolute;
            top: -16px; left: -16px; right: -16px; bottom: -16px;
            border: 3px solid var(--manga-black);
            pointer-events: none;
        }

        /* Japanese SFX (Gogogogo / Dodododo) */
        .sfx {
            position: absolute;
            font-family: 'Noto Sans JP', sans-serif;
            font-weight: 900;
            color: var(--manga-white);
            -webkit-text-stroke: 3px var(--manga-black);
            z-index: 15;
        }
        
        .sfx-1 { 
            top: -50px; right: -50px; 
            font-size: 5rem;
            transform: rotate(-15deg);
            text-shadow: 6px 6px 0 var(--manga-black); 
        }
        .sfx-2 { 
            bottom: -40px; left: -40px; 
            font-size: 4rem;
            transform: rotate(10deg);
            text-shadow: 6px 6px 0 var(--manga-black); 
        }

        h1 {
            font-size: 4.5rem;
            text-transform: uppercase;
            font-style: italic;
            color: var(--manga-black);
            text-shadow: 4px 4px 0px var(--manga-grey);
            line-height: 1;
            margin-bottom: 10px;
            letter-spacing: -2px;
        }

        .group-name {
            font-size: 1.5rem;
            font-weight: 700;
            background: var(--manga-black);
            color: var(--manga-white);
            padding: 8px 20px;
            display: inline-block;
            margin-bottom: 35px;
            transform: skewX(-15deg);
            border-left: 10px solid var(--manga-grey);
        }
        
        .group-name span {
            display: inline-block;
            transform: skewX(15deg);
            font-style: italic;
            letter-spacing: 1px;
        }

        .details {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            border-bottom: 5px dotted var(--manga-black);
            padding-bottom: 10px;
        }

        .detail-label {
            font-weight: 700;
            color: var(--manga-white);
            background: var(--manga-black);
            padding: 4px 15px;
            width: 150px;
            font-size: 1.1rem;
            text-transform: uppercase;
            transform: skewX(-10deg);
            margin-right: 20px;
            text-align: center;
            letter-spacing: 1px;
        }

        .detail-label span {
            display: inline-block;
            transform: skewX(10deg);
        }

        .detail-value {
            font-style: italic;
            font-weight: 700;
            font-size: 1.6rem;
            color: var(--manga-black);
            text-transform: uppercase;
        }

        /* Screentone badge */
        .screentone-badge {
            position: absolute;
            top: -25px;
            left: 20px;
            background-color: var(--manga-white);
            color: var(--manga-black);
            padding: 5px 20px;
            font-size: 1.4rem;
            font-style: italic;
            border: 5px solid var(--manga-black);
            box-shadow: 8px 8px 0 var(--manga-black);
            transform: rotate(-5deg);
            z-index: 20;
            background-image: repeating-linear-gradient(45deg, transparent, transparent 4px, var(--manga-grey) 4px, var(--manga-grey) 5px);
        }

        @media (max-width: 768px) {
            h1 { font-size: 3rem; }
            .kanji-drift { font-size: 8rem; }
            .kanji-drift.k2 { font-size: 6rem; }
            .detail-item { flex-direction: column; align-items: flex-start; gap: 10px; }
            .detail-label { width: 100%; margin-right: 0; }
            .detail-value { font-size: 1.3rem; margin-left: 10px; }
            .sfx { display: none; }
            .container { padding: 30px 20px; }
        }
    </style>
</head>
<body>
    <!-- Manga specific backgrounds -->
    <div class="manga-speed"></div>
    <div class="halftone"></div>
    
    <!-- Drifting Kanji Animation -->
    <div class="kanji-drift-container">
        <div class="kanji-drift k1">最高速ドリフト</div> <!-- Saikousoku Dorifuto (Top Speed Drift) -->
        <div class="kanji-drift k2">藤原とうふ店</div> <!-- Fujiwara Tofu Ten (Fujiwara Tofu Shop) -->
    </div>

    <div class="container">
        <div class="screentone-badge">PROJECT 1</div>
        <div class="sfx sfx-1">ゴゴゴゴ</div> <!-- Gogogogo (Rumble) -->
        <div class="sfx sfx-2">ドドドド</div> <!-- Dodododo (Menacing/Engine) -->
        
        <h1>Selamat Datang!</h1>
        <div class="group-name"><span>WEBSITE PHP AWS EC2</span></div>
        
        <div class="details">
            <div class="detail-item">
                <div class="detail-label"><span>NAMA / 名前</span></div>
                <div class="detail-value" style="font-size: 1.4rem;">Muhammad Taufiqurrohman</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><span>KELOMPOK</span></div>
                <div class="detail-value">1</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><span>KELAS</span></div>
                <div class="detail-value">XI RPL 6</div>
            </div>
            <div class="detail-item">
                <div class="detail-label"><span>ABSEN</span></div>
                <div class="detail-value">26</div>
            </div>
        </div>
    </div>
</body>
</html>