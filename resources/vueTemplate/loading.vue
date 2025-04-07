<template>
    <div>
    
    <div class="loadinbody">
        <div class="floating-div">
        <div class="loader-container">
        <div class="loader-text">Loading...</div>
        <div class="loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
    </div>


    </div>
</div>
</template>

<style>

        .floating-div {
            width: 300px;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.7); /* White with 70% opacity */
            backdrop-filter: blur(5px); /* Creates a frosted glass effect */
            border-radius: 10px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            animation: float 6s ease-in-out infinite;
        }

        .floating-div h2 {
            margin-top: 0;
            color: #333;
        }

        .floating-div p {
            color: #555;
            line-height: 1.6;
        }

        /* Floating animation */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-15px);
            }
            100% {
                transform: translateY(0px);
            }
        }

        /* For a more pronounced "floating" look */
        .floating-div:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
            transition: all 0.3s ease;
        }

.loadinbody {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f5f5f5;
            padding: 0;
            background-image: url('/api/placeholder/800/600');
            background-size: cover;
            background-position: center;
            height: 100vh;

  /* display: none; Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.loader-container {
    text-align: center;
}

.loader-text {
    margin-bottom: 20px;
    color: #333;
    font-size: 18px;
}

.loader {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
}

.dot {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background-color: #3498db;
    animation: bounce 1.4s infinite ease-in-out both;
}

.dot:nth-child(1) {
    animation-delay: -0.32s;
}

.dot:nth-child(2) {
    animation-delay: -0.16s;
}

@keyframes bounce {
    0%, 80%, 100% {
        transform: scale(0);
    }
    40% {
        transform: scale(1);
    }
}
</style>