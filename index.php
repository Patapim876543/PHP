<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Deploy Kelompok 1 - Initial D</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:ital,wght@0,500;0,700;1,700&family=Permanent+Marker&display=swap" rel="stylesheet">
    <style>
        :root {
            --ae86-white: #f5f5f5;
            --ae86-black: #1a1a1a;
            --redline: #e3000f;
            --yellow-accent: #ffd700;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Oswald', sans-serif;
            background-color: var(--ae86-black);
            color: var(--ae86-white);
            /* Dark asphalt grid background */
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 30px 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
            position: relative;
        }

        /* Speed lines effect */
        .speed-lines {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(
                90deg,
                transparent,
                transparent 100px,
                rgba(255, 255, 255, 0.03) 100px,
                rgba(255, 255, 255, 0.03) 105px
            );
            transform: skewX(-20deg);
            z-index: 1;
            pointer-events: none;
            animation: speed 0.4s linear infinite;
        }

        @keyframes speed {
            0% { transform: skewX(-20deg) translateX(0); }
            100% { transform: skewX(-20deg) translateX(-105px); }
        }

        /* Glowing taillight effect in background */
        .taillight-glow {
            position: absolute;
            right: -10vw;
            bottom: -10vh;
            width: 50vw;
            height: 50vw;
            background: radial-gradient(circle, rgba(227, 0, 15, 0.15) 0%, transparent 70%);
            z-index: 1;
            pointer-events: none;
        }

        .container {
            position: relative;
            z-index: 2;
            background-color: var(--ae86-white);
            color: var(--ae86-black);
            padding: 40px 40px 60px 40px;
            max-width: 650px;
            width: 90%;
            border: 8px solid var(--ae86-black);
            border-radius: 4px;
            box-shadow: 15px 15px 0px var(--redline), 20px 20px 0px var(--ae86-black);
            transform: skewX(-5deg);
            transition: transform 0.3s ease;
        }
        
        .container:hover {
            transform: skewX(-5deg) translateY(-5px);
        }

        .ae86-stripe {
            position: absolute;
            bottom: 20px;
            left: 0;
            width: 100%;
            height: 30px;
            background-color: var(--ae86-black);
            z-index: 1;
            border-top: 4px solid var(--ae86-white);
            border-bottom: 4px solid var(--ae86-white);
            box-shadow: 0 -8px 0 var(--ae86-black);
        }
        
        .ae86-stripe::before {
            content: 'TRUENO';
            position: absolute;
            top: 4px;
            right: 20px;
            color: var(--ae86-white);
            font-weight: 700;
            font-style: italic;
            font-size: 16px;
            letter-spacing: 3px;
        }

        .japanese-text {
            writing-mode: vertical-rl;
            text-orientation: upright;
            position: absolute;
            right: 5vw;
            top: 10vh;
            font-size: 3rem;
            font-weight: 900;
            color: var(--ae86-white);
            text-shadow: 4px 4px 0 var(--redline), 6px 6px 0 var(--ae86-black);
            letter-spacing: 10px;
            transform: skewX(5deg);
            z-index: 0;
            opacity: 0.8;
            font-family: "MS Mincho", "Noto Serif JP", serif;
        }

        .fujiwara-text {
            font-family: "MS Mincho", "Noto Serif JP", serif;
            font-weight: 900;
            font-size: 1.8rem;
            color: var(--ae86-black);
            margin-bottom: 5px;
            text-align: right;
            border-bottom: 3px solid var(--ae86-black);
            padding-bottom: 5px;
        }

        h1 {
            font-size: 4rem;
            text-transform: uppercase;
            font-style: italic;
            color: var(--redline);
            text-shadow: 3px 3px 0px var(--ae86-black);
            line-height: 1.1;
            margin-bottom: 5px;
            margin-top: 10px;
        }

        .group-name {
            font-size: 1.5rem;
            font-weight: 700;
            font-style: italic;
            background: var(--ae86-black);
            color: var(--ae86-white);
            padding: 5px 20px;
            display: inline-block;
            margin-bottom: 30px;
            border-left: 8px solid var(--redline);
            letter-spacing: 1px;
        }

        .details {
            display: flex;
            flex-direction: column;
            gap: 15px;
            position: relative;
            z-index: 3;
            margin-bottom: 10px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            border-bottom: 2px dashed #ccc;
            padding-bottom: 5px;
        }

        .detail-label {
            font-weight: 700;
            color: var(--redline);
            width: 150px;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .detail-value {
            font-style: italic;
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--ae86-black);
        }
        
        .eurobeat-badge {
            position: absolute;
            top: -25px;
            left: -25px;
            background-color: var(--yellow-accent);
            color: var(--ae86-black);
            padding: 10px 20px;
            font-family: 'Permanent Marker', cursive;
            font-size: 1.4rem;
            transform: rotate(-15deg);
            border: 4px solid var(--ae86-black);
            box-shadow: 6px 6px 0 var(--redline);
            z-index: 10;
            transition: transform 0.2s;
            cursor: default;
        }
        
        .eurobeat-badge:hover {
            transform: rotate(-5deg) scale(1.1);
        }

        @media (max-width: 768px) {
            h1 { font-size: 3rem; }
            .japanese-text { display: none; }
            .detail-item { flex-direction: column; align-items: flex-start; }
            .detail-label { margin-bottom: 5px; width: auto; }
            .container { padding: 30px 20px 60px 20px; }
            .eurobeat-badge { font-size: 1rem; top: -15px; left: -10px; }
        }
    </style>
</head>
<body>
    <div class="taillight-glow"></div>
    <div class="speed-lines"></div>
    
    <div class="container">
        <div class="eurobeat-badge">EUROBEAT INTENSIFIES!</div>
        
        <div class="fujiwara-text">
            グループ 1 (自家用)
        </div>
        
        <h1>Selamat Datang!</h1>
        <p class="group-name">Website PHP AWS EC2 Berjalan!</p>
        
        <div class="details">
            <div class="detail-item">
                <span class="detail-label">NAMA / 名前</span>
                <span class="detail-value">Muhammad Taufiqurrohman</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">KELOMPOK / チーム</span>
                <span class="detail-value">1</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">KELAS / クラス</span>
                <span class="detail-value">XI RPL 6</span>
            </div>
            <div class="detail-item">
                <span class="detail-label">ABSEN / 番号</span>
                <span class="detail-value">26</span>
            </div>
        </div>
        
        <div class="ae86-stripe"></div>
    </div>
    
    <div class="japanese-text">プロジェクトデプロイ</div>
</body>
</html>