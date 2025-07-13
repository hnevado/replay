<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Videojuegos de los 90 y 2000'?></title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
<style>

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 50%, #16213e 100%);
            min-height: 100vh;
        }

        .retro-font {
            font-family: 'Press Start 2P', monospace;
        }

        .modern-font {
            font-family: 'Inter', sans-serif;
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 50%, #16213e 100%);
            position: relative;
            overflow: hidden;
            border-bottom: 2px solid #00f0ff;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 50%, rgba(0, 240, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 0, 128, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(128, 0, 255, 0.1) 0%, transparent 50%);
            z-index: 1;
        }

        .header-content {
            position: relative;
            z-index: 2;
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 2rem;
            text-align: center;
        }

        .logo {
            font-size: clamp(2rem, 5vw, 3.5rem);
            color: #00f0ff;
            text-shadow: 
                0 0 10px #00f0ff,
                0 0 20px #00f0ff,
                0 0 30px #00f0ff,
                2px 2px 0px #0080ff;
            margin-bottom: 1rem;
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from {
                text-shadow: 
                    0 0 10px #00f0ff,
                    0 0 20px #00f0ff,
                    0 0 30px #00f0ff,
                    2px 2px 0px #0080ff;
            }
            to {
                text-shadow: 
                    0 0 15px #00f0ff,
                    0 0 25px #00f0ff,
                    0 0 35px #00f0ff,
                    2px 2px 0px #0080ff;
            }
        }

        .tagline {
            font-size: clamp(1rem, 2.5vw, 1.25rem);
            color: #a0a0a0;
            font-weight: 300;
            letter-spacing: 0.05em;
            margin-bottom: 2rem;
        }

        .pixel-border {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: linear-gradient(45deg, #ff0080, #8000ff);
            border: none;
            color: white;
            font-size: 0.8rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            font-weight: 600;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .pixel-border::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .pixel-border:hover::before {
            left: 100%;
        }

        /* Navigation Styles */
        .navbar {
            background: rgba(15, 15, 35, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 240, 255, 0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 4rem;
        }

        .nav-logo {
            font-size: 1.2rem;
            color: #00f0ff;
            text-decoration: none;
            font-weight: 700;
            text-shadow: 0 0 10px #00f0ff;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .nav-link {
            color: #a0a0a0;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: linear-gradient(45deg, #00f0ff, #8000ff);
            transition: width 0.3s ease;
            z-index: -1;
        }

        .nav-link:hover {
            color: white;
            transform: translateY(-2px);
        }

        .nav-link:hover::before {
            width: 100%;
        }

        .nav-link.active {
            color: white;
            background: linear-gradient(45deg, #00f0ff, #8000ff);
            box-shadow: 0 0 20px rgba(0, 240, 255, 0.5);
        }

        .nav-link.active::before {
            width: 100%;
        }

        /* Gaming Icons */
        .gaming-icons {
            position: absolute;
            top: 50%;
            left: 2rem;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 1rem;
            opacity: 0.3;
        }

        .gaming-icon {
            width: 2rem;
            height: 2rem;
            background: linear-gradient(45deg, #ff0080, #8000ff);
            border-radius: 0.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
            animation: float 3s ease-in-out infinite;
        }

        .gaming-icon:nth-child(2) {
            animation-delay: 0.5s;
        }

        .gaming-icon:nth-child(3) {
            animation-delay: 1s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        /* Title */
        .post-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #00f0ff;
            margin-bottom: 1rem;
            text-shadow: 0 0 10px rgba(0, 240, 255, 0.3);
            transition: all 0.3s ease;
            line-height: 1.4;
        }

        .post-title a {
            color: inherit;
            text-decoration: none;
            position: relative;
        }

        .post-title a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(45deg, #00f0ff, #ff0080);
            transition: width 0.3s ease;
        }

        .post-title a:hover::after {
            width: 100%;
        }

        .post-card:hover .post-title {
            color: #ffffff;
            text-shadow: 0 0 15px rgba(0, 240, 255, 0.6);
        }

        /* Description */
        .post-description {
            color: #a0a0a0;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        /* Visit Button */
        .visit-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(45deg, #ff0080, #8000ff);
            color: white;
            text-decoration: none;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .visit-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .visit-button:hover::before {
            left: 100%;
        }

        .visit-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 0, 128, 0.4);
        }

        .visit-button::after {
            content: '→';
            transition: transform 0.3s ease;
        }

        .visit-button:hover::after {
            transform: translateX(5px);
        }

        /* Pixel Border Effect */
        .pixel-border {
            position: relative;
        }

        .pixel-border::before {
            content: '';
            position: absolute;
            top: -1px;
            left: -1px;
            right: -1px;
            bottom: -1px;
            background: linear-gradient(45deg, #00f0ff, #ff0080, #8000ff, #00f0ff);
            border-radius: 1rem;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        .post-card:hover .pixel-border::before {
            opacity: 1;
        }
        /* Posts Grid */
        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Article Card */
        .post-card {
            background: linear-gradient(135deg, rgba(26, 26, 46, 0.8) 0%, rgba(22, 33, 62, 0.8) 100%);
            border: 1px solid rgba(0, 240, 255, 0.2);
            border-radius: 1rem;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .post-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, 
                rgba(0, 240, 255, 0.05) 0%, 
                transparent 50%, 
                rgba(255, 0, 128, 0.05) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .post-card:hover::before {
            opacity: 1;
        }

        .post-card:hover {
            transform: translateY(-5px);
            border-color: rgba(0, 240, 255, 0.5);
            box-shadow: 
                0 10px 30px rgba(0, 240, 255, 0.2),
                0 0 20px rgba(0, 240, 255, 0.1);
        }

        .post-card > * {
            position: relative;
            z-index: 2;
        }
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .nav-links {
                gap: 1rem;
            }
            
            .nav-link {
                font-size: 0.85rem;
                padding: 0.4rem 0.8rem;
            }
            
            .gaming-icons {
                display: none;
            }
            
            .nav-container {
                flex-direction: column;
                height: auto;
                padding: 1rem;
            }
            
            .nav-logo {
                margin-bottom: 1rem;
            }
        }

        /* Demo Content */
        .demo-content {
            padding: 4rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
            color: #a0a0a0;
        }

        .demo-section {
            background: rgba(26, 26, 46, 0.5);
            padding: 2rem;
            border-radius: 1rem;
            border: 1px solid rgba(0, 240, 255, 0.2);
            margin-bottom: 2rem;
        }

        .demo-title {
            color: #00f0ff;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            text-shadow: 0 0 10px #00f0ff;
        }
    </style>
</head>
<body>
    <div class="p-4">
      <header class="header">
        <div class="gaming-icons">
            <div class="gaming-icon">🎮</div>
            <div class="gaming-icon">🕹️</div>
            <div class="gaming-icon">👾</div>
        </div>
        <div class="header-content">
            <h1 class="logo retro-font"><?= $title ?? 'REPLAY' ?></h1>
            <p class="tagline modern-font">Videojuegos de los 90 y 2000</p>
            <div class="pixel-border modern-font">Explora el Gaming Retro</div>
        </div>
      </header>

       <?php require_once __DIR__ . '/navbar.php'; ?>
    
       <main class="text-white">
        