<template>
    <div>
    
        <div class="container">
            <div class="about-container">
                <div class="image-container">
                    <img src='/media_ZIGURADO/ZIGURADO.jpg' alt="Team working together">
                </div>
                <div class="content">
                    <div class="subtitle">About Us</div>
                    <h2 class="title">ZIGURADO</h2>
                    <p class="description">
                        We specialize in providing fast, reliable, 
                        and affordable repair services for all your electronic devices. 
                        Whether it's a smartphone, tablet, laptop, BT speaker or gaming console, our expert technicians are here to get your gadgets back in top shape. 
                        With a focus on quality service and customer satisfaction, 
                        we're your go-to solution for all your electronic repair needs.
                    </p>
                    <div class="features">
                        <div class="feature">
                            <div class="feature-icon">⭐</div>
                            <div class="feature-text">10+ Years Experience</div>
                        </div>
                        <div class="feature">
                            <div class="feature-icon">🌍</div>
                            <div class="feature-text">Global Competitiveness</div>
                        </div>
                        <div class="feature">
                            <div class="feature-icon">👥</div>
                            <div class="feature-text">Expert Team</div>
                        </div>
                        <div class="feature">
                            <div class="feature-icon">🚀</div>
                            <div class="feature-text">Rapid Innovation</div>
                        </div>
                    </div>
                    <!-- <a href="#" class="cta-button">Learn More About Us</a> -->
                </div>
            </div>
        </div>
    
    </div>
</template>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Inter', -apple-system, sans-serif;
}

/* .about-section {
    padding: 80px 20px;
    background-color: #f8fafc;
} */

.container {
    /* flex: auto; */
    max-width: 1200px;
    margin: 0 auto;
}

.about-container {
    display: flex;
    align-items: center;
    gap: 10px;
    background-color: white;
    border-radius: 16px;
    box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
    overflow: hidden;
}

.image-container {
    flex: 1;
    min-width: 50%;
}

.image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.content {
    flex: 1;
    padding: 40px;
}

.subtitle {
    color: #0284c7;
    font-weight: 600;
    font-size: 16px;
    margin-bottom: 16px;
    text-transform: uppercase;
    letter-spacing: 1.5px;
}

.title {
    font-size: 36px;
    color: #0f172a;
    margin-bottom: 24px;
    line-height: 1.2;
}

.description {
    color: #64748b;
    line-height: 1.7;
    margin-bottom: 32px;
}

.features {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
    margin-bottom: 32px;
}

.feature {
    display: flex;
    align-items: center;
    gap: 12px;
}

.feature-icon {
    background-color: #f0f9ff;
    color: #0284c7;
    width: 40px;
    height: 40px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.feature-text {
    color: #334155;
    font-weight: 500;
}

.cta-button {
    display: inline-block;
    background-color: #0284c7;
    color: white;
    padding: 12px 24px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.cta-button:hover {
    background-color: #0369a1;
    transform: translateY(-2px);
}

@media (max-width: 968px) {
    .about-container {
        flex-direction: column;
        gap: 0;
    }

    .image-container {
        min-width: 100%;
        height: 300px;
    }

    .features {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 640px) {
    .title {
        font-size: 28px;
    }

    .content {
        padding: 32px 24px;
    }
}
</style>